<!DOCTYPE html>
<html lang="en-US" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Empowering students with learning disabilities through personalized, accessible learning experiences in Math, ELA, and Science." />
    <meta name="keywords"
        content="learning disabilities, personalized education, online learning, math, ELA, science, accessible education" />
    <meta name="author" content="Hesten's Learning" />

    <!-- PWA & Mobile Meta Tags -->
    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png">
    <meta name="theme-color" content="#4F46E5" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Hesten's">

    <!-- Open Graph -->
    <meta property="og:title" content="Hesten's Learning" />
    <meta property="og:description" content="Personalized, accessible learning for everyone." />
    <meta property="og:type" content="website" />

    <title><?php echo isset($pageTitle) ? $pageTitle : "Hesten's Learning"; ?></title>

    <!-- Resource Hints -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

    <!-- Font Loading -->
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600&family=Inter:wght@400;600;700&family=Cookie&family=Comic+Neue:wght@400;700&family=Merriweather:wght@400;700&family=Roboto+Mono:wght@400;700&family=Outfit:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/JS/tailwind-config.js"></script>

    <!-- Custom Modern Styles -->
    <link rel="stylesheet" href="/src/styles.css">
</head>

<body class="light antialiased font-sans overflow-x-hidden selection:bg-primary selection:text-white">

    <!-- Fixed Tools Container (Increased Z-index to sit above Reading Mask) -->
    <div id="fixed-tools-container" class="fixed bottom-6 right-6 z-[60] flex flex-col gap-3 items-end print:hidden">
        <button id="scroll-to-top"
            class="w-12 h-12 bg-content-bg backdrop-blur border border-gray-200 dark:border-gray-700 text-primary rounded-full shadow-lg hover:scale-110 focus:outline-none transition-all duration-300 transform translate-y-24 opacity-0 flex items-center justify-center"
            type="button"><i class="fas fa-arrow-up"></i></button>
        <button onclick="window.print()"
            class="w-12 h-12 bg-gray-600 text-white rounded-full shadow-lg hover:scale-105 flex items-center justify-center transition-all"
            title="Print Page" type="button"><i class="fas fa-print"></i></button>
        <button id="citation-toggle"
            class="w-14 h-14 bg-pink-500 text-white rounded-full shadow-2xl hover:scale-105 flex items-center justify-center transition-all"
            type="button"><i class="fas fa-quote-right text-xl"></i></button>
        <button id="timer-toggle"
            class="w-14 h-14 bg-green-600 text-white rounded-full shadow-2xl hover:scale-105 flex items-center justify-center transition-all"
            type="button"><i class="fas fa-stopwatch text-xl"></i></button>
        <button id="scratchpad-toggle"
            class="w-14 h-14 bg-indigo-600 text-white rounded-full shadow-2xl hover:scale-105 flex items-center justify-center transition-all"
            type="button"><i class="fas fa-pen text-xl"></i></button>
        <button id="a11y-toggle-button"
            class="w-14 h-14 bg-primary text-white rounded-full shadow-2xl hover:bg-secondary transition-all transform hover:scale-105 flex items-center justify-center animate-bounce-short"
            type="button"><i class="fas fa-universal-access text-2xl"></i></button>
    </div>

    <!-- PANELS -->
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

    <!-- A11y Panel -->
    <div id="a11y-settings-panel"
        class="fixed top-0 right-0 h-full w-full sm:w-96 bg-content-bg shadow-2xl z-[70] transform translate-x-full transition-transform duration-300 overflow-y-auto p-6 border-l border-white/20 backdrop-blur-xl">
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

    <div id="reading-mask" class="hidden">
        <div id="reading-guide" style="top:30%"></div>
    </div>

 <!-- Announcement Bar -->
    <div id="announcement-bar" class="hidden bg-primary text-white text-center py-2 px-12 sm:px-16 relative transition-colors duration-300 shadow-md z-40" role="status">
        <button id="prev-announcement" class="absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 text-white/80 hover:text-white p-1 sm:p-2 rounded-full transition-colors" aria-label="Previous announcement" type="button"><i class="fas fa-chevron-left"></i></button>
        
        <div id="announcement-content-container" class="overflow-hidden w-full flex justify-center items-center" style="min-height: 24px;">
            <p id="announcement-content" class="text-xs sm:text-sm font-medium transition-opacity duration-300 w-full max-w-4xl mx-auto truncate sm:whitespace-normal">
                <!-- Content will be injected by JS -->
            </p>
        </div>

        <button id="next-announcement" class="absolute right-10 sm:right-14 top-1/2 transform -translate-y-1/2 text-white/80 hover:text-white p-1 sm:p-2 rounded-full transition-colors" aria-label="Next announcement" type="button"><i class="fas fa-chevron-right"></i></button>
        <button id="close-announcement" class="absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 text-white/80 hover:text-white p-1 sm:p-2 rounded-full transition-colors" aria-label="Close announcement" type="button"><i class="fas fa-times"></i></button>
    </div>
    <script>
        // Announcement Bar Logic
        const annBar = document.getElementById('announcement-bar');
        const annContent = document.getElementById('announcement-content');
        const annClose = document.getElementById('close-announcement');
        const annPrev = document.getElementById('prev-announcement');
        const annNext = document.getElementById('next-announcement');
        
        // Change this version string to force the announcement to show again for all users
        const ANN_VERSION = 'v1.1'; 
        
        const announcements = [
            '<i class="fas fa-hammer mr-2"></i> Work in Progress: We are updating sections daily. Have question please email me at <a href="mailto:admin@hestena62.com" class="underline hover:text-blue-200">admin@hestena62.com</a>',
            '<i class="fas fa-star mr-2"></i> New Feature: You can now backup your site data directly to Google Drive in the settings menu!',
            '<i class="fas fa-book mr-2"></i> Check out the expanded library collection with our newly added open-source titles.','<i class="fas fa-globe mr-2"></i> OpenDyslexic font is not working, I am working on it.'
        ];
        
        let currentAnnIndex = 0;

        function renderAnnouncement() {
            if (!annContent) return;
            // Fade out
            annContent.style.opacity = '0';
            setTimeout(() => {
                annContent.innerHTML = announcements[currentAnnIndex];
                // Fade in
                annContent.style.opacity = '1';
            }, 150); // wait halfway to swap text
        }

        if (annBar && annClose) {
            if (localStorage.getItem('hl_announcement_dismissed') !== ANN_VERSION) {
                annBar.classList.remove('hidden');
                renderAnnouncement(); // init first slide
                
                // Set up navigation
                if (annPrev && annNext) {
                    annPrev.onclick = () => {
                        currentAnnIndex = (currentAnnIndex > 0) ? currentAnnIndex - 1 : announcements.length - 1;
                        renderAnnouncement();
                    };
                    annNext.onclick = () => {
                        currentAnnIndex = (currentAnnIndex < announcements.length - 1) ? currentAnnIndex + 1 : 0;
                        renderAnnouncement();
                    };
                }
            }
            annClose.onclick = () => {
                annBar.classList.add('hidden');
                localStorage.setItem('hl_announcement_dismissed', ANN_VERSION);
            };
        }
    </script>

    <header
        class="glass-header sticky top-0 z-40 transition-colors duration-300 print:hidden shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <nav class="flex items-center justify-between flex-wrap">
                <a class="flex items-center flex-shrink-0 text-primary mr-8 group" href="/">
                    <div
                        class="h-10 w-10 mr-3 bg-gradient-to-br from-primary to-secondary text-white rounded-xl flex items-center justify-center font-bold text-xl shadow-lg group-hover:rotate-12 transition-transform">
                        H</div>
                    <span class="font-bold text-xl tracking-tight text-text-default">Hesten's Learning</span>
                </a>
                <div class="block lg:hidden">
                    <button id="nav-toggle"
                        class="flex items-center px-3 py-2 border rounded text-text-default border-gray-400 hover:text-primary transition-colors"><i
                            class="fas fa-bars"></i></button>
                </div>
                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden transition-all duration-300 gap-4"
                    id="nav-content">
                    <div class="text-sm lg:flex-grow flex flex-col lg:flex-row gap-2 lg:gap-6 mt-4 lg:mt-0 font-medium whitespace-nowrap">
                        <a href="/" class="nav-link-animated block lg:inline-block text-text-default hover:text-primary transition-colors"><i
                                class="fas fa-home mr-1"></i> Home</a>
                        <a href="/learning.php"
                            class="nav-link-animated block lg:inline-block text-text-default hover:text-primary transition-colors"><i
                                class="fas fa-book mr-1"></i> Learning</a>
                        <a href="/assessment" class="nav-link-animated block lg:inline-block text-text-default hover:text-primary transition-colors"><i
                                class="fas fa-tasks mr-1"></i> Assessment</a>
                        <a href="/library" class="nav-link-animated block lg:inline-block text-text-default hover:text-primary transition-colors"><i
                                class="fas fa-book-open mr-1"></i> Library</a>
                    </div>
                    <div class="flex items-center gap-4 mt-4 lg:mt-0 w-full lg:w-auto">
                        <form action="/search.php" method="GET" class="flex items-center group relative w-full lg:w-auto">
                            <input type="text" name="q" placeholder="Search..."
                                class="bg-base-bg text-text-default rounded-full py-2 pl-10 pr-4 focus:ring-2 focus:ring-primary w-full lg:w-48 border border-gray-200 dark:border-gray-700 transition-all duration-300" />
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-primary transition-colors"></i>
                        </form>
                    </div>
                </div>
            </nav>
            
            <!-- Breadcrumbs -->
            <?php
            // Calculate breadcrumbs based on the URL with a fallback for local testing
            $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
            $parts = explode('?', $uri)[0]; // Remove query string
            $parts = array_filter(explode('/', $parts));
            
            if (!empty($parts) && basename($uri) !== 'index.php' && $uri !== '/' && $uri !== '') {
                echo '<nav class="mt-4 text-sm text-text-secondary flex items-center gap-2 overflow-x-auto whitespace-nowrap pb-1 print:hidden" aria-label="Breadcrumb">';
                echo '<a href="/" class="hover:text-primary transition-colors"><i class="fas fa-home"></i></a>';
                
                $path = '';
                $total = count($parts);
                $i = 0;
                
                foreach ($parts as $part) {
                    $i++;
                    $path .= '/' . $part;
                    $name = ucwords(str_replace(['-', '.php', '.html'], [' ', '', ''], $part));
                    
                    echo '<span class="text-gray-400 mx-1"><i class="fas fa-chevron-right text-[10px]"></i></span>';
                    
                    if ($i === $total) {
                        echo '<span class="text-text-default font-medium text-emerald-600 dark:text-emerald-400 truncate max-w-[200px]" aria-current="page">' . htmlspecialchars($name) . '</span>';
                    } else {
                        echo '<a href="' . htmlspecialchars($path) . '" class="hover:text-primary transition-colors truncate max-w-[150px]">' . htmlspecialchars($name) . '</a>';
                    }
                }
                echo '</nav>';
            }
            ?>
        </div>
    </header>

    <script src="/JS/a11y.js"></script>