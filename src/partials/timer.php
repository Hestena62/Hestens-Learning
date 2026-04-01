    <div id="timer-panel"
        class="fixed bottom-24 right-6 w-64 bg-content-bg rounded-xl shadow-2xl transform scale-90 opacity-0 pointer-events-none transition-all duration-300 z-50 border-t-8 border-green-500 origin-bottom-right">
        <div class="p-4 text-center">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-bold text-text-default gap-2 flex items-center"><i
                        class="fas fa-clock text-green-600"></i> Timer</h3>
                <button id="timer-close" class="text-text-secondary hover:text-red-500"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="text-4xl font-mono font-bold text-text-default mb-4" id="timer-display">25:00</div>
            <div class="flex justify-center gap-2">
                <button id="timer-start"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 font-bold text-sm">Start</button>
                <button id="timer-reset"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 font-bold text-sm">Reset</button>
            </div>
        </div>
    </div>
