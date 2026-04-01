<?php
// Page-Specific Metadata
$pageTitle       = "Test & Extra Review | Hesten's Learning";
$pageDescription = "Practice with quizzes, review extra materials, and challenge yourself.";
$pageKeywords    = "quiz, exam, assessment, challenge, extra credit";
$pageAuthor      = "Hesten's Learning";

// Include Global Header
include '../src/header.php';

// Theme Configuration
$themeColor = 'purple';
?>

<!-- Level Specific Sub-Nav (Sticky Tabs) -->
<div class="sticky top-0 z-30 bg-base-bg/95 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="flex overflow-x-auto py-3 gap-2 no-scrollbar" role="tablist" aria-label="Subject navigation tabs">
            <button onclick="switchTab('quizzes')" id="tab-quizzes"
                class="tab-button active flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm transition-all duration-300 border border-transparent hover:bg-purple-600/10 hover:text-purple-600 aria-selected:bg-purple-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="true" role="tab" aria-controls="content-quizzes">
                <i class="fas fa-tasks"></i> Quizzes
            </button>
            <button onclick="switchTab('challenges')" id="tab-challenges"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-purple-600/10 hover:text-purple-600 aria-selected:bg-purple-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-challenges">
                <i class="fas fa-brain"></i> Challenges
            </button>
            <button onclick="switchTab('review')" id="tab-review"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-purple-600/10 hover:text-purple-600 aria-selected:bg-purple-600 aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-review">
                <i class="fas fa-book"></i> Study Material
            </button>
        </div>
    </div>
</div>

<!-- Hero Section -->
<header class="relative bg-gradient-to-br from-purple-600 via-violet-600 to-indigo-700 text-white py-16 px-4 mb-12 overflow-hidden rounded-b-[2.5rem] shadow-xl">
    <!-- Abstract Background Patterns -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-white rounded-full mix-blend-overlay filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute top-1/2 right-0 w-72 h-72 bg-white/20 rounded-full mix-blend-overlay filter blur-3xl opacity-30"></div>
        <i class="fas fa-star absolute top-10 left-10 text-9xl animate-pulse text-white/10"></i>
        <i class="fas fa-puzzle-piece absolute bottom-10 right-10 text-8xl animate-spin-slow text-white/10" style="animation-duration: 12s;"></i>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto text-center relative z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-xs font-bold mb-4 tracking-wide uppercase backdrop-blur-md">
            Supplemental Material
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md font-outfit">
            Test & Extra Review
        </h1>
        <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto font-light leading-relaxed mb-8">
            Enrichment challenges, comprehensive quizzes, and curated study materials for all levels.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="../assessment/index.php"
                class="inline-block px-8 py-3 bg-white text-purple-600 font-bold rounded-full hover:bg-gray-50 transition-colors shadow-lg transform hover:-translate-y-1">
                <i class="fas fa-play mr-2 text-purple-400"></i> Start Assessment
            </a>
            <button onclick="document.getElementById('main-content').scrollIntoView({behavior: 'smooth'})"
                class="inline-block px-8 py-3 bg-white/10 backdrop-blur-sm border border-white/30 text-white font-bold rounded-full hover:bg-white/20 transition-colors shadow-lg">
                View Material <i class="fas fa-arrow-down ml-2"></i>
            </button>
        </div>
    </div>
</header>

<!-- Main Content Area -->
<main id="main-content" class="container mx-auto px-4 pb-24 min-h-[60vh] scroll-mt-32" tabindex="-1">
    <div class="bg-content-bg rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 p-8 md:p-12">
        <div class="max-w-4xl mx-auto">
            <div id="content-quizzes" class="tab-content block animate-fade-in-up">
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    <h4 class="text-xl font-bold mb-4">Test/Extra Review</h4><div class="space-y-4"><div><h5 class="text-lg font-bold text-primary mb-1">Multi-Subject Assessments</h5><p class="text-text-secondary">Skill-based quizzes and comprehensive exams covering core academics.<br><span class="text-xs font-bold bg-base-bg px-2 py-1 rounded inline-block mt-1 border border-gray-200 dark:border-gray-700">Cross-curricular Assessment</span></p></div><div><h5 class="text-lg font-bold text-primary mb-1">Enrichment Challenges</h5><p class="text-text-secondary">Logic puzzles, coding introductory courses, real-world math scenarios.<br><span class="text-xs font-bold bg-base-bg px-2 py-1 rounded inline-block mt-1 border border-gray-200 dark:border-gray-700">STEM Extension</span></p></div><div><h5 class="text-lg font-bold text-primary mb-1">Study Material</h5><p class="text-text-secondary">Curated flashcards and review sheets for test preparations.<br><span class="text-xs font-bold bg-base-bg px-2 py-1 rounded inline-block mt-1 border border-gray-200 dark:border-gray-700">General Review</span></p></div></div>
                </div>
            </div>
            
            <div id="content-challenges" class="tab-content hidden animate-fade-in-up">
                <div class="flex flex-col items-center justify-center py-20 opacity-50">
                    <i class="fas fa-brain text-6xl text-purple-600 mb-4"></i>
                    <h3 class="text-2xl font-bold">Enrichment Challenges</h3>
                    <p>Coming Soon!</p>
                </div>
            </div>
            
            <div id="content-review" class="tab-content hidden animate-fade-in-up">
                <div class="flex flex-col items-center justify-center py-20 opacity-50">
                    <i class="fas fa-book text-6xl text-purple-600 mb-4"></i>
                    <h3 class="text-2xl font-bold">Study Material</h3>
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
            b.classList.remove('active', 'bg-purple-600', 'text-white', 'shadow-md');
            b.classList.add('text-text-secondary');
            b.setAttribute('aria-selected', 'false');
        });
        
        document.getElementById('content-' + tabName).classList.remove('hidden');
        const btn = document.getElementById('tab-' + tabName);
        btn.classList.add('active', 'bg-purple-600', 'text-white', 'shadow-md');
        btn.classList.remove('text-text-secondary');
        btn.setAttribute('aria-selected', 'true');
    }
</script>

<?php include '../src/footer.php'; ?>