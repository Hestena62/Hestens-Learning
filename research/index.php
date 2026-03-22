<?php
// --- Page Configuration ---
$pageTitle = "Hesten's Learning - Research";
$pageDescription = "Explore our peer-reviewed journals on dyslexia, dysgraphia, and other learning disability research.";
$pageKeywords = "research, journals, dyslexia, dysgraphia, learning disabilities, education";
$pageAuthor = "Hesten Allison";

include '../src/header.php';

// Define Journals Data Array
$journals = [
    [
        "id" => "dyslexia-Research",
        "title" => "Dyslexia & Learning Disabilities Research",
        "cover" => "https://placehold.co/300x400/8b5cf6/ffffff?text=Dyslexia+Research",
        "description" => "A research journal focusing on the latest research in dyslexia, exploring innovative teaching methods and interventions.",
        "link" => "DLDR/index.php" // Assuming this structure based on previous code 'research/DLDR'
    ]
    // Add more journals here in the future
];
?>

<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-violet-600 via-purple-600 to-indigo-600 dark:from-violet-900 dark:via-purple-900 dark:to-indigo-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-10">
        <i class="fas fa-microscope absolute top-20 left-10 text-9xl animate-pulse text-violet-300"></i>
        <i class="fas fa-atom absolute bottom-10 right-20 text-[12rem] rotate-12 text-indigo-300"></i>
        <i class="fas fa-dna absolute top-1/3 right-1/4 text-8xl -rotate-12 text-purple-300"></i>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-white/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <span class="inline-block py-2 px-4 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-6 uppercase tracking-wider backdrop-blur-md shadow-lg">
            Academic Journals
        </span>
        <h1 class="text-5xl md:text-7xl font-extrabold mb-8 tracking-tight drop-shadow-lg">
            Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-200 to-indigo-200">Research</span>
        </h1>
        <p class="text-xl md:text-2xl text-blue-50 mb-10 font-light max-w-2xl mx-auto leading-relaxed">
            Discover the latest findings on learning disabilities and educational technology.
        </p>
    </div>
</div>

<main class="container mx-auto px-4 mb-24" id="main-content">

    <!-- Journals Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($journals as $journal): ?>
            <a href="<?php echo $journal['link']; ?>" class="group bg-content-bg rounded-3xl shadow-lg border overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
                <div class="relative h-64 overflow-hidden">
                    <div class="absolute inset-0 bg-primary/10 group-hover:bg-primary/0 transition-colors z-10"></div>
                    <img src="<?php echo $journal['cover']; ?>" 
                         alt="<?php echo $journal['title']; ?> Cover" 
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                         onerror="this.onerror=null; this.src='https://placehold.co/300x400/6366F1/FFFFFF?text=Image+Error';">
                </div>
                
                <div class="p-8 flex-1 flex flex-col">
                    <h3 class="text-2xl font-bold text-text-default mb-4 group-hover:text-primary transition-colors">
                        <?php echo $journal['title']; ?>
                    </h3>
                    <p class="text-text-secondary mb-6 leading-relaxed flex-1">
                        <?php echo $journal['description']; ?>
                    </p>
                    
                    <div class="flex items-center text-primary font-bold tracking-wide uppercase text-sm group-hover:gap-2 transition-all">
                        <span>Read Journal</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        <!-- Coming Soon Placeholder -->
        <div class="bg-base-bg rounded-3xl border-2 border-dashed border-gray-300 dark:border-gray-700 flex flex-col items-center justify-center p-8 text-center opacity-75 hover:opacity-100 transition-opacity">
            <div class="w-16 h-16 rounded-full bg-gray-200 dark:bg-gray-800 flex items-center justify-center mb-4 text-text-secondary">
                <i class="fas fa-plus text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-text-default mb-2">More Coming Soon</h3>
            <p class="text-text-secondary text-sm">We are actively conducting research on dysgraphia and AI-assisted learning.</p>
        </div>
    </div>

</main>

<?php include '../src/footer.php'; ?>
