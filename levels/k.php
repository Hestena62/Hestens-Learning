<?php
// Page-Specific Metadata
$pageTitle       = "Grade 9 Level K | Hesten's Learning";
$pageDescription = "High School Algebra I, Literature, and Physical Science curriculum designed for accessible learning.";
$pageKeywords    = "Grade 9, Algebra I, high school, functions, equations, statistics, accessible learning";
$pageAuthor      = "Hesten's Learning";

// Include Global Header
include '../src/header.php';

// Theme Configuration for Grade 9 (High School)
$themeColor = 'rose'; // Tailwind color name
$themeClass = 'rose-600';
$themeBg    = 'bg-rose-600';
$darkThemeClass = 'dark:text-rose-400';
?>

<!-- Level K Specific Sub-Nav (Sticky Tabs) -->
<div class="sticky top-0 z-30 glass-premium transition-colors duration-300">
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
<header class="relative animate-reveal mesh-gradient-rose text-white py-16 px-4 mb-12 overflow-hidden rounded-b-[2.5rem] shadow-xl border-b border-white/10 noise-filter">
    <!-- Abstract Background Patterns -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-white rounded-full mix-blend-overlay filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute top-1/2 right-0 w-72 h-72 bg-rose-300 rounded-full mix-blend-overlay filter blur-3xl opacity-30"></div>
        <i class="fas fa-square-root-variable absolute top-10 left-10 text-9xl animate-pulse text-white/10"></i>
        <i class="fas fa-atom absolute bottom-10 right-10 text-8xl animate-spin-slow text-white/10" style="animation-duration: 12s;"></i>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto text-center relative z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-xs font-bold mb-4 tracking-wide uppercase backdrop-blur-md">
            9th Grade Curriculum
        </span>
        <h1 class="text-4xl md:text-7xl font-extrabold mb-4 tracking-tight drop-shadow-lg font-outfit text-white">
            Level <span class="text-white underline decoration-wavy decoration-rose-300/50">K</span>
        </h1>
        <p class="text-lg md:text-xl text-rose-50 max-w-2xl mx-auto font-light leading-relaxed mb-8">
            Welcome to High School. Master Algebra I foundations, analyze core literature, and explore physical science.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up" style="animation-delay: 0.2s;">
            <div class="magnetic-wrap">
                <a href="../assessment/index.php"
                    class="inline-block px-8 py-3 bg-white text-rose-600 font-bold rounded-full hover:bg-rose-50 transition-all shadow-lg hover:shadow-rose-500/30 transform hover:-translate-y-1">
                    <i class="fas fa-star mr-2 text-rose-400"></i> Take Assessment
                </a>
            </div>
            <div class="magnetic-wrap">
                <button onclick="document.getElementById('main-content').scrollIntoView({behavior: 'smooth'})"
                    class="inline-block px-8 py-3 bg-white/10 backdrop-blur-md border border-white/30 text-white font-bold rounded-full hover:bg-white/20 transition-all shadow-lg">
                    Start Learning <i class="fas fa-arrow-down ml-2"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Floating Atmosphere Elements -->
    <div class="absolute inset-0 pointer-events-none opacity-40">
        <svg class="absolute top-10 left-10 w-24 h-24 text-white/10 animate-float" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="2" />
        </svg>
        <svg class="absolute bottom-20 right-20 w-32 h-32 text-white/10 animate-float" style="animation-delay: 1s;" viewBox="0 0 100 100">
            <rect x="20" y="20" width="60" height="60" fill="none" stroke="currentColor" stroke-width="1.5" transform="rotate(45 50 50)" />
        </svg>
        <svg class="absolute top-1/2 left-1/3 w-16 h-16 text-white/5 animate-pulse" viewBox="0 0 100 100">
            <path d="M50 10 L90 90 L10 90 Z" fill="none" stroke="currentColor" stroke-width="2" />
        </svg>
    </div>
</header>

