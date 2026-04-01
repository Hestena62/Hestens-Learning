<?php
// Page-Specific Metadata
$pageTitle       = "12th Grade Level N | Hesten's Learning";
$pageDescription = "Advanced calculus, literature analysis, physics. Graduation and beyond.";
$pageKeywords    = "twelfth grade, senior, physics, calculus, graduation, 12th";
$pageAuthor      = "Hesten's Learning";

// Include Global Header
include '../src/header.php';

// Theme Configuration
$themeColor = 'rose';
?>

<!-- Level Specific Sub-Nav (Sticky Tabs) -->
<div class="sticky top-0 z-30 bg-base-bg/95 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="flex overflow-x-auto py-3 gap-2 no-scrollbar" role="tablist" aria-label="Subject navigation tabs">
            <button onclick="switchTab('math')" id="tab-math"
                class="tab-button active flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm transition-all duration-300 border border-transparent hover:bg-rose-600/10 hover:text-rose-600 aria-selected:bg-rose-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="true" role="tab" aria-controls="content-math">
                <i class="fas fa-calculator"></i> Math
            </button>
            <button onclick="switchTab('ela')" id="tab-ela"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-rose-600/10 hover:text-rose-600 aria-selected:bg-rose-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-ela">
                <i class="fas fa-book-open"></i> Language Arts
            </button>
            <button onclick="switchTab('science')" id="tab-science"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-rose-600/10 hover:text-rose-600 aria-selected:bg-rose-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-science">
                <i class="fas fa-flask"></i> Science
            </button>
            <button onclick="switchTab('social')" id="tab-social"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-rose-600/10 hover:text-rose-600 aria-selected:bg-rose-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-social">
                <i class="fas fa-globe-americas"></i> Social Studies
            </button>
        </div>
    </div>
</div>

<!-- Hero Section -->
<header class="relative bg-gradient-to-br from-rose-600 via-pink-600 to-rose-700 text-white py-16 px-4 mb-12 overflow-hidden rounded-b-[2.5rem] shadow-xl">
    <!-- Abstract Background Patterns -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-white rounded-full mix-blend-overlay filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute top-1/2 right-0 w-72 h-72 bg-white/20 rounded-full mix-blend-overlay filter blur-3xl opacity-30"></div>
        <i class="fas fa-graduation-cap absolute top-10 left-10 text-9xl animate-pulse text-white/10"></i>
        <i class="fas fa-infinity absolute bottom-10 right-10 text-8xl animate-spin-slow text-white/10" style="animation-duration: 12s;"></i>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto text-center relative z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-xs font-bold mb-4 tracking-wide uppercase backdrop-blur-md">
            HIGH School Curriculum
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md font-outfit">
            Level N: 12th Grade
        </h1>
        <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto font-light leading-relaxed mb-8">
            Advanced calculus, literature analysis, and physics. Mastery of graduation standards.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="../assessment/index.php"
                class="inline-block px-8 py-3 bg-white text-rose-600 font-bold rounded-full hover:bg-gray-50 transition-colors shadow-lg transform hover:-translate-y-1">
                <i class="fas fa-star mr-2 text-rose-400"></i> Take Assessment
            </a>
            <button onclick="document.getElementById('main-content').scrollIntoView({behavior: 'smooth'})"
                class="inline-block px-8 py-3 bg-white/10 backdrop-blur-sm border border-white/30 text-white font-bold rounded-full hover:bg-white/20 transition-colors shadow-lg">
                Start Learning <i class="fas fa-arrow-down ml-2"></i>
            </button>
        </div>
    </div>
</header>

