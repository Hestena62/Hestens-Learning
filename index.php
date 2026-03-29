<?php
$pageTitle = "Hesten's Learning"; // SEO Title
include 'src/header.php';

// --- DATA: Server-Side Loading ---
$jsonString = file_get_contents(__DIR__ . '/data/learning_levels.json');
$learningLevels = json_decode($jsonString, true);
if (!is_array($learningLevels)) {
    $learningLevels = [];
}

// --- STYLING HELPERS ---
$themeMap = [
    'elem' => [
        'border' => 'border-teal-400 dark:border-teal-500',
        'icon_bg' => 'bg-teal-100 dark:bg-teal-900',
        'icon_text' => 'text-teal-600 dark:text-teal-300',
        'hover' => 'group-hover:border-teal-500',
        'btn' => 'hover:bg-teal-500 hover:text-white',
        'accent' => 'text-teal-600 dark:text-teal-400',
        'shadow' => 'shadow-teal-100 dark:shadow-teal-900/20'
    ],
    'middle' => [
        'border' => 'border-amber-400 dark:border-amber-500',
        'icon_bg' => 'bg-amber-100 dark:bg-amber-900',
        'icon_text' => 'text-amber-600 dark:text-amber-300',
        'hover' => 'group-hover:border-amber-500',
        'btn' => 'hover:bg-amber-500 hover:text-white',
        'accent' => 'text-amber-600 dark:text-amber-400',
        'shadow' => 'shadow-amber-100 dark:shadow-amber-900/20'
    ],
    'high' => [
        'border' => 'border-rose-400 dark:border-rose-500',
        'icon_bg' => 'bg-rose-100 dark:bg-rose-900',
        'icon_text' => 'text-rose-600 dark:text-rose-300',
        'hover' => 'group-hover:border-rose-500',
        'btn' => 'hover:bg-rose-500 hover:text-white',
        'accent' => 'text-rose-600 dark:text-rose-400',
        'shadow' => 'shadow-rose-100 dark:shadow-rose-900/20'
    ],
    'extra' => [
        'border' => 'border-violet-400 dark:border-violet-500',
        'icon_bg' => 'bg-violet-100 dark:bg-violet-900',
        'icon_text' => 'text-violet-600 dark:text-violet-300',
        'hover' => 'group-hover:border-violet-500',
        'btn' => 'hover:bg-violet-500 hover:text-white',
        'accent' => 'text-violet-600 dark:text-violet-400',
        'shadow' => 'shadow-violet-100 dark:shadow-violet-900/20'
    ]
];
?>