<!-- Main Content Area -->
<main id="main-content" class="container mx-auto px-4 pb-24 min-h-[60vh] scroll-mt-32 reveal-section" tabindex="-1">

    <!-- MATH SECTION -->
    <section id="content-math" class="tab-content block animate-fade-in-up" role="tabpanel">

        <!-- Module Header & Progress -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 pb-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-rose-600 to-pink-700 text-white flex items-center justify-center text-3xl shadow-lg shadow-rose-600/20">
                    <i class="fas fa-calculator"></i>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-text-default">Algebra I - Module 1</h2>
                    <p class="text-text-secondary text-sm md:text-base">Relationships Between Quantities and Reasoning with Equations.</p>
                </div>
            </div>

            <!-- Overall Module Progress -->
            <div class="bg-base-bg border border-gray-200 dark:border-gray-700 rounded-xl p-4 flex items-center gap-4 shadow-sm min-w-[250px]">
                <div class="flex-grow">
                    <div class="flex justify-between text-xs font-bold uppercase tracking-wider mb-1">
                        <span class="text-text-secondary">Level Progress</span>
                        <span class="text-rose-600" id="module-progress-text">0%</span>
                    </div>
                    <div class="h-2 w-full bg-rose-100 dark:bg-rose-950 rounded-full overflow-hidden">
                        <div id="module-progress-bar" class="h-full bg-rose-600 transition-all duration-1000 ease-out" style="width: 0%"></div>
                    </div>
                </div>
                <div class="text-rose-600 text-xl">
                    <i class="fas fa-trophy"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Topic A Card -->
            <article class="bg-content-bg rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover-lift flex flex-col relative group noise-filter">
                <div class="p-6 flex-grow relative">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-rose-50 dark:bg-rose-950">
                        <div class="h-full bg-rose-600 transition-all duration-500" style="width: 0%" id="progress-topic-a"></div>
                    </div>

                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-rose-600 hover:bg-rose-600 hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-rose-600 shadow-sm z-10"
                        onclick="toggleSpeech(this)" data-title="Topic A: Introduction to Functions"
                        data-desc="Explore graphing stories, piecewise functions, and analyzing real-world data."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <div class="text-xs font-semibold text-rose-600/80 mb-2 uppercase tracking-wider">CCSS: N-Q.A.1, A-CED.A.2</div>
                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic A: Introduction to Functions</h3>
                    <p class="text-text-secondary mb-6 leading-relaxed">
                        Analyze graphs representing stories, elevations, and exponential growth.
                    </p>

                    <ul class="space-y-3 mb-6 lesson-list">
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-rose-600/5 transition-colors group border border-transparent hover:border-rose-600/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-a-1', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-rose-600 flex items-center justify-center transition-transform active:scale-95"
                                    aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-rose-600 transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="toggleLesson('topic-a-1', this.previousElementSibling)">
                                    <span class="text-rose-600 font-bold">Lesson 1:</span> Graphing stories and elevation vs time.
                                </span>
                            </div>
                        </li>
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-rose-600/5 transition-colors group border border-transparent hover:border-rose-600/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-a-2', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-rose-600 flex items-center justify-center transition-transform active:scale-95"
                                    aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-rose-600 transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="toggleLesson('topic-a-2', this.previousElementSibling)">
                                    <span class="text-rose-600 font-bold">Lesson 2:</span> Growth of square areas and functions.
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </article>

            <!-- Topic B Card -->
            <article class="bg-content-bg rounded-3xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover-lift flex flex-col relative group noise-filter">
                <div class="p-6 flex-grow relative">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-rose-50 dark:bg-rose-950">
                        <div class="h-full bg-rose-600 transition-all duration-500" style="width: 0%" id="progress-topic-b"></div>
                    </div>

                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-rose-600 hover:bg-rose-600 hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-rose-600 shadow-sm z-10"
                        onclick="toggleSpeech(this)" data-title="Topic B: Structure of Expressions"
                        data-desc="Master algebraic properties and polynomial multiplication."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <div class="text-xs font-semibold text-rose-600/80 mb-2 uppercase tracking-wider">CCSS: A-SSE.A.2, A-APR.A.1</div>
                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic B: Structure of Expressions</h3>
                    <p class="text-text-secondary mb-6 leading-relaxed">
                        Algebraic expressions, distributive property, and polynomial operations.
                    </p>

                    <ul class="space-y-3 mb-6 lesson-list">
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-rose-600/5 transition-colors group border border-transparent hover:border-rose-600/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-b-1', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-rose-600 flex items-center justify-center transition-transform active:scale-95"
                                    aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-rose-600 transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="toggleLesson('topic-b-1', this.previousElementSibling)">
                                    <span class="text-rose-600 font-bold">Lesson 1:</span> Commutative and associative properties.
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </article>

        </div>
    </section>

    <!-- LANGUAGE ARTS SECTION -->
    <section id="content-ela" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div class="w-20 h-20 bg-rose-100 dark:bg-rose-900 rounded-full flex items-center justify-center text-rose-600 text-3xl mb-4 shadow-inner">
                <i class="fas fa-book-open"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default font-outfit">English Language Arts</h2>
            <p class="text-text-secondary mt-2 max-w-md text-center">Literary theory, comprehensive research papers, and classical literature analysis.</p>
            <div class="mt-8 px-4 py-2 bg-rose-50 dark:bg-rose-900/20 text-rose-600 text-xs font-bold rounded-full uppercase tracking-widest border border-rose-200 dark:border-rose-800">
                Coming Soon
            </div>
        </div>
    </section>

    <!-- SCIENCE SECTION -->
    <section id="content-science" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div class="w-20 h-20 bg-rose-100 dark:bg-rose-900 rounded-full flex items-center justify-center text-rose-600 text-3xl mb-4 shadow-inner">
                <i class="fas fa-flask"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default font-outfit">Physical Science</h2>
            <p class="text-text-secondary mt-2 max-w-md text-center">Chemistry and Physics foundations. Forces, motion, and matter interactions.</p>
            <div class="mt-8 px-4 py-2 bg-rose-50 dark:bg-rose-900/20 text-rose-600 text-xs font-bold rounded-full uppercase tracking-widest border border-rose-200 dark:border-rose-800">
                Coming Soon
            </div>
        </div>
    </section>

    <!-- SOCIAL STUDIES SECTION -->
    <section id="content-social" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="flex flex-col items-center justify-center py-20 bg-content-bg rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
            <div class="w-20 h-20 bg-rose-100 dark:bg-rose-900 rounded-full flex items-center justify-center text-rose-600 text-3xl mb-4 shadow-inner">
                <i class="fas fa-globe-americas"></i>
            </div>
            <h2 class="text-2xl font-bold text-text-default font-outfit">Social Studies</h2>
            <p class="text-text-secondary mt-2 max-w-md text-center">U.S. History and Civic Documents. From Constitution through Reconstruction.</p>
            <div class="mt-8 px-4 py-2 bg-rose-50 dark:bg-rose-900/20 text-rose-600 text-xs font-bold rounded-full uppercase tracking-widest border border-rose-200 dark:border-rose-800">
                Coming Soon
            </div>
        </div>
    </section>