<!-- Main Content Area -->
<main id="main-content" class="container mx-auto px-4 pb-24 min-h-[60vh] scroll-mt-32" tabindex="-1">
    <div class="bg-content-bg rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 p-8 md:p-12">
        <div class="max-w-4xl mx-auto">
            <div id="content-math" class="tab-content block animate-fade-in-up">
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    <h4 class="text-xl font-bold mb-4">Core Subjects & Standards</h4><div class="space-y-4"><div><h5 class="text-lg font-bold text-primary mb-1">Mathematics</h5><p class="text-text-secondary">Calculus, Statistics, or Applied Math for advanced college placement.<br><span class="text-xs font-bold bg-base-bg px-2 py-1 rounded inline-block mt-1 border border-gray-200 dark:border-gray-700">CCSS.MATH.CONTENT.HSS.ID.A.1</span></p></div><div><h5 class="text-lg font-bold text-primary mb-1">English Language Arts</h5><p class="text-text-secondary">Capstone projects, creative writing, speech electives.<br><span class="text-xs font-bold bg-base-bg px-2 py-1 rounded inline-block mt-1 border border-gray-200 dark:border-gray-700">CCSS.ELA-LITERACY.W.11-12.1</span></p></div><div><h5 class="text-lg font-bold text-primary mb-1">Science</h5><p class="text-text-secondary">Advanced physical/biological sciences, independent research projects.<br><span class="text-xs font-bold bg-base-bg px-2 py-1 rounded inline-block mt-1 border border-gray-200 dark:border-gray-700">NGSS: HS-ETS1-2</span></p></div><div><h5 class="text-lg font-bold text-primary mb-1">Social Studies</h5><p class="text-text-secondary">Civics, macro/micro-economics, government structures, personal finance.<br><span class="text-xs font-bold bg-base-bg px-2 py-1 rounded inline-block mt-1 border border-gray-200 dark:border-gray-700">NCSS.D2.Eco.1.9-12</span></p></div></div>
                </div>
            </div>
            
            <div id="content-ela" class="tab-content hidden animate-fade-in-up">
                <div class="flex flex-col items-center justify-center py-20 opacity-50">
                    <i class="fas fa-book-open text-6xl text-rose-600 mb-4"></i>
                    <h3 class="text-2xl font-bold">Language Arts Content</h3>
                    <p>Coming Soon!</p>
                </div>
            </div>
            
            <div id="content-science" class="tab-content hidden animate-fade-in-up">
                <div class="flex flex-col items-center justify-center py-20 opacity-50">
                    <i class="fas fa-flask text-6xl text-rose-600 mb-4"></i>
                    <h3 class="text-2xl font-bold">Science Content</h3>
                    <p>Coming Soon!</p>
                </div>
            </div>
            
            <div id="content-social" class="tab-content hidden animate-fade-in-up">
                <div class="flex flex-col items-center justify-center py-20 opacity-50">
                    <i class="fas fa-globe-americas text-6xl text-rose-600 mb-4"></i>
                    <h3 class="text-2xl font-bold">Social Studies Content</h3>
                    <p>Coming Soon!</p>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    function switchTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
        document.querySelectorAll('.tab-button').forEach(b => {
            b.classList.remove('active', 'bg-rose-600', 'text-white', 'shadow-md');
            b.classList.add('text-text-secondary');
            b.setAttribute('aria-selected', 'false');
        });
        
        document.getElementById('content-' + tabName).classList.remove('hidden');
        const btn = document.getElementById('tab-' + tabName);
        btn.classList.add('active', 'bg-rose-600', 'text-white', 'shadow-md');
        btn.classList.remove('text-text-secondary');
        btn.setAttribute('aria-selected', 'true');
    }
    
    // Simple TTS for documentation
    function toggleSpeech(btn) {
        const text = document.getElementById('main-content').innerText;
        if (window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
            btn.innerHTML = '<i class="fas fa-volume-up"></i>';
        } else {
            const utterance = new SpeechSynthesisUtterance(text);
            window.speechSynthesis.speak(utterance);
            btn.innerHTML = '<i class="fas fa-stop"></i>';
        }
    }
</script>

<?php include '../src/footer.php'; ?>