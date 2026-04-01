    <!-- Empty State -->
    <div id="no-results"
        class="hidden text-center py-24 px-4 bg-white/50 dark:bg-gray-900/50 backdrop-blur-md rounded-3xl border border-dashed border-gray-300 dark:border-gray-700 will-animate">
        <div
            class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 dark:bg-gray-800/50 mb-8 text-indigo-500/50 shadow-inner relative">
            <svg class="w-12 h-12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 8V11L13 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.5"/>
            </svg>
            <div class="absolute inset-0 bg-indigo-500/10 rounded-full animate-ping opacity-20" style="animation-duration: 3s;"></div>
        </div>
        <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-2 font-outfit tracking-tight">No paths discovered
        </h3>
        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">We couldn't find anything matching your search
            criteria. Try adjusting your filters.</p>
        <button onclick="resetFilters()"
            class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold py-3 px-8 rounded-xl shadow-lg hover:-translate-y-1 transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
            Clear Search
        </button>
    </div>
