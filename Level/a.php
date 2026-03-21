<?php
// Page-Specific Metadata
$pageTitle       = "Pre-K Level A | Hesten's Learning";
$pageDescription = "Foundational Skills in Math, Language Arts, Science, and Social Studies designed for early learners.";
$pageKeywords    = "Pre-K, math, language arts, science, social studies, early learning";
$pageAuthor      = "Hesten's Learning";

// Include Global Header
include '../src/header.php';
?>

<!-- Level A Specific Sub-Nav (Sticky Tabs) -->
<div class="sticky top-0 z-30 bg-base-bg/95 backdrop-blur-md border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="flex overflow-x-auto py-3 gap-2 no-scrollbar" role="tablist" aria-label="Subject navigation tabs">
            <button onclick="switchTab('math')" id="tab-math"
                class="tab-button active flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm transition-all duration-300 border border-transparent hover:bg-primary/10 hover:text-primary aria-selected:bg-primary aria-selected:text-white aria-selected:shadow-md"
                aria-selected="true" role="tab" aria-controls="content-math">
                <i class="fas fa-calculator"></i> Math
            </button>
            <button onclick="switchTab('ela')" id="tab-ela"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-primary/10 hover:text-primary aria-selected:bg-primary aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-ela">
                <i class="fas fa-book-open"></i> Language Arts
            </button>
            <button onclick="switchTab('science')" id="tab-science"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-primary/10 hover:text-primary aria-selected:bg-primary aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-science">
                <i class="fas fa-flask"></i> Science
            </button>
            <button onclick="switchTab('social')" id="tab-social"
                class="tab-button flex-shrink-0 flex items-center gap-2 px-6 py-2 rounded-full font-bold text-sm text-text-secondary transition-all duration-300 border border-transparent hover:bg-primary/10 hover:text-primary aria-selected:bg-primary aria-selected:text-white aria-selected:shadow-md"
                aria-selected="false" role="tab" aria-controls="content-social">
                <i class="fas fa-globe-americas"></i> Social Studies
            </button>
        </div>
    </div>
</div>

<!-- Hero Section -->
<header class="relative bg-gradient-to-br from-primary via-secondary to-accent text-white py-16 px-4 mb-12 overflow-hidden rounded-b-[2.5rem] shadow-xl">
    <!-- Abstract Background Patterns -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-white rounded-full mix-blend-overlay filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute top-1/2 right-0 w-72 h-72 bg-yellow-300 rounded-full mix-blend-overlay filter blur-3xl opacity-30"></div>
        <i class="fas fa-shapes absolute top-10 left-10 text-9xl animate-pulse text-white/10"></i>
        <i class="fas fa-star absolute bottom-10 right-10 text-8xl animate-spin-slow text-white/10" style="animation-duration: 12s;"></i>
        <!-- Geometric pattern overlay -->
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="container mx-auto text-center relative z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-xs font-bold mb-4 tracking-wide uppercase backdrop-blur-md">
            Pre-K Curriculum
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">
            Level <span class="text-white underline decoration-wavy decoration-accent">A</span>
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed mb-8">
            Start your journey here. Master counting, identifying objects, and exploring the world around you.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="../assessment/index.php"
                class="inline-block px-8 py-3 bg-white text-primary font-bold rounded-full hover:bg-gray-100 transition-colors shadow-lg transform hover:-translate-y-1">
                <i class="fas fa-star mr-2 text-yellow-400"></i> Take Assessment
            </a>
            <button onclick="document.getElementById('main-content').scrollIntoView({behavior: 'smooth'})"
                class="inline-block px-8 py-3 bg-primary/20 backdrop-blur-sm border border-white/30 text-white font-bold rounded-full hover:bg-primary/30 transition-colors shadow-lg">
                Start Learning <i class="fas fa-arrow-down ml-2"></i>
            </button>
        </div>
    </div>
</header>

