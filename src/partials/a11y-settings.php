    <div id="a11y-settings-panel"
        class="fixed top-0 right-0 h-full w-full sm:w-96 glass-premium z-[70] transform translate-x-full transition-transform duration-500 overflow-y-auto p-6 border-l border-white/20">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-primary flex items-center gap-2"><i class="fas fa-sliders-h"></i>
                Settings</h2>
            <button id="a11y-close-button" class="text-text-secondary hover:text-text-default p-2"><i
                    class="fas fa-times text-xl"></i></button>
        </div>
        <div class="space-y-6">
            <div>
                <h3 class="font-bold text-text-secondary mb-2 uppercase text-xs">Theme</h3>
                <div class="grid grid-cols-2 gap-2">
                    <button class="p-2 border rounded bg-gray-50 text-black hover:border-primary"
                        onclick="updateGlobalSetting('theme', 'light')">Light</button>
                    <button class="p-2 border rounded bg-gray-900 text-white hover:border-primary"
                        onclick="updateGlobalSetting('theme', 'dark')">Dark</button>
                    <button class="p-2 border rounded bg-black text-yellow-300 hover:border-yellow-400"
                        onclick="updateGlobalSetting('theme', 'high-contrast')">Contrast</button>
                    <button class="p-2 border rounded bg-[#f4ecd8] text-[#433422] hover:border-amber-600"
                        onclick="updateGlobalSetting('theme', 'sepia')">Sepia</button>
                    <button class="col-span-2 p-2 border rounded bg-[#011627] text-[#d6deeb] hover:border-blue-400"
                        onclick="updateGlobalSetting('theme', 'midnight')">Midnight</button>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-text-secondary mb-2 uppercase text-xs">Font</h3>
                <select id="panel-font" onchange="updateGlobalSetting('fontFamily', this.value)"
                    class="w-full p-2 rounded bg-base-bg border text-text-default">
                    <option value="Outfit">Outfit (Modern)</option>
                    <option value="Inter">Inter (Standard)</option>
                    <option value="Open Dyslexic">Open Dyslexic</option>
                    <option value="Lexend">Lexend</option>
                    <option value="Comic Neue">Comic Neue</option>
                    <option value="Roboto Mono">Monospace</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Text Size</label>
                <div class="flex items-center gap-2 mb-2">
                    <button class="flex-1 bg-base-bg p-2 rounded border hover:border-primary text-text-default flex items-center justify-center gap-1 font-bold" onclick="const s = document.getElementById('panel-size'); s.value = Math.max(0.8, parseFloat(s.value) - 0.1); updateGlobalSetting('fontSize', s.value)"><i class="fas fa-search-minus"></i> A-</button>
                    <button class="flex-1 bg-base-bg p-2 rounded border hover:border-primary text-text-default flex items-center justify-center gap-1 font-bold" onclick="const s = document.getElementById('panel-size'); s.value = Math.min(2.0, parseFloat(s.value) + 0.1); updateGlobalSetting('fontSize', s.value)"><i class="fas fa-search-plus"></i> A+</button>
                </div>
                <input type="range" id="panel-size" class="w-full accent-primary" min="0.8" max="2.0" step="0.1"
                    oninput="updateGlobalSetting('fontSize', this.value)">
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Line Height</label>
                <input type="range" id="panel-line" class="w-full accent-primary" min="1.0" max="2.5" step="0.1"
                    oninput="updateGlobalSetting('lineHeight', this.value)">
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Letter Spacing</label>
                <input type="range" id="panel-letter-spacing" class="w-full accent-primary" min="-0.05" max="0.5" step="0.05"
                    oninput="updateGlobalSetting('letterSpacing', this.value)">
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Word Spacing</label>
                <input type="range" id="panel-word-spacing" class="w-full accent-primary" min="-0.1" max="1.0" step="0.1"
                    oninput="updateGlobalSetting('wordSpacing', this.value)">
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Saturation</label>
                <input type="range" id="panel-saturation" class="w-full accent-primary" min="0" max="200" step="10"
                    oninput="updateGlobalSetting('saturation', this.value)">
            </div>
            <div>
                <label class="block text-xs font-bold text-text-default mb-1">Reading Mask Opacity</label>
                <input type="range" id="panel-mask-opacity" class="w-full accent-primary" min="0.1" max="0.95" step="0.05"
                    oninput="updateGlobalSetting('maskOpacity', this.value)">
            </div>
            <div>
                <h3 class="font-bold text-text-secondary mb-2 uppercase text-xs">Color Overlay</h3>
                <select id="panel-color-overlay" onchange="updateGlobalSetting('colorOverlay', this.value)"
                    class="w-full p-2 rounded bg-base-bg border text-text-default">
                    <option value="none">None</option>
                    <option value="rgba(255, 255, 0, 0.15)">Pale Yellow</option>
                    <option value="rgba(173, 216, 230, 0.15)">Pale Blue</option>
                    <option value="rgba(144, 238, 144, 0.15)">Pale Green</option>
                    <option value="rgba(255, 182, 193, 0.15)">Pale Pink</option>
                    <option value="rgba(216, 191, 216, 0.15)">Pale Purple</option>
                </select>
            </div>
            <div>
                <h3 class="font-bold text-text-secondary mb-2 uppercase text-xs">Text Alignment</h3>
                <div class="grid grid-cols-3 gap-2">
                    <button class="p-2 border rounded bg-base-bg hover:border-primary text-text-default"
                        onclick="updateGlobalSetting('textAlign', 'left')"><i class="fas fa-align-left"></i></button>
                    <button class="p-2 border rounded bg-base-bg hover:border-primary text-text-default"
                        onclick="updateGlobalSetting('textAlign', 'center')"><i class="fas fa-align-center"></i></button>
                    <button class="p-2 border rounded bg-base-bg hover:border-primary text-text-default"
                        onclick="updateGlobalSetting('textAlign', 'justify')"><i class="fas fa-align-justify"></i></button>
                </div>
            </div>
            <div class="space-y-3">
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Reading Mask</span>
                    <input type="checkbox" id="panel-mask" onchange="updateGlobalSetting('readingMask', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Large Cursor</span>
                    <input type="checkbox" id="panel-cursor"
                        onchange="updateGlobalSetting('cursorSize', this.checked ? 'large' : 'normal')"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Hide Images</span>
                    <input type="checkbox" id="panel-images" onchange="updateGlobalSetting('hideImages', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Teacher Mode</span>
                    <input type="checkbox" id="panel-teacher"
                        onchange="updateGlobalSetting('teacherMode', this.checked)" class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Focus Mode</span>
                    <input type="checkbox" id="panel-focus" onchange="updateGlobalSetting('focusMode', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Highlight Links</span>
                    <input type="checkbox" id="panel-links" onchange="updateGlobalSetting('highlightLinks', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Highlight Headings</span>
                    <input type="checkbox" id="panel-headings" onchange="updateGlobalSetting('highlightHeadings', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Text to Speech</span>
                    <input type="checkbox" id="panel-tts" onchange="updateGlobalSetting('textToSpeech', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Show Permalinks</span>
                    <input type="checkbox" id="panel-permalinks" onchange="updateGlobalSetting('showPermalinks', this.checked)"
                        class="accent-primary">
                </label>
                <label class="flex justify-between items-center p-2 bg-base-bg rounded">
                    <span class="text-sm font-bold text-text-default">Stop Animations</span>
                    <input type="checkbox" id="panel-stop-animations" onchange="updateGlobalSetting('stopAnimations', this.checked)"
                        class="accent-primary">
                </label>
            </div>
            <button onclick="localStorage.removeItem('hl_accessibility_settings'); location.reload()"
                class="w-full py-2 bg-red-100 text-red-700 rounded font-bold mt-4">Reset</button>
            <div class="text-center pt-2">
                <a href="/settings.php" class="text-primary text-sm hover:underline">Full Settings Page</a>
            </div>
        </div>
    </div>
