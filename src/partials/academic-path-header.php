    <!-- Redesigned Search bar -->
    <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-12 px-4">
        <div>
            <h2 class="text-5xl font-black text-gray-900 dark:text-white font-outfit mb-2 tracking-tight"
                id="section-title">Academic Path</h2>
            <div class="flex items-center gap-3">
                <span class="w-12 h-1.5 bg-indigo-500 rounded-full opacity-80"></span>
                <span class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest"
                    id="results-count">Analyzing levels...</span>
            </div>
        </div>

        <!-- Segmented Control -->
        <div class="hidden md:inline-flex bg-gray-200/50 dark:bg-white/5 p-1.5 rounded-2xl backdrop-blur-md border border-gray-200 dark:border-white/10 shadow-inner w-full lg:w-auto"
            role="tablist" aria-label="Filter learning paths">
            <button type="button" role="tab" aria-selected="true"
                class="path-tab active relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-900 dark:text-white bg-white dark:bg-gray-800 shadow-sm transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2"
                onclick="setCategory(this, 'all', true)">
                <i class="fas fa-layer-group text-indigo-500"></i> All
            </button>
            <button type="button" role="tab" aria-selected="false"
                class="path-tab relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2"
                onclick="setCategory(this, 'elem', true)">
                <i class="fas fa-child text-teal-500"></i> Elementary
            </button>
            <button type="button" role="tab" aria-selected="false"
                class="path-tab relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2"
                onclick="setCategory(this, 'middle', true)">
                <i class="fas fa-user-graduate text-amber-500"></i> Middle
            </button>
            <button type="button" role="tab" aria-selected="false"
                class="path-tab relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2"
                onclick="setCategory(this, 'high', true)">
                <i class="fas fa-brain text-rose-500"></i> High
            </button>
            <button type="button" role="tab" aria-selected="false"
                class="path-tab relative px-5 py-2.5 rounded-xl text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 flex-1 lg:flex-none flex items-center justify-center gap-2"
                onclick="setCategory(this, 'extra', true)">
                <i class="fas fa-plus-circle text-purple-500"></i> Extra
            </button>
        </div>

        <!-- Mobile Select -->
        <div class="md:hidden w-full relative">
            <select aria-label="Select Category"
                class="appearance-none w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl py-3.5 px-4 pr-10 text-gray-900 dark:text-white font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm"
                onchange="const tabs = document.querySelectorAll('.path-tab'); setCategory(tabs[0], this.value, true); Array.from(tabs).forEach((t, i) => t.setAttribute('aria-selected', i===this.selectedIndex));">
                <option value="all">All Paths</option>
                <option value="elem">Elementary</option>
                <option value="middle">Middle School</option>
                <option value="high">High School</option>
                <option value="extra">Extra Resources</option>
            </select>
            <i
                class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-sm"></i>
        </div>

        <div class="relative w-full md:w-80 group">
            <input type="text" id="level-search" aria-label="Search levels" placeholder="Search grades, topics..."
                class="w-full pl-12 pr-12 py-4 rounded-2xl border border-gray-200 dark:border-white/10 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all font-semibold placeholder-gray-400 text-base shadow-sm hover:shadow-md">
            <i
                class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-indigo-500 transition-colors pointer-events-none"></i>
            <button id="clear-search" onclick="resetFilters()"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-rose-500 hidden focus:outline-none focus-visible:ring-2 focus-visible:ring-rose-500 rounded-full p-1"
                aria-label="Clear Search" type="button">
                <i class="fas fa-times-circle text-xl"></i>
            </button>
        </div>
    </div>
