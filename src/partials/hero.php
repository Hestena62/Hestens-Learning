<!-- AURORA HERO SECTION -->
<div
    class="relative min-h-screen pt-24 lg:pt-32 pb-24 flex items-center justify-center overflow-hidden bg-white dark:bg-gray-950 transition-colors duration-500">
    <!-- Aurora Mesh Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none noise-grain">
        <div
            class="absolute -top-[20%] -left-[10%] w-[70vw] h-[70vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 will-change-transform bg-indigo-200 dark:bg-indigo-900/40">
        </div>
        <div
            class="absolute top-[20%] -right-[10%] w-[60vw] h-[60vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 style='animation-delay: -2s;' will-change-transform bg-purple-200 dark:bg-purple-900/40">
        </div>
        <div
            class="absolute -bottom-[20%] left-[20%] w-[50vw] h-[50vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 style='animation-delay: -4s;' will-change-transform bg-emerald-200 dark:bg-teal-900/40">
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8 relative z-10 text-center flex flex-col items-center">
        <!-- Pill Badge -->
        <div
            class="inline-flex items-center gap-3 rounded-full bg-white/60 dark:bg-black/20 backdrop-blur-xl px-5 py-2 text-xs font-bold text-gray-800 dark:text-gray-200 mb-10 border border-black/5 dark:border-white/10 shadow-[0_8px_32px_rgba(0,0,0,0.04)] animate-reveal">
            <span class="relative flex h-2 w-2">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-500 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
            </span>
            <span class="tracking-[0.2em] uppercase" id="hero-dynamic-greeting">THE LEARNING ODYSSEY</span>
        </div>

        <!-- Main Heading -->
        <h1
            class="text-6xl md:text-8xl lg:text-[7.5rem] font-black tracking-tighter text-gray-900 dark:text-white mb-8 font-outfit animate-reveal leading-[0.95]">
            Ignite Your <br />
            <span
                class="text-transparent bg-clip-text bg-gradient-to-br from-indigo-500 via-purple-500 to-emerald-400">Curiosity</span>
        </h1>

        <p class="mt-6 text-xl md:text-2xl leading-relaxed text-gray-600 dark:text-gray-300/80 max-w-2xl mx-auto mb-14 font-medium animate-reveal backdrop-blur-sm"
            style="animation-delay: 0.1s;">
            A beautifully crafted educational experience. Personalized, accessible, and structured for focused mastery.
        </p>

        <!-- Quick Stats (Glass Cards) -->
        <div class="mt-24 grid grid-cols-2 lg:grid-cols-4 gap-4 max-w-4xl w-full mx-auto animate-reveal"
            style="animation-delay: 0.3s;">
            <div
                class="bg-white/60 dark:bg-black/40 backdrop-blur-2xl p-6 rounded-[2rem] border border-white/40 dark:border-white/10 flex flex-col items-center hover:bg-white/80 dark:hover:bg-white/10 transition-all duration-300 shadow-sm glass-shine">
                <span class="text-3xl font-black text-indigo-600 dark:text-indigo-400 font-outfit mb-1 tracking-tight"
                    id="user-progress-stat">0%</span>
                <span
                    class="text-[10px] font-bold text-gray-500 dark:text-gray-400 uppercase tracking-[0.15em]">Mastery</span>
            </div>
            <div
                class="bg-white/60 dark:bg-black/40 backdrop-blur-2xl p-6 rounded-[2rem] border border-white/40 dark:border-white/10 flex flex-col items-center hover:bg-white/80 dark:hover:bg-white/10 transition-all duration-300 shadow-sm glass-shine">
                <div class="flex items-center gap-1.5">
                    <i class="fas fa-fire text-amber-500 mb-0.5"></i>
                    <span class="text-3xl font-black text-amber-600 dark:text-amber-400 font-outfit mb-1 tracking-tight"
                        id="streak-stat">0</span>
                </div>
                <span class="text-[10px] font-bold text-gray-500 dark:text-gray-400 uppercase tracking-[0.15em]">Active
                    Streak</span>
            </div>
            <div
                class="bg-white/60 dark:bg-black/40 backdrop-blur-2xl p-6 rounded-[2rem] border border-white/40 dark:border-white/10 flex-col items-center hover:bg-white/80 dark:hover:bg-white/10 transition-all duration-300 shadow-sm glass-shine hidden sm:flex">
                <i class="fas fa-shield-check text-[1.35rem] text-emerald-500 dark:text-emerald-400 mb-2.5 mt-1"></i>
                <span class="text-[10px] font-bold text-gray-500 dark:text-gray-400 uppercase tracking-[0.15em]">Safe
                    Space</span>
            </div>
            <div
                class="bg-white/60 dark:bg-black/40 backdrop-blur-2xl p-6 rounded-[2rem] border border-white/40 dark:border-white/10 flex-col items-center hover:bg-white/80 dark:hover:bg-white/10 transition-all duration-300 shadow-sm glass-shine hidden sm:flex">
                <i class="fas fa-universal-access text-[1.4rem] text-purple-500 dark:text-purple-400 mb-2.5 mt-1"></i>
                <span
                    class="text-[10px] font-bold text-gray-500 dark:text-gray-400 uppercase tracking-[0.15em]">Accessible</span>
            </div>
        </div>
    </div>
</div>
