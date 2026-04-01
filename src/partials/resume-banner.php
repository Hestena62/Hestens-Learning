    <!-- Global Resume / Status (Redesigned) -->
    <div id="resume-banner" class="hidden mb-20 relative group">
        <div
            class="absolute -inset-1 bg-gradient-to-r from-primary via-secondary to-accent rounded-[3rem] blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200">
        </div>
        <div class="relative bg-content-bg rounded-[3rem] p-8 flex flex-col md:flex-row items-center justify-between gap-8 border border-white/10 shadow-2xl overflow-hidden cursor-pointer"
            id="resume-click-area">
            <!-- Wave Pattern Background -->
            <svg class="absolute bottom-0 right-0 opacity-5 pointer-events-none" width="400" height="200"
                viewBox="0 0 400 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 100C50 80 150 120 200 100C250 80 350 120 400 100V200H0V100Z" fill="currentColor" />
            </svg>

            <div class="flex items-center gap-8 text-text-default">
                <div
                    class="w-20 h-20 bg-indigo-50 dark:bg-indigo-500/10 rounded-2xl flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-3xl shrink-0 group-hover:scale-110 transition-transform">
                    <i class="fas fa-play-circle"></i>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-black mb-1 font-outfit text-gray-900 dark:text-white">Continue Your Journey
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-400 font-medium">Resume where you left off: <span
                            id="next-level-name" class="text-indigo-600 dark:text-indigo-400 font-bold"></span></p>
                </div>
            </div>
            <button
                class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 px-10 py-4 rounded-xl font-black text-lg hover:-translate-y-1 transition-transform flex items-center gap-3 active:scale-95 shadow-lg shadow-gray-900/10 dark:shadow-white/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                type="button">
                <span>Resume Now</span> <i class="fas fa-arrow-right opacity-70"></i>
            </button>
        </div>
    </div>
