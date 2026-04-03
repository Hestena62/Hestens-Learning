<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : "Empowering students with learning disabilities through personalized, accessible learning experiences in Math, ELA, and Science."; ?>" />
    <meta name="keywords"
        content="<?php echo isset($pageKeywords) ? htmlspecialchars($pageKeywords) : "learning disabilities, personalized education, online learning, math, ELA, science, accessible education"; ?>" />
    <meta name="author" content="<?php echo isset($pageAuthor) ? htmlspecialchars($pageAuthor) : "Hesten's Learning"; ?>" />

    <!-- PWA & Mobile Meta Tags -->
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">
    <meta name="theme-color" content="#4F46E5" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Hesten's">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : "Hesten's Learning"; ?>" />
    <meta property="og:description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : "Personalized, accessible learning for everyone."; ?>" />
    <meta property="og:type" content="website" />
    <?php if (isset($pageOgImage)): ?>
    <meta property="og:image" content="<?php echo htmlspecialchars($pageOgImage); ?>" />
    <?php endif; ?>

    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : "Hesten's Learning"; ?></title>

    <!-- Resource Hints -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

    <!-- Font Optimization: Core Fonts Only -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600&family=Inter:wght@400;600;700&family=Cookie&family=Outfit:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/assets/js/tailwind-config.js"></script>

    <!-- Custom Modern Styles -->
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body class="light antialiased font-sans overflow-x-hidden selection:bg-primary selection:text-white">

    <!-- Fixed Tools & Overlays -->
    <?php include __DIR__ . '/partials/fixed-tools.php'; ?>

    <!-- Interactive Panels -->
    <?php include __DIR__ . '/partials/timer.php'; ?>
    <?php include __DIR__ . '/partials/scratchpad.php'; ?>
    <?php include __DIR__ . '/partials/citation.php'; ?>

    <!-- Scroll Progress Indicator -->
    <div class="scroll-progress-container">
        <div class="scroll-progress-bar" id="scroll-bar"></div>
    </div>

    <!-- A11y Panel -->
    <!-- Accessibility Settings Panel -->
    <?php include __DIR__ . '/partials/a11y-settings.php'; ?>

    <?php include __DIR__ . '/partials/reading-mask.php'; ?>
    <?php include __DIR__ . '/partials/announcement-bar.php'; ?>

    <header
        class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md sticky top-0 z-40 transition-colors duration-300 print:hidden shadow-sm border-b border-gray-200/50 dark:border-slate-800/50">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex items-center justify-between flex-wrap">
                <a class="flex items-center flex-shrink-0 text-primary mr-8 group" href="/">
                    <div
                        class="h-10 w-10 mr-3 bg-gradient-to-br from-primary to-secondary text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg transition-transform">
                        H</div>
                    <span class="font-bold text-xl tracking-tight text-text-default font-outfit">Hesten's Learning</span>
                </a>
                <div class="block lg:hidden">
                    <button id="nav-toggle"
                        class="flex items-center px-3 py-2 border rounded text-text-default border-gray-400 hover:text-primary transition-colors"><i
                            class="fas fa-bars"></i></button>
                </div>
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden transition-all duration-300 gap-4"
                    id="nav-content">
                    <div class="text-sm lg:flex-grow flex flex-col lg:flex-row gap-2 lg:gap-6 mt-4 lg:mt-0 font-bold whitespace-nowrap">
                        <a href="/" class="nav-link-animated px-3 py-2 rounded-lg block lg:inline-block text-text-default hover:text-primary transition-all"><i
                                class="fas fa-home mr-1 text-primary/70"></i> Home</a>

                        <a href="/assessment" class="nav-link-animated px-3 py-2 rounded-lg block lg:inline-block text-text-default hover:text-primary transition-all"><i
                                class="fas fa-tasks mr-1 text-primary/70"></i> Assessment</a>
                    </div>
                    <div class="flex items-center gap-4 mt-4 lg:mt-0 w-full lg:w-auto">
                        <form action="/search.php" method="GET" class="flex items-center group relative w-full lg:w-auto">
                            <input type="text" name="q" placeholder="Search..."
                                class="bg-base-bg text-text-default rounded-full py-2 pl-10 pr-4 focus:ring-2 focus:ring-primary w-full lg:w-48 border border-gray-200 dark:border-gray-700 transition-all duration-300" />
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-primary transition-colors"></i>
                        </form>
                    </div>
                </div>
            </nav>
            
            <!-- Breadcrumbs -->
            <?php
            // Calculate breadcrumbs based on the URL with a fallback for local testing
            $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
            $parts = explode('?', $uri)[0]; // Remove query string
            $parts = array_filter(explode('/', $parts));
            
            if (!empty($parts) && basename($uri) !== 'index.php' && $uri !== '/' && $uri !== '') {
                echo '<nav class="mt-4 text-sm text-text-secondary flex items-center gap-2 overflow-x-auto whitespace-nowrap pb-1 print:hidden" aria-label="Breadcrumb">';
                echo '<a href="/" class="hover:text-primary transition-colors"><i class="fas fa-home"></i></a>';
                
                $path = '';
                $total = count($parts);
                $i = 0;
                
                foreach ($parts as $part) {
                    $i++;
                    $path .= '/' . $part;
                    $name = ucwords(str_replace(['-', '.php', '.html'], [' ', '', ''], $part));
                    
                    echo '<span class="text-gray-400 mx-1"><i class="fas fa-chevron-right text-[10px]"></i></span>';
                    
                    if ($i === $total) {
                        echo '<span class="text-text-default font-medium text-emerald-600 dark:text-emerald-400 truncate max-w-[200px]" aria-current="page">' . htmlspecialchars($name) . '</span>';
                    } else {
                        echo '<a href="' . htmlspecialchars($path) . '" class="hover:text-primary transition-colors truncate max-w-[150px]">' . htmlspecialchars($name) . '</a>';
                    }
                }
                echo '</nav>';
            }
            ?>
        </div>
    </header>

    <script src="/assets/js/a11y.js"></script>
    <script src="/assets/js/core-ui.js"></script>
    <script src="/assets/js/core-ui.js"></script>
