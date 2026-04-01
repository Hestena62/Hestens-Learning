    <div id="scratchpad-panel"
        class="fixed bottom-24 right-6 w-80 bg-content-bg rounded-xl shadow-2xl transform scale-90 opacity-0 pointer-events-none transition-all duration-300 z-50 border-t-8 border-indigo-500 origin-bottom-right">
        <div class="p-4">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-bold text-text-default gap-2 flex items-center"><i
                        class="fas fa-pen text-indigo-600"></i> Notes</h3>
                <button id="scratchpad-close" class="text-text-secondary hover:text-red-500"><i
                        class="fas fa-times"></i></button>
            </div>
            <textarea id="quick-notes-area"
                class="w-full h-40 p-3 bg-base-bg rounded-lg border-none resize-none text-sm text-text-default focus:ring-2 focus:ring-primary"
                placeholder="Type here..."></textarea>
            <div class="flex justify-between mt-2">
                <span id="scratchpad-status" class="text-xs text-text-secondary">Saved</span>
                <button id="download-notes" class="text-xs font-bold text-primary hover:underline">Download</button>
            </div>
        </div>
    </div>