<!-- Main Content Area -->
<main id="main-content" class="container mx-auto px-4 pb-24 min-h-[60vh] scroll-mt-32" tabindex="-1">

    <!-- MATH SECTION -->
    <section id="content-math" class="tab-content block animate-fade-in-up" role="tabpanel">

        <!-- Module Header & Progress -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 pb-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-blue-600 text-white flex items-center justify-center text-3xl shadow-lg shadow-primary/20">
                    <i class="fas fa-calculator"></i>
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-text-default">Module 1: Counting to 5</h2>
                    <p class="text-text-secondary text-sm md:text-base">Foundations of numbers and object recognition.</p>
                </div>
            </div>

            <!-- Overall Module Progress -->
            <div class="bg-base-bg border border-gray-200 dark:border-gray-700 rounded-xl p-4 flex items-center gap-4 shadow-sm min-w-[250px]">
                <div class="flex-grow">
                    <div class="flex justify-between text-xs font-bold uppercase tracking-wider mb-1">
                        <span class="text-text-secondary">Module Progress</span>
                        <span class="text-primary" id="module-progress-text">0%</span>
                    </div>
                    <div class="h-2 w-full bg-gray-100 dark:bg-gray-800 rounded-full overflow-hidden">
                        <div id="module-progress-bar" class="h-full bg-primary transition-all duration-1000 ease-out" style="width: 0%"></div>
                    </div>
                </div>
                <div class="text-primary text-xl">
                    <i class="fas fa-trophy"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Topic Card A -->
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col relative group">
                <div class="p-6 flex-grow relative">
                    <!-- Progress Bar for this Card -->
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gray-100 dark:bg-gray-800">
                        <div class="h-full bg-primary transition-all duration-500" style="width: 0%" id="progress-topic-a"></div>
                    </div>

                    <!-- TTS Button -->
                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary shadow-sm z-10"
                        onclick="toggleSpeech(this)" data-title="Topic A: Matching Objects"
                        data-desc="Learn to identify identical objects and match things that go together."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <div class="text-xs font-semibold text-primary/80 mb-2 uppercase tracking-wider badge badge-ghost">CCSS Range: PK.CC.1 - PK.CC.4</div>
                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic A: Matching Objects</h3>
                    <p class="text-text-secondary mb-6 leading-relaxed">
                        Learn to identify identical objects and match things that go together.
                    </p>

                    <!-- Interactive Lesson List -->
                    <ul class="space-y-3 mb-6 lesson-list">
                        <!-- Lesson 1 -->
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-primary/5 transition-colors group border border-transparent hover:border-primary/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-a-1', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-primary flex items-center justify-center transition-transform active:scale-95"
                                    aria-label="Mark Lesson 1 as complete" aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="openLesson('topic-a-1')">
                                    <span class="text-primary font-bold">Lesson 1:</span> Identify identical objects.
                                </span>
                            </div>
                            <div class="pl-14 sm:pl-0 w-full sm:w-auto">
                                <button onclick="openLesson('topic-a-1')" class="px-5 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-default text-xs font-bold hover:bg-primary hover:text-white hover:border-primary transition-all flex items-center justify-center gap-2 w-full sm:w-auto shadow-sm">
                                    <i class="fas fa-book-reader"></i> Learn
                                </button>
                            </div>
                        </li>

                        <!-- Lesson 2-3 -->
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-primary/5 transition-colors group border border-transparent hover:border-primary/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-a-2', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-primary flex items-center justify-center transition-transform active:scale-95"
                                    aria-label="Mark Lesson 2-3 as complete" aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="openLesson('topic-a-2')">
                                    <span class="text-primary font-bold">Lesson 2–3:</span> Match 2 objects that are the same.
                                </span>
                            </div>
                            <div class="pl-14 sm:pl-0 w-full sm:w-auto">
                                <button onclick="openLesson('topic-a-2')" class="px-5 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-default text-xs font-bold hover:bg-primary hover:text-white hover:border-primary transition-all flex items-center justify-center gap-2 w-full sm:w-auto shadow-sm">
                                    <i class="fas fa-book-reader"></i> Learn
                                </button>
                            </div>
                        </li>

                        <!-- Lesson 4 -->
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-primary/5 transition-colors group border border-transparent hover:border-primary/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-a-3', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-primary flex items-center justify-center transition-transform active:scale-95"
                                    aria-label="Mark Lesson 4 as complete" aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="openLesson('topic-a-3')">
                                    <span class="text-primary font-bold">Lesson 4:</span> Match 2 objects that are used together.
                                </span>
                            </div>
                            <div class="pl-14 sm:pl-0 w-full sm:w-auto">
                                <button onclick="openLesson('topic-a-3')" class="px-5 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-default text-xs font-bold hover:bg-primary hover:text-white hover:border-primary transition-all flex items-center justify-center gap-2 w-full sm:w-auto shadow-sm">
                                    <i class="fas fa-book-reader"></i> Learn
                                </button>
                            </div>
                        </li>
                    </ul>

                    <!-- TEACHER RESOURCES (Hidden by default) -->
                    <div class="teacher-only mt-4 pt-4 border-t border-dashed border-accent/20">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-xs font-bold text-accent uppercase tracking-wider">
                                <i class="fas fa-chalkboard-teacher mr-1"></i> Teacher Resources
                            </h4>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-3 py-1.5 bg-accent/5 border border-accent/20 rounded-md text-xs font-bold text-accent hover:bg-accent/10 transition-colors flex items-center gap-1">
                                <i class="fas fa-file-alt"></i> Plan
                            </button>
                            <button class="px-3 py-1.5 bg-accent/5 border border-accent/20 rounded-md text-xs font-bold text-accent hover:bg-accent/10 transition-colors flex items-center gap-1">
                                <i class="fas fa-key"></i> Key
                            </button>
                        </div>
                    </div>

                </div>
            </article>

            <!-- Topic Card B -->
            <article class="bg-content-bg rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col relative group">
                <div class="p-6 flex-grow relative">
                    <!-- Progress Bar for this Card -->
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gray-100 dark:bg-gray-800">
                        <div class="h-full bg-primary transition-all duration-500" style="width: 0%" id="progress-topic-b"></div>
                    </div>

                    <!-- TTS Button -->
                    <button type="button"
                        class="absolute top-4 right-4 w-10 h-10 rounded-full bg-base-bg text-primary hover:bg-primary hover:text-white transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary shadow-sm z-10"
                        onclick="toggleSpeech(this)" data-title="Topic B: Sorting"
                        data-desc="Understand attributes and how to sort items into groups."
                        aria-label="Read description aloud">
                        <i class="fas fa-volume-up"></i>
                    </button>

                    <div class="text-xs font-semibold text-primary/80 mb-2 uppercase tracking-wider badge badge-ghost">CCSS Range: PK.MD.1 - PK.MD.3</div>
                    <h3 class="text-xl font-bold text-text-default mb-2 pr-12">Topic B: Sorting</h3>
                    <p class="text-text-secondary mb-6 leading-relaxed">
                        Understand attributes and how to sort items into groups.
                    </p>

                    <ul class="space-y-3 mb-6 lesson-list">
                        <!-- Lesson 5 -->
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-primary/5 transition-colors group border border-transparent hover:border-primary/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-b-1', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-primary flex items-center justify-center transition-transform active:scale-95"
                                    aria-label="Mark Lesson 5 as complete" aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="openLesson('topic-b-1')">
                                    <span class="text-primary font-bold">Lesson 5:</span> Make one group with a given attribute.
                                </span>
                            </div>
                            <div class="pl-14 sm:pl-0 w-full sm:w-auto">
                                <button onclick="openLesson('topic-b-1')" class="px-5 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-default text-xs font-bold hover:bg-primary hover:text-white hover:border-primary transition-all flex items-center justify-center gap-2 w-full sm:w-auto shadow-sm">
                                    <i class="fas fa-book-reader"></i> Learn
                                </button>
                            </div>
                        </li>

                        <!-- Lesson 6 -->
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-primary/5 transition-colors group border border-transparent hover:border-primary/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-b-2', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-primary flex items-center justify-center transition-transform active:scale-95"
                                    aria-label="Mark Lesson 6 as complete" aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="openLesson('topic-b-2')">
                                    <span class="text-primary font-bold">Lesson 6:</span> Sort into two groups.
                                </span>
                            </div>
                            <div class="pl-14 sm:pl-0 w-full sm:w-auto">
                                <button onclick="openLesson('topic-b-2')" class="px-5 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-default text-xs font-bold hover:bg-primary hover:text-white hover:border-primary transition-all flex items-center justify-center gap-2 w-full sm:w-auto shadow-sm">
                                    <i class="fas fa-book-reader"></i> Learn
                                </button>
                            </div>
                        </li>

                        <!-- Lesson 7 -->
                        <li class="flex flex-col sm:flex-row sm:items-center gap-3 p-3 rounded-xl bg-gray-50/50 dark:bg-gray-800/20 hover:bg-primary/5 transition-colors group border border-transparent hover:border-primary/20">
                            <div class="flex items-center gap-3 flex-grow">
                                <button onclick="toggleLesson('topic-b-3', this)"
                                    class="lesson-check-btn flex-shrink-0 w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-primary flex items-center justify-center transition-transform active:scale-95"
                                    aria-label="Mark Lesson 7 as complete" aria-pressed="false">
                                    <div class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-500 flex items-center justify-center text-xs text-transparent group-hover:border-primary transition-all check-icon bg-white dark:bg-gray-900">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </button>
                                <span class="text-sm text-text-default flex-grow leading-snug cursor-pointer font-medium" onclick="openLesson('topic-b-3')">
                                    <span class="text-primary font-bold">Lesson 7:</span> Sort the same group in two ways.
                                </span>
                            </div>
                            <div class="pl-14 sm:pl-0 w-full sm:w-auto">
                                <button onclick="openLesson('topic-b-3')" class="px-5 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 text-text-default text-xs font-bold hover:bg-primary hover:text-white hover:border-primary transition-all flex items-center justify-center gap-2 w-full sm:w-auto shadow-sm">
                                    <i class="fas fa-book-reader"></i> Learn
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </article>

        </div>
    </section>

    <!-- LANGUAGE ARTS SECTION -->
    <section id="content-ela" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="bg-content-bg rounded-3xl border border-gray-200 dark:border-gray-700 p-8 text-center relative overflow-hidden">
            <!-- Background Decal -->
            <i class="fas fa-book-open absolute -bottom-10 -right-10 text-9xl text-gray-100 dark:text-gray-800"></i>

            <div class="relative z-10 max-w-2xl mx-auto">
                <div class="w-24 h-24 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center text-red-500 text-4xl mb-6 mx-auto animate-bounce-slow">
                    <i class="fas fa-pencil-alt"></i>
                </div>
                <h2 class="text-3xl font-bold text-text-default mb-4">Language Arts is Opening Soon!</h2>
                <p class="text-text-secondary text-lg mb-8">We are crafting exciting stories, rhyming games, and letter adventures. Stay tuned for updates!</p>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-left">
                    <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700">
                        <div class="font-bold text-gray-400 text-xs uppercase mb-1">Coming Next</div>
                        <div class="font-bold text-text-default"><i class="fas fa-font mr-2 text-red-400"></i> The Alphabet</div>
                    </div>
                    <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700">
                        <div class="font-bold text-gray-400 text-xs uppercase mb-1">In Development</div>
                        <div class="font-bold text-text-default"><i class="fas fa-music mr-2 text-red-400"></i> Rhyme Time</div>
                    </div>
                    <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700">
                        <div class="font-bold text-gray-400 text-xs uppercase mb-1">Planned</div>
                        <div class="font-bold text-text-default"><i class="fas fa-pen-fancy mr-2 text-red-400"></i> Tracing</div>
                    </div>
                </div>

                <button class="mt-8 px-6 py-3 bg-red-500 text-white font-bold rounded-full hover:bg-red-600 transition-colors shadow-lg">
                    <i class="far fa-bell mr-2"></i> Notify Me
                </button>
            </div>
        </div>
    </section>

    <!-- SCIENCE SECTION -->
    <section id="content-science" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="bg-content-bg rounded-3xl border border-gray-200 dark:border-gray-700 p-8 text-center relative overflow-hidden">
            <!-- Background Decal -->
            <i class="fas fa-microscope absolute -bottom-10 -right-10 text-9xl text-gray-100 dark:text-gray-800"></i>

            <div class="relative z-10 max-w-2xl mx-auto">
                <div class="w-24 h-24 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center text-green-500 text-4xl mb-6 mx-auto animate-bounce-slow">
                    <i class="fas fa-leaf"></i>
                </div>
                <h2 class="text-3xl font-bold text-text-default mb-4">Science Lab Under Construction</h2>
                <p class="text-text-secondary text-lg mb-8">Get your lab coats ready! We're preparing experiments about nature, weather, and animals.</p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <div class="flex items-center gap-3 p-3 bg-green-50 dark:bg-green-900/20 rounded-lg text-green-700 dark:text-green-300 font-bold">
                        <i class="fas fa-check-circle"></i> Nature Walk
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-100 dark:bg-gray-800 rounded-lg text-gray-500 font-bold">
                        <i class="fas fa-lock"></i> Weather Watch
                    </div>
                    <div class="flex items-center gap-3 p-3 bg-gray-100 dark:bg-gray-800 rounded-lg text-gray-500 font-bold">
                        <i class="fas fa-lock"></i> Five Senses
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SOCIAL STUDIES SECTION -->
    <section id="content-social" class="tab-content hidden animate-fade-in-up" role="tabpanel">
        <div class="bg-content-bg rounded-3xl border border-gray-200 dark:border-gray-700 p-8 text-center relative overflow-hidden">
            <!-- Background Decal -->
            <i class="fas fa-globe-americas absolute -bottom-10 -right-10 text-9xl text-gray-100 dark:text-gray-800"></i>

            <div class="relative z-10 max-w-2xl mx-auto">
                <div class="w-24 h-24 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center text-purple-500 text-4xl mb-6 mx-auto animate-bounce-slow">
                    <i class="fas fa-users"></i>
                </div>
                <h2 class="text-3xl font-bold text-text-default mb-4">Exploring Our World Soon</h2>
                <p class="text-text-secondary text-lg mb-8">Travel around the community and the world. We are building the map right now!</p>
                <button class="px-6 py-3 border-2 border-purple-500 text-purple-500 font-bold rounded-full hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-colors">
                    View Curriculum Map
                </button>
            </div>
        </div>
    </section>

