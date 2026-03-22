<?php

$dir = __DIR__ . '/student';
$files = glob($dir . '/*.html');

foreach ($files as $file) {
    if (!is_file($file)) continue;
    
    $content = file_get_contents($file);
    
    // Extract title
    $title = '';
    if (preg_match('/<title>(.*?)<\/title>/is', $content, $matches)) {
        $title = trim(str_replace(' - Hesten\'s Learning', '', $matches[1]));
        $title .= " - Hesten's Learning";
    }
    
    // Extract description
    $description = '';
    if (preg_match('/<p[^>]*class="[^"]*(?:text-grayish|text-text-secondary)[^"]*"[^>]*>(.*?)<\/p>/is', $content, $matches)) {
        $description = trim(strip_tags($matches[1]));
    } elseif (preg_match('/<p[^>]*class="text-center[^"]*"[^>]*>(.*?)<\/p>/is', $content, $matches)) {
        $description = trim(strip_tags($matches[1]));
    }
    // fallback if no description found
    if (empty($description)) {
        $description = "Learn more about " . str_replace(' - Hesten\'s Learning', '', $title) . " with our comprehensive study materials.";
    }
    
    // Remove smart quotes if any
    $description = str_replace(['"', "'", "’", "‘", "“", "”"], ['\"', "\'", "\'", "\'", '\"', '\"'], $description);
    // Well, actually PHP will handle quotes in double quotes if we escape $description correctly or just use single quotes or addslashes.
    $description = addslashes($description);

    // Extract main content
    $mainContent = '';
    if (preg_match('/(<main.*?>.*?<\/main>)/is', $content, $matches1)) {
        $mainContent = $matches1[1];
    } else {
        echo "WARNING: Could not find <main> in " . basename($file) . "\n";
        continue;
    }

    // Extract modals/extra content after main but before footer
    $modalsPosMatch = strpos($content, '</main>');
    $footerPosMatch = strpos($content, '<!-- Footer -->');
    if ($footerPosMatch === false) {
        $footerPosMatch = strpos($content, '<footer');
    }
    
    $modalsContent = '';
    if ($modalsPosMatch !== false && $footerPosMatch !== false) {
        $start = $modalsPosMatch + strlen('</main>');
        $modalsContent = substr($content, $start, $footerPosMatch - $start);
        $modalsContent = trim($modalsContent);
    }
    
    $out = "<?php\n";
    $out .= "// Set variables required by header.php for dynamic content\n";
    $out .= "\$pageTitle = \"$title\";\n";
    $out .= "\$pageDescription = \"$description\";\n";
    $out .= "\$pageAuthor = \"Hesten's Learning Team\";\n";
    $out .= "\n";
    $out .= "// Include the header file\n";
    $out .= "include '..\\src\\header.php';\n";
    $out .= "?>\n\n";
    
    $out .= "    $mainContent\n\n";
    if (!empty($modalsContent)) {
        $out .= "    $modalsContent\n\n";
    }
    
    $out .= "<?php\n";
    $out .= "// Include the footer file\n";
    $out .= "include '..\\src\\footer.php';\n";
    $out .= "?>\n";
    
    $newFile = str_replace('.html', '.php', $file);
    file_put_contents($newFile, $out);
    
    echo "Converted " . basename($file) . " to " . basename($newFile) . "\n";
}
echo "Done conversion!\n";
