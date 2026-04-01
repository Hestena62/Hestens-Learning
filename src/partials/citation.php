    <div id="citation-panel"
        class="fixed bottom-24 right-6 w-80 bg-content-bg rounded-xl shadow-2xl transform scale-90 opacity-0 pointer-events-none transition-all duration-300 z-50 border-t-8 border-pink-500 origin-bottom-right">
        <div class="p-4">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-bold text-text-default gap-2 flex items-center"><i
                        class="fas fa-quote-right text-pink-600"></i> Cite</h3>
                <button id="citation-close" class="text-text-secondary hover:text-red-500"><i
                        class="fas fa-times"></i></button>
            </div>
            <input type="text" id="cite-title" placeholder="Page Title"
                class="w-full p-2 mb-2 bg-base-bg rounded text-sm text-text-default">
            <button id="cite-gen" class="w-full bg-pink-500 text-white rounded p-1 mb-2">Generate APA/MLA</button>
            <textarea id="cite-result" readonly
                class="w-full h-20 bg-base-bg text-text-default text-xs p-2 rounded"></textarea>
        </div>
    </div>