</main>

<!-- Confetti Library -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<!-- PAGE SPECIFIC SCRIPTS -->
<script>
    // Data for Full Lessons (Based on GPK Module 1 Topic A)
    const lessonData = {
        'topic-a-1': {
            title: "Lesson 1: Identify identical objects",
            content: `
                <div class="space-y-8">
                    <!-- LEARN SECTION -->
                    <div class="learn-section border-l-4 border-primary pl-4 md:pl-6 py-2">
                        <div class="flex items-center gap-2 mb-4 text-primary">
                            <i class="fas fa-book-reader text-xl"></i>
                            <h4 class="text-lg font-bold uppercase tracking-wider">Learn</h4>
                        </div>
                        
                        <div class="prose dark:prose-invert max-w-none">
                            <h3 class="text-2xl font-bold text-primary mb-2">Can you find the match?</h3>
                            <p class="text-lg leading-relaxed text-text-default">
                                <strong>Objective:</strong> We are going to find two things that are <em>exactly the same</em>.
                            </p>
                            
                            <!-- Count to 2 Chant Visual -->
                            <div class="bg-yellow-50 dark:bg-yellow-900/20 p-6 rounded-2xl border border-yellow-200 dark:border-yellow-700 my-6">
                                <h4 class="text-lg font-bold text-yellow-800 dark:text-yellow-200 mb-4 text-center">🎶 Let's Chant: Count to 2!</h4>
                                <div class="text-center space-y-3 text-lg font-medium text-text-default">
                                    <p>"1, 2, I count 2."</p>
                                    <p>"1, 2, I clap 2." <span class="text-sm text-text-secondary">(Clap, Clap!)</span></p>
                                    <p>"1, 2, Me and You!" <span class="text-sm text-text-secondary">(Link arms with a friend!)</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PRACTICE SECTION -->
                    <div class="practice-section bg-secondary/10 border border-secondary/20 rounded-2xl p-6 relative">
                        <div class="absolute top-0 right-0 p-3 opacity-10 text-secondary">
                            <i class="fas fa-puzzle-piece text-6xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-secondary mb-4 flex items-center gap-2">
                            <i class="fas fa-gamepad"></i> Practice: Find the Exact Match
                        </h4>
                        <p class="mb-4 text-text-default">Look at the pictures. Tap the two that are <strong>exactly</strong> the same.</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 relative z-10">
                            <!-- Correct Items -->
                            <div onclick="checkPracticeAnswer(this, true)" class="aspect-square bg-base-bg p-4 rounded-xl border-2 border-transparent hover:border-secondary cursor-pointer transition-all flex flex-col items-center justify-center gap-2 group practice-item shadow-sm">
                                <i class="fas fa-duck text-4xl text-yellow-400 group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold text-text-secondary">Yellow Duck</span>
                            </div>
                            <div onclick="checkPracticeAnswer(this, false)" class="aspect-square bg-base-bg p-4 rounded-xl border-2 border-transparent hover:border-secondary cursor-pointer transition-all flex flex-col items-center justify-center gap-2 group practice-item shadow-sm">
                                <i class="fas fa-cat text-4xl text-gray-500 group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold text-text-secondary">Cat</span>
                            </div>
                            <div onclick="checkPracticeAnswer(this, false)" class="aspect-square bg-base-bg p-4 rounded-xl border-2 border-transparent hover:border-secondary cursor-pointer transition-all flex flex-col items-center justify-center gap-2 group practice-item shadow-sm">
                                <i class="fas fa-dog text-4xl text-brown-500 group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold text-text-secondary">Dog</span>
                            </div>
                            <div onclick="checkPracticeAnswer(this, true)" class="aspect-square bg-base-bg p-4 rounded-xl border-2 border-transparent hover:border-secondary cursor-pointer transition-all flex flex-col items-center justify-center gap-2 group practice-item shadow-sm">
                                <i class="fas fa-duck text-4xl text-yellow-400 group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold text-text-secondary">Yellow Duck</span>
                            </div>
                        </div>
                         <p id="practice-feedback" class="text-center font-bold h-6 mt-4 text-lg"></p>
                    </div>
                </div>
            `
        },
        'topic-a-2': {
            title: "Lesson 2–3: Match 2 objects that are the same",
            content: `
                <div class="space-y-8">
                    <!-- LEARN SECTION -->
                    <div class="learn-section border-l-4 border-primary pl-4 md:pl-6 py-2">
                        <div class="flex items-center gap-2 mb-4 text-primary">
                            <i class="fas fa-book-reader text-xl"></i>
                            <h4 class="text-lg font-bold uppercase tracking-wider">Learn</h4>
                        </div>
                        <h3 class="text-2xl font-bold text-primary mb-2">Same... but different!</h3>
                        <p class="text-lg leading-relaxed text-text-default">
                            <strong>Objective:</strong> Sometimes things are matches, but they aren't <em>exactly</em> the same. One might be big and one might be small!
                        </p>
                    </div>
                    
                    <!-- PRACTICE SECTION -->
                    <div class="practice-section bg-secondary/10 border border-secondary/20 rounded-2xl p-6 relative">
                         <div class="absolute top-0 right-0 p-3 opacity-10 text-secondary">
                            <i class="fas fa-shapes text-6xl"></i>
                        </div>
                        <h4 class="text-lg font-bold text-secondary mb-4 flex items-center gap-2 relative z-10">
                            <i class="fas fa-gamepad"></i> Practice: Tap the MATCH
                        </h4>
                        <p class="mb-4 text-text-default">Find the item that matches the <strong>Big Orange Paw</strong>.</p>
                        
                        <div class="flex justify-center mb-6">
                             <div class="bg-white p-4 rounded-xl shadow-md border border-gray-200">
                                <i class="fas fa-paw text-6xl text-orange-400"></i>
                             </div>
                        </div>

                        <div class="grid grid-cols-3 gap-4 relative z-10">
                            <div onclick="checkPracticeAnswer(this, false)" class="bg-base-bg p-6 rounded-xl border-2 border-dashed border-gray-300 hover:border-secondary cursor-pointer flex flex-col items-center gap-2">
                                <i class="fas fa-square text-4xl text-blue-500"></i>
                                <span class="text-xs text-text-secondary">Blue Square</span>
                            </div>
                            <div onclick="checkPracticeAnswer(this, true)" class="bg-base-bg p-6 rounded-xl border-2 border-dashed border-gray-300 hover:border-secondary cursor-pointer flex flex-col items-center gap-2">
                                <i class="fas fa-paw text-3xl text-orange-400"></i>
                                <span class="text-xs text-text-secondary">Small Paw</span>
                            </div>
                            <div onclick="checkPracticeAnswer(this, false)" class="bg-base-bg p-6 rounded-xl border-2 border-dashed border-gray-300 hover:border-secondary cursor-pointer flex flex-col items-center gap-2">
                                <i class="fas fa-paw text-4xl text-black"></i>
                                <span class="text-xs text-text-secondary">Black Paw</span>
                            </div>
                        </div>
                        <p id="practice-feedback" class="text-center font-bold h-6 mt-4 text-lg"></p>
                    </div>
                </div>
            `
        },
        'topic-a-3': {
            title: "Lesson 4: Match 2 objects that are used together",
            content: `
                 <div class="space-y-8">
                    <!-- LEARN SECTION -->
                    <div class="learn-section border-l-4 border-primary pl-4 md:pl-6 py-2">
                        <div class="flex items-center gap-2 mb-4 text-primary">
                            <i class="fas fa-book-reader text-xl"></i>
                            <h4 class="text-lg font-bold uppercase tracking-wider">Learn</h4>
                        </div>
                        <h3 class="text-2xl font-bold text-primary mb-2">Things that Go Together</h3>
                        <p class="text-lg leading-relaxed text-text-default">
                            <strong>Objective:</strong> Some things go together like peanut butter and jelly! Even if they don't look the same, they are partners.
                        </p>
                    </div>

                    <!-- PRACTICE SECTION -->
                    <div class="practice-section bg-secondary/10 border border-secondary/20 rounded-2xl p-6 relative">
                        <div class="absolute top-0 right-0 p-3 opacity-10 text-secondary">
                            <i class="fas fa-link text-6xl"></i>
                        </div>
                         <h4 class="text-lg font-bold text-secondary mb-4 flex items-center gap-2 relative z-10">
                            <i class="fas fa-gamepad"></i> Practice: What goes with the Bowl?
                        </h4>
                        
                         <div class="flex justify-center mb-6">
                             <div class="bg-white p-4 rounded-xl shadow-md border border-gray-200">
                                <div class="text-6xl">🥣</div>
                             </div>
                        </div>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 relative z-10">
                             <div onclick="checkPracticeAnswer(this, false)" class="bg-base-bg p-4 rounded-xl border-2 border-dashed border-gray-300 hover:border-secondary cursor-pointer flex flex-col items-center gap-2">
                                <div class="text-4xl">👟</div>
                                <span class="text-xs text-text-secondary">Shoe</span>
                            </div>
                            <div onclick="checkPracticeAnswer(this, true)" class="bg-base-bg p-4 rounded-xl border-2 border-dashed border-gray-300 hover:border-secondary cursor-pointer flex flex-col items-center gap-2">
                                <div class="text-4xl">🥄</div>
                                <span class="text-xs text-text-secondary">Spoon</span>
                            </div>
                            <div onclick="checkPracticeAnswer(this, false)" class="bg-base-bg p-4 rounded-xl border-2 border-dashed border-gray-300 hover:border-secondary cursor-pointer flex flex-col items-center gap-2">
                                <div class="text-4xl">🚗</div>
                                <span class="text-xs text-text-secondary">Car</span>
                            </div>
                        </div>
                        <p id="practice-feedback" class="text-center font-bold h-6 mt-4 text-lg"></p>
                    </div>
                </div>
            `
        },
        'topic-b-1': {
            title: "Lesson 5: Make one group with a given attribute",
            content: `
                <div class="space-y-8">
                     <!-- LEARN SECTION -->
                     <div class="learn-section border-l-4 border-primary pl-4 md:pl-6 py-2">
                        <div class="flex items-center gap-2 mb-4 text-primary">
                            <i class="fas fa-book-reader text-xl"></i>
                            <h4 class="text-lg font-bold uppercase tracking-wider">Learn</h4>
                        </div>
                        <h3 class="text-2xl font-bold text-primary mb-2">What is a Group?</h3>
                        <p class="text-lg leading-relaxed text-text-default">
                             A <strong>group</strong> is a collection of things that share something special. Look at these apples. They are all RED. That is their attribute!
                        </p>
                        <div class="flex gap-4 justify-center my-6">
                            <i class="fas fa-apple-alt text-5xl text-red-500 animate-bounce" style="animation-delay: 0s;"></i>
                            <i class="fas fa-apple-alt text-5xl text-red-500 animate-bounce" style="animation-delay: 0.2s;"></i>
                            <i class="fas fa-apple-alt text-5xl text-red-500 animate-bounce" style="animation-delay: 0.4s;"></i>
                        </div>
                    </div>
                    
                    <!-- PRACTICE SECTION -->
                    <div class="practice-section bg-secondary/10 border border-secondary/20 rounded-2xl p-6 relative">
                         <h4 class="text-lg font-bold text-secondary mb-4 flex items-center gap-2 relative z-10">
                            <i class="fas fa-gamepad"></i> Practice: Find the Red Fruit
                        </h4>
                        <p class="mb-4 text-text-default">Tap all the <strong>RED</strong> items to make a group.</p>
                        
                        <div class="grid grid-cols-4 gap-4">
                             <div onclick="checkPracticeAnswer(this, true)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-red-300 cursor-pointer text-center">
                                <i class="fas fa-apple-alt text-4xl text-red-500"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, false)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-red-300 cursor-pointer text-center">
                                <i class="fas fa-lemon text-4xl text-yellow-400"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, true)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-red-300 cursor-pointer text-center">
                                <i class="fas fa-pepper-hot text-4xl text-red-500"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, false)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-red-300 cursor-pointer text-center">
                                <i class="fas fa-carrot text-4xl text-orange-500"></i>
                             </div>
                        </div>
                        <p id="practice-feedback" class="text-center font-bold h-6 mt-4 text-lg"></p>
                    </div>
                </div>`
        },
        'topic-b-2': {
            title: "Lesson 6: Sort into two groups",
            content: `
                <div class="space-y-8">
                     <!-- LEARN SECTION -->
                     <div class="learn-section border-l-4 border-primary pl-4 md:pl-6 py-2">
                        <div class="flex items-center gap-2 mb-4 text-primary">
                            <i class="fas fa-book-reader text-xl"></i>
                            <h4 class="text-lg font-bold uppercase tracking-wider">Learn</h4>
                        </div>
                         <h3 class="text-2xl font-bold text-primary mb-2">Sorting Time!</h3>
                        <p class="text-lg leading-relaxed text-text-default">
                           We can sort things into TWO piles. One pile for <strong>Animals</strong> <i class="fas fa-cat"></i>. One pile for <strong>Plants</strong> <i class="fas fa-leaf"></i>.
                        </p>
                    </div>
                    
                    <!-- PRACTICE SECTION -->
                    <div class="practice-section bg-secondary/10 border border-secondary/20 rounded-2xl p-6 relative">
                         <h4 class="text-lg font-bold text-secondary mb-4 flex items-center gap-2 relative z-10">
                            <i class="fas fa-gamepad"></i> Practice: Tap the Animals
                        </h4>
                        <p class="mb-4 text-text-default">Find all the <strong>Animals</strong>. Do not tap the plants!</p>
                        
                        <div class="grid grid-cols-4 gap-4">
                             <div onclick="checkPracticeAnswer(this, true)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-blue-300 cursor-pointer text-center">
                                <i class="fas fa-dog text-4xl text-brown-600"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, false)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-blue-300 cursor-pointer text-center">
                                <i class="fas fa-tree text-4xl text-green-600"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, false)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-blue-300 cursor-pointer text-center">
                                <i class="fas fa-leaf text-4xl text-green-500"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, true)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-blue-300 cursor-pointer text-center">
                                <i class="fas fa-cat text-4xl text-gray-500"></i>
                             </div>
                        </div>
                         <p id="practice-feedback" class="text-center font-bold h-6 mt-4 text-lg"></p>
                    </div>
                </div>`
        },
        'topic-b-3': {
            title: "Lesson 7: Sort the same group in two ways",
            content: `
                <div class="space-y-8">
                     <!-- LEARN SECTION -->
                     <div class="learn-section border-l-4 border-primary pl-4 md:pl-6 py-2">
                        <div class="flex items-center gap-2 mb-4 text-primary">
                            <i class="fas fa-book-reader text-xl"></i>
                            <h4 class="text-lg font-bold uppercase tracking-wider">Learn</h4>
                        </div>
                        <h3 class="text-2xl font-bold text-primary mb-2">Magic Sorting</h3>
                        <p class="text-lg leading-relaxed text-text-default">
                            Flexibility in thinking is key here. Can we sort these buttons by <strong>Color</strong>? Yes. Now mix them up. Can we sort the SAME buttons by <strong>Shape</strong>? Yes!
                        </p>
                    </div>
                    
                    <!-- PRACTICE SECTION -->
                    <div class="practice-section bg-secondary/10 border border-secondary/20 rounded-2xl p-6 relative">
                         <h4 class="text-lg font-bold text-secondary mb-4 flex items-center gap-2 relative z-10">
                            <i class="fas fa-gamepad"></i> Practice: Sort by COLOR
                        </h4>
                        <p class="mb-4 text-text-default">Tap all the <strong>BLUE</strong> buttons.</p>
                        
                        <div class="grid grid-cols-4 gap-4">
                             <div onclick="checkPracticeAnswer(this, true)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-blue-400 cursor-pointer text-center">
                                <i class="fas fa-circle text-4xl text-blue-500"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, false)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-blue-400 cursor-pointer text-center">
                                <i class="fas fa-square text-4xl text-red-500"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, true)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-blue-400 cursor-pointer text-center">
                                <i class="fas fa-square text-4xl text-blue-500"></i>
                             </div>
                             <div onclick="checkPracticeAnswer(this, false)" class="bg-white p-4 rounded-xl shadow-sm border-2 border-transparent hover:border-blue-400 cursor-pointer text-center">
                                <i class="fas fa-circle text-4xl text-green-500"></i>
                             </div>
                        </div>
                         <p id="practice-feedback" class="text-center font-bold h-6 mt-4 text-lg"></p>
                    </div>
                </div>`
        }
    };

    // Tab Switching Logic
    function switchTab(tabName) {
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => content.classList.add('hidden'));

        const buttons = document.querySelectorAll('.tab-button');
        buttons.forEach(btn => {
            btn.classList.remove('active', 'text-white', 'shadow-md', 'bg-primary');
            btn.setAttribute('aria-selected', 'false');
            btn.classList.add('text-text-secondary', 'border-transparent', 'hover:bg-primary/10', 'hover:text-primary');
        });

        const targetContent = document.getElementById(`content-${tabName}`);
        if (targetContent) targetContent.classList.remove('hidden');

        const targetBtn = document.getElementById(`tab-${tabName}`);
        if (targetBtn) {
            targetBtn.classList.add('active', 'text-white', 'bg-primary', 'shadow-md');
            targetBtn.setAttribute('aria-selected', 'true');
            targetBtn.classList.remove('text-text-secondary', 'border-transparent', 'hover:bg-primary/10', 'hover:text-primary');
        }
    }

    // --- Interactive Practice Logic ---
    function checkPracticeAnswer(element, isCorrect) {
        const feedbackEl = element.closest('.practice-section').querySelector('#practice-feedback');

        // Reset styles for siblings
        const parent = element.parentElement;
        Array.from(parent.children).forEach(child => {
            child.classList.remove('ring-4', 'ring-green-400', 'ring-red-400', 'opacity-50');
        });

        if (isCorrect) {
            element.classList.add('ring-4', 'ring-green-400');
            // Animate Success
            element.animate([{
                    transform: 'scale(1)'
                },
                {
                    transform: 'scale(1.1)'
                },
                {
                    transform: 'scale(1)'
                }
            ], {
                duration: 300
            });

            feedbackEl.innerText = "Correct! Great job! 🎉";
            feedbackEl.className = "text-center font-bold h-6 mt-4 text-lg text-green-600 animate-bounce";

            // Pulse the Mark Complete button to nudge user
            const completeBtn = document.getElementById('modalCompleteBtn');
            if (completeBtn) completeBtn.classList.add('animate-pulse');

            // Optional: Mini confetti
            const rect = element.getBoundingClientRect();
            confetti({
                particleCount: 15,
                spread: 30,
                origin: {
                    x: (rect.left + rect.width / 2) / window.innerWidth,
                    y: (rect.top + rect.height / 2) / window.innerHeight
                },
                disableForReducedMotion: true
            });

        } else {
            element.classList.add('ring-4', 'ring-red-400');
            element.animate([{
                    transform: 'translateX(0)'
                },
                {
                    transform: 'translateX(-5px)'
                },
                {
                    transform: 'translateX(5px)'
                },
                {
                    transform: 'translateX(0)'
                }
            ], {
                duration: 300
            });

            feedbackEl.innerText = "Try again! You can do it.";
            feedbackEl.className = "text-center font-bold h-6 mt-4 text-lg text-red-500";
        }
    }

    // --- Granular Lesson Tracking Logic ---
    let completedLessons = [];

    document.addEventListener("DOMContentLoaded", function() {
        loadLessonProgress();
        const btns = document.querySelectorAll('.lesson-check-btn');
        btns.forEach(btn => {
            const match = btn.getAttribute('onclick').match(/'([^']+)'/);
            if (match) {
                const id = match[1];
                updateLessonBtnUI(btn, completedLessons.includes(id));
            }
        });
        updateTopicProgress('topic-a');
        updateTopicProgress('topic-b');
        updateModuleProgress();
    });

    // Keyboard support for modal
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeLessonModal();
        }
    });

    function loadLessonProgress() {
        try {
            const stored = localStorage.getItem('hl_completed_lessons_granular');
            if (stored) completedLessons = JSON.parse(stored);
        } catch (e) {}
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
            confetti({
                particleCount: 80,
                spread: 70,
                origin: {
                    y: 0.6
                },
                colors: ['#22c55e', '#fbbf24', '#3b82f6']
            });
        }

        localStorage.setItem('hl_completed_lessons_granular', JSON.stringify(completedLessons));
        if (btn) updateLessonBtnUI(btn, isComplete);
        const topicId = lessonId.split('-').slice(0, 2).join('-');
        updateTopicProgress(topicId);
        updateModuleProgress();
    }

    function updateLessonBtnUI(btn, isComplete) {
        const checkIcon = btn.querySelector('.check-icon');
        const li = btn.closest('li');
        // We look for the span with the title
        const titleSpan = li ? li.querySelector('span[onclick]') : null;

        if (isComplete) {
            btn.setAttribute('aria-pressed', 'true');
            if (checkIcon) {
                checkIcon.classList.remove('text-transparent', 'border-gray-300', 'dark:border-gray-500', 'bg-white', 'dark:bg-gray-900');
                checkIcon.classList.add('bg-green-500', 'border-green-500', 'text-white');
            }
            if (titleSpan) {
                titleSpan.classList.add('line-through', 'text-text-secondary', 'opacity-60');
                titleSpan.classList.remove('text-text-default', 'cursor-pointer', 'font-medium');
            }
        } else {
            btn.setAttribute('aria-pressed', 'false');
            if (checkIcon) {
                checkIcon.classList.add('text-transparent', 'border-gray-300', 'dark:border-gray-500', 'bg-white', 'dark:bg-gray-900');
                checkIcon.classList.remove('bg-green-500', 'border-green-500', 'text-white');
            }
            if (titleSpan) {
                titleSpan.classList.remove('line-through', 'text-text-secondary', 'opacity-60');
                titleSpan.classList.add('text-text-default', 'cursor-pointer', 'font-medium');
            }
        }
    }

    function updateTopicProgress(topicPrefix) {
        const allBtns = document.querySelectorAll('.lesson-check-btn');
        const topicBtns = Array.from(allBtns).filter(b => b.getAttribute('onclick').includes(topicPrefix));
        const total = topicBtns.length;
        if (total === 0) return;

        const completed = topicBtns.filter(b => {
            const match = b.getAttribute('onclick').match(/'([^']+)'/);
            return match && completedLessons.includes(match[1]);
        }).length;

        const pct = Math.round((completed / total) * 100);
        const bar = document.getElementById(`progress-${topicPrefix}`);
        if (bar) bar.style.width = `${pct}%`;
    }

    function updateModuleProgress() {
        // Count all lessons on page
        const allBtns = document.querySelectorAll('.lesson-check-btn');
        const total = allBtns.length;
        if (total === 0) return;

        const completed = completedLessons.filter(id => {
            // Verify this ID actually exists on this page to avoid counting lessons from other pages if we ever share the storage key
            return Array.from(allBtns).some(btn => btn.getAttribute('onclick').includes(id));
        }).length;

        const pct = Math.round((completed / total) * 100);
        const bar = document.getElementById('module-progress-bar');
        const text = document.getElementById('module-progress-text');

        if (bar) bar.style.width = `${pct}%`;
        if (text) text.innerText = `${pct}%`;
    }

    // --- Modal Logic ---
    let currentModalLessonId = null;

    function openLesson(lessonId) {
        const data = lessonData[lessonId];
        if (!data) return;

        currentModalLessonId = lessonId;
        const modal = document.getElementById('lessonModal');
        const modalTitle = document.getElementById('lessonModalTitle');
        const modalContent = document.getElementById('lessonModalContent');
        const completeBtn = document.getElementById('modalCompleteBtn');
        const prevBtn = document.getElementById('modalPrevBtn');
        const nextBtn = document.getElementById('modalNextBtn');

        if (modal && modalTitle && modalContent) {
            modalTitle.innerText = data.title;
            modalContent.innerHTML = data.content;

            // Check if already complete
            if (completedLessons.includes(lessonId)) {
                completeBtn.innerText = "Completed";
                completeBtn.classList.remove('bg-primary', 'hover:bg-secondary', 'text-white', 'shadow-lg', 'animate-pulse');
                completeBtn.classList.add('bg-green-100', 'text-green-700', 'cursor-default');
                completeBtn.disabled = true;
            } else {
                completeBtn.innerText = "Mark as Complete";
                completeBtn.classList.add('bg-primary', 'hover:bg-secondary', 'text-white', 'shadow-lg');
                completeBtn.classList.remove('bg-green-100', 'text-green-700', 'cursor-default', 'animate-pulse');
                completeBtn.disabled = false;
            }

            // Setup Navigation Buttons
            const lessonKeys = Object.keys(lessonData);
            const currentIndex = lessonKeys.indexOf(lessonId);

            // Prev Button
            if (currentIndex > 0) {
                prevBtn.disabled = false;
                prevBtn.classList.remove('opacity-30', 'cursor-not-allowed');
                prevBtn.onclick = function() {
                    openLesson(lessonKeys[currentIndex - 1]);
                };
            } else {
                prevBtn.disabled = true;
                prevBtn.classList.add('opacity-30', 'cursor-not-allowed');
                prevBtn.onclick = null;
            }

            // Next Button
            if (currentIndex < lessonKeys.length - 1) {
                nextBtn.disabled = false;
                nextBtn.classList.remove('opacity-30', 'cursor-not-allowed');
                nextBtn.onclick = function() {
                    openLesson(lessonKeys[currentIndex + 1]);
                };
            } else {
                nextBtn.disabled = true;
                nextBtn.classList.add('opacity-30', 'cursor-not-allowed');
                nextBtn.onclick = null;
            }

            modal.classList.remove('hidden');
            // Focus trap: set focus to title for screen readers or tab nav
            modalTitle.tabIndex = -1;
            modalTitle.focus();

            setTimeout(() => {
                modal.classList.remove('opacity-0', 'pointer-events-none');
                modal.querySelector('div[class*="transform"]').classList.remove('scale-95', 'opacity-95');
                modal.querySelector('div[class*="transform"]').classList.add('scale-100', 'opacity-100');
            }, 10);
        }
    }

    function closeLessonModal() {
        const modal = document.getElementById('lessonModal');
        if (modal) {
            modal.classList.add('opacity-0', 'pointer-events-none');
            modal.querySelector('div[class*="transform"]').classList.add('scale-95', 'opacity-95');
            modal.querySelector('div[class*="transform"]').classList.remove('scale-100', 'opacity-100');

            setTimeout(() => {
                modal.classList.add('hidden');
                currentModalLessonId = null;
            }, 300);
        }
    }

    function markModalLessonComplete() {
        if (!currentModalLessonId) return;

        // Find the button on the main page to trigger specific animation logic
        const checkBtn = document.querySelector(`button[onclick="toggleLesson('${currentModalLessonId}', this)"]`);

        if (!completedLessons.includes(currentModalLessonId)) {
            toggleLesson(currentModalLessonId, checkBtn); // This handles confetti and storage

            // Update modal button state
            const completeBtn = document.getElementById('modalCompleteBtn');
            completeBtn.innerText = "Completed!";
            completeBtn.classList.remove('bg-primary', 'hover:bg-secondary', 'text-white', 'shadow-lg', 'animate-pulse');
            completeBtn.classList.add('bg-green-500', 'text-white');

            // Automatically go to next lesson after short delay if available?
            // Optional: User might prefer to stay and review. We'll just close for now or let them click Next.
        }
    }

    const style = document.createElement('style');
    style.innerHTML = `
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .animate-bounce-slow { animation: bounce 3s infinite; }
        @keyframes bounce {
            0%, 100% { transform: translateY(-5%); }
            50% { transform: translateY(5%); }
        }
    `;
    document.head.appendChild(style);
