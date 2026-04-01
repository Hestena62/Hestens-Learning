    <!-- Documentation Modal (Knowledge Portal) -->
    <div id="doc-modal"
        class="fixed inset-0 z-[100] hidden opacity-0 transition-all duration-500 flex items-center justify-center pointer-events-none p-4 sm:p-6 sm:pb-12"
        aria-modal="true" role="dialog" aria-labelledby="modal-title">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-gray-900/40 dark:bg-black/60 backdrop-blur-sm transition-opacity cursor-pointer"
            onclick="closeDocModal()"></div>

        <!-- Modal Content -->
        <div class="bg-white dark:bg-[#0a0a0a] rounded-3xl relative w-full max-w-4xl transform scale-95 opacity-0 transition-all duration-500 doc-modal-content pointer-events-auto flex flex-col max-h-[85vh] overflow-hidden border border-gray-200 dark:border-white/10 shadow-2xl"
            id="modal-container">

            <!-- Header -->
            <div
                class="px-6 py-6 md:px-8 md:py-8 flex justify-between items-start shrink-0 relative z-20 border-b border-gray-100 dark:border-white/5">
                <div class="flex items-center gap-5">
                    <div id="modal-icon-container"
                        class="w-16 h-16 md:w-20 md:h-20 rounded-2xl bg-indigo-50 dark:bg-indigo-500/10 flex items-center justify-center text-3xl md:text-4xl transition-colors duration-700">
                        <i id="modal-icon" class="fas fa-info-circle text-indigo-500"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl md:text-4xl font-black font-outfit text-gray-900 dark:text-white tracking-tight mb-1 leading-none"
                            id="modal-title">
                            Curriculum Details
                        </h3>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="w-8 h-1 bg-indigo-500 rounded-full opacity-50"></span>
                            <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest"
                                id="modal-subtitle">Learning Path</span>
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
            <div
                class="px-6 md:px-8 py-6 md:py-8 overflow-y-auto custom-modal-scrollbar flex-grow relative z-10 bg-gray-50 dark:bg-transparent">
                <div class="max-w-none">
                    <div id="modal-desc-container"
                        class="mb-8 p-6 rounded-2xl bg-white dark:bg-white/5 border border-gray-200 dark:border-white/10 shadow-sm dark:shadow-none">
                        <p id="modal-desc"
                            class="text-base md:text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-medium">
                        </p>
                    </div>

                    <div id="modal-docs" class="text-gray-900 dark:text-white">
                        <!-- Redesigned Pills & Content injected here -->
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div
                class="px-6 md:px-8 py-5 md:py-6 bg-white dark:bg-[#0a0a0a] border-t border-gray-200 dark:border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4 shrink-0 relative z-20">
                <p
                    class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest hidden sm:block">
                    Hesten's Learning &copy; 2026</p>
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <button onclick="window.print()"
                        class="flex-1 sm:flex-none px-6 py-3 rounded-xl bg-gray-50 dark:bg-white/5 border border-gray-200 dark:border-white/10 text-gray-700 dark:text-gray-300 font-bold hover:bg-gray-100 dark:hover:bg-white/10 transition-all flex items-center justify-center gap-2 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                        <i class="fas fa-print"></i> <span class="hidden sm:inline">Print Path</span><span
                            class="sm:hidden">Print</span>
                    </button>
                    <button onclick="closeDocModal()"
                        class="flex-1 sm:flex-none px-8 py-3 rounded-xl bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold hover:-translate-y-0.5 transition-transform active:scale-95 text-sm shadow-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