</main>

<!-- Confetti Library -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<!-- PAGE SPECIFIC SCRIPTS -->
<script>
    // Tab Switching Logic
    function switchTab(tabName) {
        // 1. Hide all content
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => content.classList.add('hidden'));

        // 2. Deactivate all buttons
        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(btn => {
            btn.classList.remove('active', 'bg-rose-600', 'text-white', 'shadow-md');
            btn.setAttribute('aria-selected', 'false');
            btn.classList.add('text-text-secondary');
        });

        // 3. Show Target Content
        const targetContent = document.getElementById(`content-${tabName}`);
        if (targetContent) targetContent.classList.remove('hidden');

        // 4. Activate Target Button
        const targetBtn = document.getElementById(`tab-${tabName}`);
        if (targetBtn) {
            targetBtn.classList.add('active', 'bg-rose-600', 'text-white', 'shadow-md');
            targetBtn.setAttribute('aria-selected', 'true');
            targetBtn.classList.remove('text-text-secondary');
        }
    }

    // --- Granular Lesson Tracking Logic ---
    let completedLessons = [];
    const LEVEL_ID = 'level-k';

    document.addEventListener("DOMContentLoaded", function () {
        loadLessonProgress();
        updateAllUI();
    });

    function loadLessonProgress() {
        try {
            const stored = localStorage.getItem(`hl_progress_${LEVEL_ID}`);
            if (stored) completedLessons = JSON.parse(stored);
        } catch (e) { }
    }

    function toggleLesson(lessonId, btn) {
        const index = completedLessons.indexOf(lessonId);
        let isComplete = false;

        if (index > -1) {
            completedLessons.splice(index, 1);
            isComplete = false;
        } else {
            completedLessons.push(lessonId);
            isComplete = true;
            triggerWinEffect();
        }

        localStorage.setItem(`hl_progress_${LEVEL_ID}`, JSON.stringify(completedLessons));
        updateAllUI();
    }

    function triggerWinEffect() {
        confetti({
            particleCount: 100,
            spread: 70,
            origin: { y: 0.6 },
            colors: ['#e11d48', '#fb7185', '#ffffff'] // Rose palette
        });
    }

    function updateAllUI() {
        // Update checkboxes
        document.querySelectorAll('.lesson-check-btn').forEach(btn => {
            const id = btn.getAttribute('onclick').match(/'([^']+)'/)[1];
            const isDone = completedLessons.includes(id);
            const checkIcon = btn.querySelector('.check-icon');
            const textSpan = btn.nextElementSibling;

            if (isDone) {
                checkIcon.classList.remove('text-transparent', 'border-gray-300', 'dark:border-gray-500');
                checkIcon.classList.add('bg-rose-600', 'border-rose-600', 'text-white');
                if (textSpan) textSpan.classList.add('line-through', 'opacity-50');
            } else {
                checkIcon.classList.add('text-transparent', 'border-gray-300', 'dark:border-gray-500');
                checkIcon.classList.remove('bg-rose-600', 'border-rose-600', 'text-white');
                if (textSpan) textSpan.classList.remove('line-through', 'opacity-50');
            }
        });

        // Update topic bars
        updateTopicProgress('topic-a');
        updateTopicProgress('topic-b');
        
        // Update level progress
        updateLevelOverall();
    }

    function updateTopicProgress(topicPrefix) {
        const topicBtns = Array.from(document.querySelectorAll('.lesson-check-btn')).filter(b => 
            b.getAttribute('onclick').includes(topicPrefix)
        );
        const total = topicBtns.length;
        if (total === 0) return;

        const completed = topicBtns.filter(b => {
            const id = b.getAttribute('onclick').match(/'([^']+)'/)[1];
            return completedLessons.includes(id);
        }).length;

        const pct = Math.round((completed / total) * 100);
        const bar = document.getElementById(`progress-${topicPrefix}`);
        if (bar) bar.style.width = `${pct}%`;
    }

    function updateLevelOverall() {
        const total = document.querySelectorAll('.lesson-check-btn').length;
        const reached = completedLessons.length;
        const pct = total > 0 ? Math.round((reached / total) * 100) : 0;
        
        const bar = document.getElementById('module-progress-bar');
        const text = document.getElementById('module-progress-text');
        
        if (bar) bar.style.width = `${pct}%`;
        if (text) text.innerText = `${pct}%`;
    }

    // --- Reveal on Scroll Logic ---
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-reveal');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal-section, article').forEach(el => {
        el.style.opacity = '0';
        revealObserver.observe(el);
    });

    const style = document.createElement('style');
    style.innerHTML = `
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fade-in-up 0.5s ease-out forwards; }
    `;
    document.head.appendChild(style);
</script>

<?php include '../src/footer.php'; ?>