</script>

<!-- Full Screen/Large Lesson Modal -->
<div id="lessonModal" class="fixed inset-0 z-50 hidden opacity-0 pointer-events-none transition-opacity duration-300" aria-modal="true" role="dialog">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-base-bg/80 backdrop-blur-md" onclick="closeLessonModal()"></div>

    <!-- Modal Panel -->
    <div class="relative z-10 flex min-h-screen items-center justify-center p-4 md:p-6 text-left">
        <div class="w-full max-w-5xl h-[85vh] flex flex-col transform overflow-hidden rounded-3xl bg-content-bg border border-gray-200 dark:border-gray-700 shadow-2xl transition-all duration-300 scale-95 opacity-95">

            <!-- Header -->
            <div class="flex flex-shrink-0 items-center justify-between border-b border-gray-200 dark:border-gray-700 px-8 py-5 bg-base-bg/50 backdrop-blur-sm z-20">
                <h3 id="lessonModalTitle" class="text-2xl md:text-3xl font-bold text-text-default truncate pr-4">Lesson Title</h3>
                <button onclick="closeLessonModal()" class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center text-text-secondary hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors focus:outline-none focus:ring-2 focus:ring-primary" aria-label="Close modal">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Scrollable Content -->
            <div class="flex-grow overflow-y-auto overflow-x-hidden p-8 md:p-10 custom-scrollbar">
                <div class="max-w-4xl mx-auto">
                    <div id="lessonModalContent" class="space-y-8">
                        <!-- Dynamic Content loads here -->
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex-shrink-0 bg-base-bg/80 backdrop-blur-sm px-8 py-5 flex flex-col sm:flex-row justify-between items-center gap-4 border-t border-gray-200 dark:border-gray-700 z-20">

                <!-- Navigation -->
                <div class="flex gap-3 w-full sm:w-auto order-2 sm:order-1">
                    <button id="modalPrevBtn" class="flex-1 sm:flex-none px-4 py-2 rounded-xl font-bold text-text-secondary border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors disabled:opacity-30 disabled:cursor-not-allowed">
                        <i class="fas fa-chevron-left mr-1"></i> Prev
                    </button>
                    <button id="modalNextBtn" class="flex-1 sm:flex-none px-4 py-2 rounded-xl font-bold text-text-secondary border border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors disabled:opacity-30 disabled:cursor-not-allowed">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </button>
                </div>

                <!-- Actions -->
                <div class="flex gap-4 w-full sm:w-auto justify-end order-1 sm:order-2">
                    <button onclick="closeLessonModal()" class="px-6 py-3 rounded-xl font-bold text-text-secondary hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors hidden sm:block">
                        Close
                    </button>
                    <button id="modalCompleteBtn" onclick="markModalLessonComplete()" class="w-full sm:w-auto px-8 py-3 rounded-xl font-bold bg-primary text-white hover:bg-secondary shadow-lg shadow-primary/20 transition-all transform hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed">
                        Mark as Complete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../src/footer.php'; ?>