<!-- AURORA HERO SECTION -->
<div class="relative min-h-screen pt-24 lg:pt-32 pb-24 flex items-center justify-center overflow-hidden bg-white dark:bg-gray-950 transition-colors duration-500">
    <!-- Aurora Mesh Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-[20%] -left-[10%] w-[70vw] h-[70vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[100px] opacity-60 animate-blob bg-indigo-200 dark:bg-indigo-900/50"></div>
        <div class="absolute top-[20%] -right-[10%] w-[60vw] h-[60vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[100px] opacity-60 animate-blob style='animation-delay: -2s;' bg-purple-200 dark:bg-purple-900/50"></div>
        <div class="absolute -bottom-[20%] left-[20%] w-[50vw] h-[50vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[100px] opacity-60 animate-blob style='animation-delay: -4s;' bg-emerald-200 dark:bg-teal-900/50"></div>
        <!-- Noise Overlay -->
        <div class="absolute inset-0 mix-blend-overlay opacity-[0.03] bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIj48ZmlsdGVyIGlkPSJuIj48ZmVUdXJidWxlbmNlIHR5cGU9ImZyYWN0YWxOb2lzZSIgYmFzZUZyZXF1ZW5jeT0iMC42NSIgbnVtT2N0YXZlcz0iMyIgc3RpdGNoVGlsZXM9InN0aXRjaCIvPjwvZmlsdGVyPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbHRlcj0idXJsKCNuKSIgb3BhY2l0eT0iMC4wOCIvPjwvc3ZnPg==')]"></div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 text-center flex flex-col items-center">
        <!-- Pill Badge -->
        <div class="inline-flex items-center gap-3 rounded-full bg-white/60 dark:bg-black/20 backdrop-blur-xl px-5 py-2 text-xs font-bold text-gray-800 dark:text-gray-200 mb-10 border border-black/5 dark:border-white/10 shadow-[0_8px_32px_rgba(0,0,0,0.04)] animate-reveal">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-500 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
            </span>
            <span class="tracking-[0.2em] uppercase" id="hero-dynamic-greeting">THE LEARNING ODYSSEY</span>
        </div>

        <!-- Main Heading -->
        <h1 class="text-6xl md:text-8xl lg:text-[7.5rem] font-black tracking-tighter text-gray-900 dark:text-white mb-8 font-outfit animate-reveal leading-[0.95]">
            Ignite Your <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-br from-indigo-500 via-purple-500 to-emerald-400">Curiosity</span>
        </h1>

        <p class="mt-6 text-xl md:text-2xl leading-relaxed text-gray-600 dark:text-gray-300/80 max-w-2xl mx-auto mb-14 font-medium animate-reveal backdrop-blur-sm" style="animation-delay: 0.1s;">
            A beautifully crafted educational experience. Personalized, accessible, and structured for focused mastery.
        </p>

        <!-- Quick Stats (Glass Cards) -->
        <div class="mt-24 grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl w-full mx-auto animate-reveal" style="animation-delay: 0.3s;">
            <div class="bg-white/40 dark:bg-black/20 backdrop-blur-2xl p-6 rounded-[1.5rem] border border-white/60 dark:border-white/5 flex flex-col items-center hover:bg-white/60 dark:hover:bg-white/5 transition-colors shadow-[0_8px_32px_rgba(0,0,0,0.02)]">
                <span class="text-3xl font-black text-indigo-600 dark:text-indigo-400 font-outfit mb-1 tracking-tight" id="user-progress-stat">0%</span>
                <span class="text-[10px] font-bold text-gray-500 dark:text-gray-400 uppercase tracking-[0.15em]">Mastery</span>
            </div>
            <div class="bg-white/40 dark:bg-black/20 backdrop-blur-2xl p-6 rounded-[1.5rem] border border-white/60 dark:border-white/5 flex flex-col items-center hover:bg-white/60 dark:hover:bg-white/5 transition-colors shadow-[0_8px_32px_rgba(0,0,0,0.02)]">
                <div class="flex items-center gap-1.5">
                    <i class="fas fa-fire text-amber-500 mb-0.5"></i>
                    <span class="text-3xl font-black text-amber-600 dark:text-amber-400 font-outfit mb-1 tracking-tight" id="streak-stat">0</span>
                </div>
                <span class="text-[10px] font-bold text-gray-500 dark:text-gray-400 uppercase tracking-[0.15em]">Active Streak</span>
            </div>
            <div class="bg-white/40 dark:bg-black/20 backdrop-blur-2xl p-6 rounded-[1.5rem] border border-white/60 dark:border-white/5 flex-col items-center hover:bg-white/60 dark:hover:bg-white/5 transition-colors shadow-[0_8px_32px_rgba(0,0,0,0.02)] hidden sm:flex">
                <i class="fas fa-shield-check text-[1.35rem] text-emerald-500 dark:text-emerald-400 mb-2.5 mt-1"></i>
                <span class="text-[10px] font-bold text-gray-500 dark:text-gray-400 uppercase tracking-[0.15em]">Safe Space</span>
            </div>
            <div class="bg-white/40 dark:bg-black/20 backdrop-blur-2xl p-6 rounded-[1.5rem] border border-white/60 dark:border-white/5 flex-col items-center hover:bg-white/60 dark:hover:bg-white/5 transition-colors shadow-[0_8px_32px_rgba(0,0,0,0.02)] hidden sm:flex">
                <i class="fas fa-universal-access text-[1.4rem] text-purple-500 dark:text-purple-400 mb-2.5 mt-1"></i>
                <span class="text-[10px] font-bold text-gray-500 dark:text-gray-400 uppercase tracking-[0.15em]">Accessible</span>
            </div>
        </div>
    </div>
</div>

<!-- CHOOSE YOUR PATH SECTION -->
<section id="paths" class="pt-20 pb-10 px-6 bg-gray-50 dark:bg-[#09090b] scroll-mt-20">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-8 animate-reveal gap-8">
            <div class="max-w-xl">
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white mb-4 font-outfit tracking-tight">Academic Journey</h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Select an educational stage to filter the available curriculum.</p>
            </div>
            
            <!-- Segmented Control -->
            <div class="hidden md:inline-flex bg-gray-200/50 dark:bg-white/5 p-1.5 rounded-2xl backdrop-blur-md border border-gray-200 dark:border-white/10 shadow-inner w-full lg:w-auto" role="tablist" aria-label="Filter learning paths">
                <button type="button" role="tab" aria-selected="true" class="path-tab active relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-900 dark:text-white bg-white dark:bg-gray-800 shadow-sm transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2" onclick="setCategory(this, 'all', true)">
                    <i class="fas fa-layer-group text-indigo-500"></i> All
                </button>
                <button type="button" role="tab" aria-selected="false" class="path-tab relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2" onclick="setCategory(this, 'elem', true)">
                    <i class="fas fa-child text-teal-500"></i> Elementary
                </button>
                <button type="button" role="tab" aria-selected="false" class="path-tab relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2" onclick="setCategory(this, 'middle', true)">
                    <i class="fas fa-user-graduate text-amber-500"></i> Middle
                </button>
                <button type="button" role="tab" aria-selected="false" class="path-tab relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2" onclick="setCategory(this, 'high', true)">
                    <i class="fas fa-brain text-rose-500"></i> High
                </button>
                <button type="button" role="tab" aria-selected="false" class="path-tab relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2" onclick="setCategory(this, 'extra', true)">
                    <i class="fas fa-plus-circle text-purple-500"></i> Extra
                </button>
            </div>
            
            <!-- Mobile Select -->
            <div class="md:hidden w-full relative">
                <select aria-label="Select Category" class="appearance-none w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl py-3.5 px-4 pr-10 text-gray-900 dark:text-white font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm" onchange="const tabs = document.querySelectorAll('.path-tab'); setCategory(tabs[0], this.value, true); Array.from(tabs).forEach((t, i) => t.setAttribute('aria-selected', i===this.selectedIndex));">
                    <option value="all">All Paths</option>
                    <option value="elem">Elementary</option>
                    <option value="middle">Middle School</option>
                    <option value="high">High School</option>
                    <option value="extra">Extra Resources</option>
                </select>
                <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-sm"></i>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<main class="container mx-auto my-20 px-6 scroll-mt-24 min-h-screen" id="main-content" tabindex="-1">

    <!-- Global Resume / Status (Redesigned) -->
    <div id="resume-banner" class="hidden mb-20 relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-primary via-secondary to-accent rounded-[3rem] blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
        <div class="relative bg-content-bg rounded-[3rem] p-8 flex flex-col md:flex-row items-center justify-between gap-8 border border-white/10 shadow-2xl overflow-hidden cursor-pointer" id="resume-click-area">
             <!-- Wave Pattern Background -->
             <svg class="absolute bottom-0 right-0 opacity-5 pointer-events-none" width="400" height="200" viewBox="0 0 400 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 100C50 80 150 120 200 100C250 80 350 120 400 100V200H0V100Z" fill="currentColor"/>
            </svg>
            
            <div class="flex items-center gap-8 text-text-default">
                <div class="w-20 h-20 bg-indigo-50 dark:bg-indigo-500/10 rounded-2xl flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-3xl shrink-0 group-hover:scale-110 transition-transform">
                    <i class="fas fa-play-circle"></i>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-black mb-1 font-outfit text-gray-900 dark:text-white">Continue Your Journey</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400 font-medium">Resume where you left off: <span id="next-level-name" class="text-indigo-600 dark:text-indigo-400 font-bold"></span></p>
                </div>
            </div>
            <button class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 px-10 py-4 rounded-xl font-black text-lg hover:-translate-y-1 transition-transform flex items-center gap-3 active:scale-95 shadow-lg shadow-gray-900/10 dark:shadow-white/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500" type="button">
                <span>Resume Now</span> <i class="fas fa-arrow-right opacity-70"></i>
            </button>
        </div>
    </div>

    <!-- Redesigned Search bar -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-12 px-4">
        <div>
            <h2 class="text-5xl font-black text-gray-900 dark:text-white font-outfit mb-2 tracking-tight" id="section-title">Academic Path</h2>
            <div class="flex items-center gap-3">
                <span class="w-12 h-1.5 bg-indigo-500 rounded-full opacity-80"></span>
                <span class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest" id="results-count">Analyzing levels...</span>
            </div>
        </div>

        <div class="relative w-full md:w-80 group">
            <input type="text" id="level-search" aria-label="Search levels" placeholder="Search grades, topics..."
                class="w-full pl-12 pr-12 py-4 rounded-2xl border border-gray-200 dark:border-white/10 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all font-semibold placeholder-gray-400 text-base shadow-sm hover:shadow-md">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-indigo-500 transition-colors pointer-events-none"></i>
            <button id="clear-search" onclick="resetFilters()"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-rose-500 hidden focus:outline-none focus-visible:ring-2 focus-visible:ring-rose-500 rounded-full p-1"
                aria-label="Clear Search" type="button">
                <i class="fas fa-times-circle text-xl"></i>
            </button>
        </div>
    </div>


    <!-- Grid Container (Server Rendered) -->
    <section id="level-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pb-20"
        aria-label="Grade Levels">
        <?php foreach ($learningLevels as $level):
            $theme = $themeMap[$level['category']] ?? $themeMap['elem'];
            ?>
            <!-- LEVEL CARD -->
            <article class="level-card group relative flex flex-col h-full animate-reveal"
                data-category="<?php echo htmlspecialchars($level['category'], ENT_QUOTES); ?>"
                data-display-title="<?php echo htmlspecialchars($level['title'], ENT_QUOTES); ?>"
                data-title="<?php echo strtolower(htmlspecialchars($level['title'], ENT_QUOTES)); ?>"
                data-desc="<?php echo htmlspecialchars($level['description'], ENT_QUOTES); ?>"
                data-keywords="<?php echo isset($level['keywords']) ? strtolower(htmlspecialchars($level['keywords'], ENT_QUOTES)) : ''; ?>"
                data-icon="<?php echo htmlspecialchars($level['icon'], ENT_QUOTES); ?>"
                data-doc="<?php echo htmlspecialchars($level['documentation'] ?? '', ENT_QUOTES); ?>"
                data-id="<?php echo htmlspecialchars($level['id'], ENT_QUOTES); ?>">

                <div class="h-full rounded-3xl bg-white dark:bg-[#0a0a0a] border border-gray-200 dark:border-white/10 p-8 flex flex-col relative overflow-hidden transition-all duration-300 hover:shadow-xl hover:shadow-gray-900/5 dark:hover:border-white/20 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 dark:focus-within:ring-offset-gray-950">
                    
                    <!-- Subtle Glow on Hover -->
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-500/5 rounded-full blur-3xl group-hover:bg-indigo-500/10 transition-colors duration-500 pointer-events-none"></div>

                    <!-- Header -->
                    <div class="flex items-start justify-between mb-8 relative z-10 w-full">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-2xl shadow-sm transition-transform group-hover:scale-105 <?php echo $theme['icon_bg'] . ' ' . $theme['icon_text']; ?>">
                                <i class="<?php echo $level['icon']; ?>"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-gray-900 dark:text-white font-outfit tracking-tight leading-tight">
                                    <?php echo htmlspecialchars($level['title']); ?>
                                </h3>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400">
                                    <?php echo $level['category'] === 'elem' ? 'Elementary' : ($level['category'] === 'middle' ? 'Middle School' : ($level['category'] === 'high' ? 'High School' : 'Extra')); ?>
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 shrink-0">
                            <button type="button"
                                class="bookmark-btn w-10 h-10 rounded-full bg-gray-50 dark:bg-white/5 text-gray-400 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-500/10 transition-all flex items-center justify-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 shadow-sm border border-gray-200 dark:border-white/5"
                                onclick="toggleBookmark('<?php echo $level['id']; ?>', this)" aria-label="Bookmark <?php echo htmlspecialchars($level['title'], ENT_QUOTES); ?>">
                                <i class="far fa-star"></i>
                            </button>
                            <button type="button"
                                class="complete-btn w-10 h-10 rounded-full bg-gray-50 dark:bg-white/5 text-gray-400 hover:text-emerald-500 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 transition-all flex items-center justify-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 shadow-sm border border-gray-200 dark:border-white/5"
                                onclick="toggleCompletion('<?php echo $level['id']; ?>', this)" aria-label="Mark <?php echo htmlspecialchars($level['title'], ENT_QUOTES); ?> as Complete">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 dark:text-gray-400 text-[0.95rem] leading-relaxed font-medium mb-8 relative z-10 line-clamp-3">
                        <?php echo htmlspecialchars($level['description']); ?>
                    </p>

                    <!-- Footer Actions -->
                    <div class="mt-auto flex items-center justify-between gap-4 relative z-10 w-full pt-4 border-t border-gray-100 dark:border-white/5">
                        <button type="button" aria-haspopup="dialog"
                            class="flex items-center gap-2 text-sm font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 rounded p-1"
                            onclick="openDocModal(this)">
                            <i class="fas fa-book-open"></i> Curriculum
                        </button>
                        
                        <div class="flex items-center gap-2">
                             <button type="button"
                                class="w-10 h-10 rounded-full text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all flex items-center justify-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                                onclick="speakCard(this, '<?php echo addslashes($level['title']); ?>', '<?php echo addslashes($level['description']); ?>')"
                                aria-label="Listen to description">
                                <i class="fas fa-volume-up"></i>
                            </button>
                            <a href="<?php echo $level['link']; ?>" aria-label="Explore <?php echo htmlspecialchars($level['title'], ENT_QUOTES); ?>"
                                class="inline-flex items-center gap-2 bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold py-3 px-6 rounded-xl transition-all hover:-translate-y-0.5 shadow-md shadow-gray-900/10 dark:shadow-white/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 text-sm">
                                <span>Open</span>
                                <i class="fas fa-arrow-right text-[10px] opacity-70"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Dynamic Progress Glow -->
                    <div class="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-emerald-400 to-teal-400 w-0 transition-all duration-700 completion-bar"></div>
                </div>
            </article>
        <?php endforeach; ?>
    </section>

    <!-- Empty State -->
    <div id="no-results"
        class="hidden text-center py-24 px-4 bg-white/50 dark:bg-gray-900/50 backdrop-blur-md rounded-3xl border border-dashed border-gray-300 dark:border-gray-700">
        <div
            class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-gray-800 mb-6 text-gray-400 shadow-inner">
            <i class="fas fa-search text-3xl"></i>
        </div>
        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-2 font-outfit tracking-tight">No levels found</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">We couldn't find anything matching your search criteria. Try adjusting your filters.</p>
        <button onclick="resetFilters()"
            class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold py-3 px-8 rounded-xl shadow-lg hover:-translate-y-1 transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
            Clear Search
        </button>
    </div>

    <!-- Documentation Modal (Knowledge Portal) -->
    <div id="doc-modal"
        class="fixed inset-0 z-[100] hidden opacity-0 transition-all duration-500 flex items-center justify-center pointer-events-none p-4 sm:p-6 sm:pb-12"
        aria-modal="true" role="dialog" aria-labelledby="modal-title">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/40 dark:bg-black/60 backdrop-blur-sm transition-opacity cursor-pointer" onclick="closeDocModal()"></div>

        <!-- Modal Content -->
        <div class="bg-white dark:bg-[#0a0a0a] rounded-3xl relative w-full max-w-4xl transform scale-95 opacity-0 transition-all duration-500 doc-modal-content pointer-events-auto flex flex-col max-h-[85vh] overflow-hidden border border-gray-200 dark:border-white/10 shadow-2xl" id="modal-container">

            <!-- Header -->
            <div class="px-6 py-6 md:px-8 md:py-8 flex justify-between items-start shrink-0 relative z-20 border-b border-gray-100 dark:border-white/5">
                <div class="flex items-center gap-5">
                    <div id="modal-icon-container" class="w-16 h-16 md:w-20 md:h-20 rounded-2xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-3xl md:text-4xl transition-colors duration-700">
                        <i id="modal-icon" class="fas fa-info-circle text-indigo-500"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl md:text-4xl font-black font-outfit text-gray-900 dark:text-white tracking-tight mb-1 leading-none" id="modal-title">
                            Curriculum Details
                        </h3>
                        <div class="flex items-center gap-2 mt-2">
                             <span class="w-8 h-1 bg-indigo-500 rounded-full opacity-50"></span>
                             <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest" id="modal-subtitle">Learning Path</span>
                        </div>
                    </div>
                </div>
                <button onclick="closeDocModal()"
                    class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-gray-100 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-white/10 flex items-center justify-center transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                    aria-label="Close Portal">
                    <i class="fas fa-times text-lg md:text-xl"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="px-6 md:px-8 py-6 md:py-8 overflow-y-auto custom-modal-scrollbar flex-grow relative z-10 bg-gray-50 dark:bg-transparent">
                <div class="max-w-none">
                    <div id="modal-desc-container" class="mb-8 p-6 rounded-2xl bg-white dark:bg-white/5 border border-gray-200 dark:border-white/10 shadow-sm dark:shadow-none">
                         <p id="modal-desc" class="text-base md:text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-medium"></p>
                    </div>
                    
                    <div id="modal-docs" class="text-gray-900 dark:text-white">
                        <!-- Redesigned Pills & Content injected here -->
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-6 md:px-8 py-5 md:py-6 bg-white dark:bg-[#0a0a0a] border-t border-gray-200 dark:border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 shrink-0 relative z-20">
                <p class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest hidden sm:block">Hesten's Learning &copy; 2026</p>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button onclick="window.print()" class="flex-1 sm:flex-none px-6 py-3 rounded-xl bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 text-gray-700 dark:text-gray-300 font-bold hover:bg-gray-100 dark:hover:bg-white/10 transition-all flex items-center justify-center gap-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                        <i class="fas fa-print"></i> <span class="hidden sm:inline">Print Path</span><span class="sm:hidden">Print</span>
                    </button>
                    <button onclick="closeDocModal()"
                        class="flex-1 sm:flex-none px-8 py-3 rounded-xl bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold hover:-translate-y-0.5 transition-transform active:scale-95 text-sm shadow-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

</main>

<!-- PAGE SCRIPT -->
<script>
    // --- STATE ---
    let completedLevels = [];
    let bookmarkedLevels = [];
    let currentCategory = 'all';

    // --- INIT ---
    document.addEventListener("DOMContentLoaded", () => {
        loadState();
        hydrateGrid(); // Apply saved state to the static HTML
        checkStreak();
        updateHeroGreeting();

        // Search & Filter Listeners
        const searchInput = document.getElementById('level-search');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const heroSearch = document.getElementById('hero-search');
                if (heroSearch) heroSearch.value = e.target.value;
                debounce(applyFilters, 200)();
            });
        }

        // Intersection Observer for Scroll Reveals
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-reveal');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal-section').forEach(el => {
            el.style.opacity = '0';
            revealObserver.observe(el);
        });

        // Stagger Animation for Grid items
        const cards = document.querySelectorAll('.level-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 50}ms`;
        });
    });

    function loadState() {
        try {
            completedLevels = JSON.parse(localStorage.getItem('hl_completed_levels') || '[]');
            bookmarkedLevels = JSON.parse(localStorage.getItem('hl_bookmarked_levels') || '[]');
        } catch (e) { console.error(e); }
    }

    function hydrateGrid() {
        // Complete Buttons & Styles
        completedLevels.forEach(id => {
            const card = document.querySelector(`.level-card[data-id="${id}"]`);
            if (card) markCardComplete(card, true);
        });

        // Bookmarks
        bookmarkedLevels.forEach(id => {
            const btn = document.querySelector(`.level-card[data-id="${id}"] .bookmark-btn`);
            if (btn) markBtnBookmarked(btn, true);
        });

        // Stats
        updateStats();

        // Resume Banner
        checkResumeLearning();
    }

    // --- ACTIONS ---

    function openDocModal(btn) {
        const card = btn.closest('.level-card');
        const title = card.dataset.displayTitle;
        const desc = card.dataset.desc;
        const iconClass = card.dataset.icon;
        const docs = card.dataset.doc;
        const category = card.dataset.category;

        const modal = document.getElementById('doc-modal');
        const modalContainer = document.getElementById('modal-container');
        const modalContent = modal.querySelector('.doc-modal-content');

        // Theme mapping for Modal
        const themes = {
            'elem': { color: '#14b8a6', bg: 'rgba(20, 184, 166, 0.1)', text: 'Elementary Path' },
            'middle': { color: '#f59e0b', bg: 'rgba(245, 158, 11, 0.1)', text: 'Middle School Path' },
            'high': { color: '#e11d48', bg: 'rgba(225, 29, 72, 0.1)', text: 'High School Path' },
            'extra': { color: '#7c3aed', bg: 'rgba(124, 58, 237, 0.1)', text: 'Extra Resources' }
        };
        const activeTheme = themes[category] || themes['elem'];

        // Apply Theme to Modal
        modalContainer.style.borderTopColor = activeTheme.color;
        document.documentElement.style.setProperty('--color-primary', activeTheme.color);
        document.documentElement.style.setProperty('--color-primary-rgb', category === 'elem' ? '20, 184, 166' : (category === 'middle' ? '245, 158, 11' : (category === 'high' ? '225, 29, 72' : '124, 58, 237')));

        const iconContainer = document.getElementById('modal-icon-container');
        iconContainer.style.backgroundColor = activeTheme.bg;
        
        document.getElementById('modal-title').textContent = title;
        document.getElementById('modal-subtitle').textContent = activeTheme.text;
        document.getElementById('modal-icon').className = iconClass;
        document.getElementById('modal-icon').style.color = activeTheme.color;
        document.getElementById('modal-desc').textContent = desc;

        const docsContainer = document.getElementById('modal-docs');
        if (docs && docs.trim() !== '') {
            const parser = new DOMParser();
            const docEl = parser.parseFromString(docs, 'text/html');
            const h4 = docEl.querySelector('h4');
            const subjectsDiv = docEl.querySelector('div.space-y-4');

            if (h4 && subjectsDiv) {
                const titleText = h4.textContent;
                const items = Array.from(subjectsDiv.children);

                let tabHeaders = '<div class="flex flex-wrap gap-2 mb-8 p-1.5 bg-gray-100 dark:bg-white/5 rounded-2xl border border-gray-200 dark:border-white/10 w-fit">';
                let tabContents = '<div class="grid grid-cols-1 gap-6">';

                items.forEach((item, index) => {
                    const h5 = item.querySelector('h5');
                    const subjectName = h5 ? h5.textContent : `Module ${index + 1}`;
                    let bodyHtml = item.innerHTML;
                    if (h5) {
                        bodyHtml = bodyHtml.replace(h5.outerHTML, '');
                    }

                    const isActive = index === 0;
                    const activeClasses = isActive ? 'active bg-white dark:bg-gray-800 shadow-sm text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-white/5';

                    tabHeaders += `<button type="button" class="modal-tab-pill px-6 py-2.5 rounded-xl transition-all text-sm font-black tracking-tight ${activeClasses}" data-index="${index}" onclick="switchModalTab(this, ${index})">
                        ${subjectName}
                    </button>`;

                    const contentClass = isActive ? 'block animate-fade-in-up' : 'hidden';
                    tabContents += `<div class="modal-tab-pane ${contentClass}" data-index="${index}">
                        <div class="bg-white dark:bg-[#0a0a0a] p-6 md:p-8 rounded-[2rem] border border-gray-200 dark:border-white/10 relative overflow-hidden shadow-sm">
                            <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-500/5 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="relative z-10 prose prose-indigo dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                                ${bodyHtml}
                            </div>
                        </div>
                    </div>`;
                });

                tabHeaders += '</div>';
                tabContents += '</div>';

                docsContainer.innerHTML = `<h4 class="text-xl font-black mb-6 font-outfit text-gray-900 dark:text-white flex items-center gap-3">
                    <span class="w-2 h-8 bg-indigo-500 rounded-full"></span> ${titleText}
                </h4>${tabHeaders}${tabContents}`;
            } else {
                docsContainer.innerHTML = `<div class="bg-white dark:bg-[#0a0a0a] p-8 rounded-[2rem] border border-gray-200 dark:border-white/10 shadow-sm">${docs}</div>`;
            }
        } else {
            docsContainer.innerHTML = '<div class="text-center py-12 bg-white dark:bg-[#0a0a0a] rounded-[3rem] border border-gray-200 dark:border-white/10 shadow-sm"><i class="fas fa-sparkles text-5xl text-indigo-500/20 mb-4 block"></i><p class="text-gray-500 dark:text-gray-400 font-bold text-lg">Detailed curriculum is being prepared for this journey.</p></div>';
        }

        // Show modal
        modal.classList.remove('hidden');
        void modal.offsetWidth;
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100');
        modalContent.classList.remove('scale-90', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
        document.body.style.overflow = 'hidden';
    }

    function closeDocModal() {
        const modal = document.getElementById('doc-modal');
        const modalContent = modal.querySelector('.doc-modal-content');

        // Animate out
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');

        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-90', 'opacity-0');

        // Wait for transition before hiding
        setTimeout(() => {
            modal.classList.add('hidden', 'pointer-events-none');
            // Re-enable body scrolling
            document.body.style.overflow = '';
        }, 300);
    }

    function switchModalTab(btn, index) {
        const container = btn.closest('#modal-docs');
        const btns = container.querySelectorAll('.modal-tab-pill');
        const panes = container.querySelectorAll('.modal-tab-pane');

        btns.forEach(b => {
            b.classList.remove('active', 'bg-white', 'dark:bg-gray-800', 'shadow-sm', 'text-gray-900', 'dark:text-white');
            b.classList.add('text-gray-500', 'dark:text-gray-400', 'hover:text-gray-900', 'dark:hover:text-white', 'hover:bg-gray-200', 'dark:hover:bg-white/5');
        });
        
        btn.classList.add('active', 'bg-white', 'dark:bg-gray-800', 'shadow-sm', 'text-gray-900', 'dark:text-white');
        btn.classList.remove('text-gray-500', 'dark:text-gray-400', 'hover:text-gray-900', 'dark:hover:text-white', 'hover:bg-gray-200', 'dark:hover:bg-white/5');

        panes.forEach(p => {
            if (parseInt(p.dataset.index) === index) {
                p.classList.remove('hidden');
                p.classList.add('block', 'animate-fade-in-up');
            } else {
                p.classList.remove('block', 'animate-fade-in-up');
                p.classList.add('hidden');
            }
        });
    }

    function toggleCompletion(id, btn) {
        const card = btn.closest('.level-card');
        const index = completedLevels.indexOf(id);
        const isComplete = index === -1;

        if (isComplete) {
            completedLevels.push(id);
            triggerConfettiBtn(btn);
            markCardComplete(card, true);
        } else {
            completedLevels.splice(index, 1);
            markCardComplete(card, false);
        }

        saveState();
        updateStats();
        checkResumeLearning();
    }

    function markCardComplete(card, isComplete) {
        const bar = card.querySelector('.completion-bar');
        const btn = card.querySelector('.complete-btn');
        const contentDiv = card.querySelector('.shadow-premium');

        if (isComplete) {
            if (bar) bar.style.width = '100%';
            if (btn) {
                btn.classList.add('bg-emerald-500', 'text-white', 'border-transparent');
                btn.classList.remove('bg-gray-50', 'dark:bg-white/5', 'text-gray-400', 'border-gray-200', 'dark:border-white/5');
                btn.innerHTML = '<i class="fas fa-check text-sm"></i>';
            }
            if (contentDiv) contentDiv.classList.add('ring-2', 'ring-emerald-500/50', 'dark:ring-emerald-500/30');
        } else {
            if (bar) bar.style.width = '0%';
            if (btn) {
                btn.classList.remove('bg-emerald-500', 'text-white', 'border-transparent');
                btn.classList.add('bg-gray-50', 'dark:bg-white/5', 'text-gray-400', 'border-gray-200', 'dark:border-white/5');
                btn.innerHTML = '<i class="fas fa-check text-sm"></i>';
            }
            if (contentDiv) contentDiv.classList.remove('ring-2', 'ring-emerald-500/50', 'dark:ring-emerald-500/30');
        }
    }

    function toggleBookmark(id, btn) {
        const index = bookmarkedLevels.indexOf(id);
        const isBookmarked = index === -1;

        if (isBookmarked) {
            bookmarkedLevels.push(id);
            markBtnBookmarked(btn, true);
        } else {
            bookmarkedLevels.splice(index, 1);
            markBtnBookmarked(btn, false);
        }
        saveState();
    }

    function markBtnBookmarked(btn, active) {
        if (active) {
            btn.classList.add('text-amber-500', 'bg-amber-100', 'dark:bg-amber-500/20', 'border-transparent');
            btn.classList.remove('text-gray-400', 'bg-gray-50', 'dark:bg-white/5', 'border-gray-200', 'dark:border-white/5');
            btn.innerHTML = '<i class="fas fa-star text-sm"></i>'; // Solid star
        } else {
            btn.classList.remove('text-amber-500', 'bg-amber-100', 'dark:bg-amber-500/20', 'border-transparent');
            btn.classList.add('text-gray-400', 'bg-gray-50', 'dark:bg-white/5', 'border-gray-200', 'dark:border-white/5');
            btn.innerHTML = '<i class="far fa-star text-sm"></i>'; // Outline star
        }
    }

    function saveState() {
        localStorage.setItem('hl_completed_levels', JSON.stringify(completedLevels));
        localStorage.setItem('hl_bookmarked_levels', JSON.stringify(bookmarkedLevels));
    }

    function updateStats() {
        const total = <?php echo count($learningLevels); ?>;
        const count = completedLevels.length;
        const pct = total ? Math.round((count / total) * 100) : 0;
        document.getElementById('user-progress-stat').textContent = pct + '%';
    }

    // --- FILTERING ---

    function setCategory(btn, cat, scrollToGrid = false) {
        currentCategory = cat;

        // Update Path Cards
        document.querySelectorAll('.path-card').forEach(b => {
            b.classList.remove('journey-path-active', 'ring-4', 'ring-primary/20');
        });
        
        if (cat !== 'all' && btn.classList.contains('path-card')) {
            btn.classList.add('journey-path-active', 'ring-4', 'ring-primary/20');
        }

        applyFilters();

        if (scrollToGrid) {
            const grid = document.getElementById('main-content');
            grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function applyFilters() {
        const term = document.getElementById('level-search').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.level-card');
        const clearBtn = document.getElementById('clear-search');
        let visibleCount = 0;

        if (term) clearBtn.classList.remove('hidden');
        else clearBtn.classList.add('hidden');

        cards.forEach(card => {
            const cat = card.dataset.category;
            const matchesCat = currentCategory === 'all' || cat === currentCategory;
            const matchesSearch = !term ||
                card.dataset.title.includes(term) ||
                card.dataset.desc.includes(term) ||
                (card.dataset.keywords && card.dataset.keywords.includes(term));

            if (matchesCat && matchesSearch) {
                card.classList.remove('hidden');
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.classList.add('hidden');
                card.style.display = 'none';
            }
        });

        // Update UI
        const grid = document.getElementById('level-grid');
        const noRes = document.getElementById('no-results');
        const countLabel = document.getElementById('results-count');
        const sectionTitle = document.getElementById('section-title');

        if (visibleCount === 0) {
            grid.classList.add('hidden');
            noRes.classList.remove('hidden');
        } else {
            grid.classList.remove('hidden');
            noRes.classList.add('hidden');
        }

        const catNames = {
            'all': 'Full Journey',
            'elem': 'Elementary Path',
            'middle': 'Middle School Path',
            'high': 'High School Path',
            'extra': 'Extra Resources'
        };
        
        sectionTitle.textContent = catNames[currentCategory] || 'Academic Path';
        countLabel.textContent = `${visibleCount} levels available`;
    }

    function resetFilters() {
        document.getElementById('level-search').value = '';
        setCategory(null, 'all');
    }

    // --- UTILS ---

    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            const context = this;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    function checkStreak() {
        const lastVisit = localStorage.getItem('hl_last_visit');
        const streakCount = parseInt(localStorage.getItem('hl_streak') || '0');
        const today = new Date().toDateString();
        const el = document.getElementById('streak-stat');

        if (lastVisit === today) {
            el.textContent = streakCount;
        } else if (lastVisit) {
            const yesterday = new Date();
            yesterday.setDate(yesterday.getDate() - 1);
            if (lastVisit === yesterday.toDateString()) {
                const newStreak = streakCount + 1;
                localStorage.setItem('hl_streak', newStreak);
                el.textContent = newStreak;
                localStorage.setItem('hl_last_visit', today);
            } else {
                localStorage.setItem('hl_streak', 1);
                el.textContent = 1;
                localStorage.setItem('hl_last_visit', today);
            }
        } else {
            localStorage.setItem('hl_streak', 1);
            el.textContent = 1;
            localStorage.setItem('hl_last_visit', today);
        }
    }

    function triggerConfettiBtn(btn) {
        // Simple confetti effect centered on button
        const rect = btn.getBoundingClientRect();
        const x = (rect.left + rect.width / 2) / window.innerWidth;
        const y = (rect.top + rect.height / 2) / window.innerHeight;

        // Assuming global helper or we import one. 
        // If not available, we skip or use a simple fallback.
        if (typeof triggerConfetti === 'function') {
            triggerConfetti({ x, y });
        }
    }

    function checkResumeLearning() {
        const banner = document.getElementById('resume-banner');
        if (!banner) return;

        const allCards = Array.from(document.querySelectorAll('.level-card'));
        const nextLevelCard = allCards.find(c => !completedLevels.includes(c.dataset.id));

        if (nextLevelCard && completedLevels.length > 0) {
            const levelName = nextLevelCard.querySelector('h3').textContent.trim();
            document.getElementById('next-level-name').textContent = levelName;
            
            const link = nextLevelCard.querySelector('a').href;
            const clickArea = document.getElementById('resume-click-area');
            if (clickArea) clickArea.onclick = () => window.location.href = link;
            
            banner.classList.remove('hidden');
            banner.classList.add('animate-reveal');
        } else {
            banner.classList.add('hidden');
        }
    }

    function updateHeroGreeting() {
        const hour = new Date().getHours();
        const el = document.getElementById('hero-dynamic-greeting');
        if (!el) return;
        
        let greeting = "THE LEARNING ODYSSEY";
        if (hour < 12) greeting = "Good Morning Odyssey";
        else if (hour < 18) greeting = "Good Afternoon Journey";
        else greeting = "Good Evening Odyssey";
        
        el.textContent = greeting.toUpperCase();
    }

    function syncSearch(val) {
        const mainSearch = document.getElementById('level-search');
        if (mainSearch) {
            mainSearch.value = val;
            applyFilters();
        }
    }

    function speakCard(btn, title, desc) {
        if ('speechSynthesis' in window) {
            if (window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
            }
            const utterance = new SpeechSynthesisUtterance(title + ". " + desc);
            window.speechSynthesis.speak(utterance);
        }
    }

</script>



<?php include 'src/footer.php'; ?>