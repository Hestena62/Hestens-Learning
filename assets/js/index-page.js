// index-page.js - Logic for the main landing page

// --- STATE ---
let completedLevels = [];
let bookmarkedLevels = [];
let currentCategory = 'all';

// --- INIT ---
document.addEventListener("DOMContentLoaded", () => {
    loadState();
    if (typeof learningLevels !== 'undefined') {
        renderLevels(learningLevels); // Render grid from JS data
    }
    checkStreak();
    updateHeroGreeting();

    // Search & Filter Listeners
    const searchInput = document.getElementById('level-search');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const heroSearch = document.getElementById('hero-search');
            if (heroSearch) heroSearch.value = e.target.value;
            debounce(applyFilters, 200)();
        });
    }
});

const THEME_MAP = {
    'elem': {
        'border': 'border-teal-400 dark:border-teal-500',
        'icon_bg': 'bg-teal-100 dark:bg-teal-900',
        'icon_text': 'text-teal-600 dark:text-teal-300',
        'hover': 'group-hover:border-teal-500',
        'btn': 'hover:bg-teal-500 hover:text-white',
        'accent': 'text-teal-600 dark:text-teal-400',
        'shadow': 'shadow-teal-100 dark:shadow-teal-900/20',
        'label': 'Elementary'
    },
    'middle': {
        'border': 'border-amber-400 dark:border-amber-500',
        'icon_bg': 'bg-amber-100 dark:bg-amber-900',
        'icon_text': 'text-amber-600 dark:text-amber-300',
        'hover': 'group-hover:border-amber-500',
        'btn': 'hover:bg-amber-500 hover:text-white',
        'accent': 'text-amber-600 dark:text-amber-400',
        'shadow': 'shadow-amber-100 dark:shadow-amber-900/20',
        'label': 'Middle School'
    },
    'high': {
        'border': 'border-rose-400 dark:border-rose-500',
        'icon_bg': 'bg-rose-100 dark:bg-rose-900',
        'icon_text': 'text-rose-600 dark:text-rose-300',
        'hover': 'group-hover:border-rose-500',
        'btn': 'hover:bg-rose-500 hover:text-white',
        'accent': 'text-rose-600 dark:text-rose-400',
        'shadow': 'shadow-rose-100 dark:shadow-rose-900/20',
        'label': 'High School'
    },
    'extra': {
        'border': 'border-violet-400 dark:border-violet-500',
        'icon_bg': 'bg-violet-100 dark:bg-violet-900',
        'icon_text': 'text-violet-600 dark:text-violet-300',
        'hover': 'group-hover:border-violet-500',
        'btn': 'hover:bg-violet-500 hover:text-white',
        'accent': 'text-violet-600 dark:text-violet-400',
        'shadow': 'shadow-violet-100 dark:shadow-violet-900/20',
        'label': 'Extra'
    }
};

function renderLevels(data) {
    const grid = document.getElementById('level-grid');
    if (!grid) return;

    grid.innerHTML = data.map((level, index) => {
        const theme = THEME_MAP[level.category] || THEME_MAP.elem;
        const keywords = level.keywords ? level.keywords.toLowerCase() : '';
        const safeTitle = level.title.replace(/'/g, "\\'");
        const safeDesc = level.description.replace(/'/g, "\\'");

        return `
        <article class="level-card group relative flex flex-col h-full animate-reveal"
            style="animation-delay: ${index * 50}ms"
            data-category="${level.category}"
            data-display-title="${level.title}"
            data-title="${level.title.toLowerCase()}"
            data-desc="${level.description}"
            data-keywords="${keywords}"
            data-icon="${level.icon}"
            data-doc="${encodeURIComponent(level.documentation || '')}"
            data-id="${level.id}">

            <div class="h-full rounded-3xl bg-white dark:bg-[#0a0a0a] border border-gray-200 dark:border-white/10 p-8 flex flex-col relative overflow-hidden transition-all duration-300 hover:shadow-xl hover:shadow-gray-900/5 dark:hover:border-white/20 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 dark:focus-within:ring-offset-gray-950 hover-lift glass-shine will-animate">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-500/5 rounded-full blur-3xl group-hover:bg-indigo-500/10 transition-colors duration-500 pointer-events-none"></div>
                
                <div class="flex items-start justify-between mb-8 relative z-10 w-full">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-2xl shadow-sm transition-transform ${theme.icon_bg} ${theme.icon_text}">
                            <i class="${level.icon}"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-gray-900 dark:text-white font-outfit tracking-tight leading-tight">${level.title}</h3>
                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400">${theme.label}</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 shrink-0">
                        <button type="button" class="bookmark-btn w-10 h-10 rounded-full bg-gray-50 dark:bg-white/5 text-gray-400 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-500/10 transition-all flex items-center justify-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 shadow-sm border border-gray-200 dark:border-white/5"
                            onclick="toggleBookmark('${level.id}', this)" aria-label="Bookmark ${level.title}">
                            <i class="far fa-star"></i>
                        </button>
                        <button type="button" class="complete-btn w-10 h-10 rounded-full bg-gray-50 dark:bg-white/5 text-gray-400 hover:text-emerald-500 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 transition-all flex items-center justify-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500 shadow-sm border border-gray-200 dark:border-white/5"
                            onclick="toggleCompletion('${level.id}', this)" aria-label="Mark ${level.title} as Complete">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                </div>

                <p class="text-gray-600 dark:text-gray-400 text-[0.95rem] leading-relaxed font-medium mb-8 relative z-10 line-clamp-3">${level.description}</p>

                <div class="mt-auto flex items-center justify-between gap-4 relative z-10 w-full pt-4 border-t border-gray-100 dark:border-white/5">
                    <button type="button" aria-haspopup="dialog" class="flex items-center gap-2 text-sm font-bold text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 rounded p-1"
                        onclick="openDocModal(this)">
                        <i class="fas fa-book-open"></i> Curriculum
                    </button>
                    <div class="flex items-center gap-2">
                        <button type="button" class="w-10 h-10 rounded-full text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all flex items-center justify-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500"
                            onclick="speakCard(this, '${safeTitle}', '${safeDesc}')" aria-label="Listen to description">
                            <i class="fas fa-volume-up"></i>
                        </button>
                        <a href="${level.link}" aria-label="Explore ${level.title}" class="inline-flex items-center gap-2 bg-gray-900 dark:bg-white text-white dark:text-gray-900 font-bold py-3 px-6 rounded-xl transition-all hover:bg-black dark:hover:bg-gray-100 shadow-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 text-sm">
                            <span>Open</span>
                            <i class="fas fa-arrow-right text-[10px] opacity-70"></i>
                        </a>
                    </div>
                </div>
                <div class="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-emerald-400 to-teal-400 w-0 transition-all duration-700 completion-bar"></div>
            </div>
        </article>`;
    }).join('');

    // Apply saved state to new elements
    hydrateGrid();

    // Setup Intersection Observer for the new elements
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-reveal');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.level-card').forEach(el => {
        revealObserver.observe(el);
    });
}

function loadState() {
    try {
        completedLevels = JSON.parse(localStorage.getItem('hl_completed_levels') || '[]');
        bookmarkedLevels = JSON.parse(localStorage.getItem('hl_bookmarked_levels') || '[]');
    } catch (e) { console.error(e); }
}

function hydrateGrid() {
    // Complete Buttons & Styles
    completedLevels.forEach(id => {
        const card = document.querySelector(`.level-card[data-id="${id}"]`);
        if (card) markCardComplete(card, true);
    });

    // Bookmarks
    bookmarkedLevels.forEach(id => {
        const btn = document.querySelector(`.level-card[data-id="${id}"] .bookmark-btn`);
        if (btn) markBtnBookmarked(btn, true);
    });

    // Stats
    updateStats();

    // Resume Banner
    checkResumeLearning();
}

// --- ACTIONS ---

function openDocModal(btn) {
    const card = btn.closest('.level-card');
    const title = card.dataset.displayTitle;
    const desc = card.dataset.desc;
    const iconClass = card.dataset.icon;
    const docs = decodeURIComponent(card.dataset.doc);

    const category = card.dataset.category;

    const modal = document.getElementById('doc-modal');
    const modalContainer = document.getElementById('modal-container');
    const modalContent = modal.querySelector('.doc-modal-content');

    // Theme mapping for Modal
    const themes = {
        'elem': { color: '#14b8a6', bg: 'rgba(20, 184, 166, 0.1)', text: 'Elementary Path' },
        'middle': { color: '#f59e0b', bg: 'rgba(245, 158, 11, 0.1)', text: 'Middle School Path' },
        'high': { color: '#e11d48', bg: 'rgba(225, 29, 72, 0.1)', text: 'High School Path' },
        'extra': { color: '#7c3aed', bg: 'rgba(124, 58, 237, 0.1)', text: 'Extra Resources' }
    };
    const activeTheme = themes[category] || themes['elem'];

    // Apply Theme to Modal
    modalContainer.style.borderTopColor = activeTheme.color;
    document.documentElement.style.setProperty('--color-primary', activeTheme.color);
    document.documentElement.style.setProperty('--color-primary-rgb', category === 'elem' ? '20, 184, 166' : (category === 'middle' ? '245, 158, 11' : (category === 'high' ? '225, 29, 72' : '124, 58, 237')));

    const iconContainer = document.getElementById('modal-icon-container');
    iconContainer.style.backgroundColor = activeTheme.bg;

    document.getElementById('modal-title').textContent = title;
    document.getElementById('modal-subtitle').textContent = activeTheme.text;
    document.getElementById('modal-icon').className = iconClass;
    document.getElementById('modal-icon').style.color = activeTheme.color;
    document.getElementById('modal-desc').textContent = desc;

    const docsContainer = document.getElementById('modal-docs');
    if (docs && docs.trim() !== '') {
        const parser = new DOMParser();
        const docEl = parser.parseFromString(docs, 'text/html');
        const h4 = docEl.querySelector('h4');
        const subjectsDiv = docEl.querySelector('div.space-y-4');

        if (h4 && subjectsDiv) {
            const titleText = h4.textContent;
            const items = Array.from(subjectsDiv.children);

            let tabHeaders = '<div class="flex flex-wrap gap-2 mb-8 p-1.5 bg-gray-100 dark:bg-white/5 rounded-2xl border border-gray-200 dark:border-white/10 w-fit relative">';
            // Add sliding pill background
            tabHeaders += '<div id="modal-tab-slider" class="absolute top-1.5 bottom-1.5 left-1.5 bg-white dark:bg-gray-800 rounded-xl shadow-sm transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] z-0"></div>';
            let tabContents = '<div class="grid grid-cols-1 gap-6">';

            items.forEach((item, index) => {
                const h5 = item.querySelector('h5');
                const subjectName = h5 ? h5.textContent : `Module ${index + 1}`;
                let bodyHtml = item.innerHTML;
                if (h5) {
                    bodyHtml = bodyHtml.replace(h5.outerHTML, '');
                }

                const isActive = index === 0;
                const activeClasses = isActive ? 'text-gray-900 dark:text-white' : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white';

                tabHeaders += `<button type="button" class="modal-tab-pill relative px-6 py-2.5 rounded-xl transition-all text-sm font-black tracking-tight z-10 ${activeClasses}" data-index="${index}" onclick="switchModalTab(this, ${index})">
                    ${subjectName}
                </button>`;

                const contentClass = isActive ? 'block animate-fade-in-up' : 'hidden';
                const staggerDelay = isActive ? '0s' : `${index * 0.05}s`;
                tabContents += `<div class="modal-tab-pane ${contentClass}" data-index="${index}" style="animation-delay: ${staggerDelay}">
                    <div class="bg-white dark:bg-[#0a0a0a] p-6 md:p-8 rounded-[2rem] border border-gray-200 dark:border-white/10 relative overflow-hidden shadow-sm">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-500/5 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="relative z-10 prose prose-indigo dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                            ${bodyHtml}
                        </div>
                    </div>
                </div>`;
            });

            tabHeaders += '</div>';
            tabContents += '</div>';

            docsContainer.innerHTML = `<h4 class="text-xl font-black mb-6 font-outfit text-gray-900 dark:text-white flex items-center gap-3">
                <span class="w-2 h-8 bg-indigo-500 rounded-full"></span> ${titleText}
            </h4>${tabHeaders}${tabContents}`;
            
            // Initialize slider position
            setTimeout(() => {
                const firstTab = document.querySelector('.modal-tab-pill');
                if (firstTab) updateModalTabSlider(firstTab);
            }, 50);
        } else {
            docsContainer.innerHTML = `<div class="bg-white dark:bg-[#0a0a0a] p-8 rounded-[2rem] border border-gray-200 dark:border-white/10 shadow-sm animate-fade-in-up">${docs}</div>`;
        }
    } else {
        docsContainer.innerHTML = '<div class="text-center py-12 bg-white dark:bg-[#0a0a0a] rounded-[3rem] border border-gray-200 dark:border-white/10 shadow-sm"><i class="fas fa-sparkles text-5xl text-indigo-500/20 mb-4 block"></i><p class="text-gray-500 dark:text-gray-400 font-bold text-lg">Detailed curriculum is being prepared for this journey.</p></div>';
    }

    // Show modal
    modal.classList.remove('hidden');
    void modal.offsetWidth;
    modal.classList.remove('opacity-0', 'pointer-events-none');
    modal.classList.add('opacity-100');
    modalContent.classList.remove('scale-90', 'opacity-0');
    modalContent.classList.add('scale-100', 'opacity-100');
    document.body.style.overflow = 'hidden';
}

function closeDocModal() {
    const modal = document.getElementById('doc-modal');
    const modalContent = modal.querySelector('.doc-modal-content');

    // Animate out
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');

    modalContent.classList.remove('scale-100', 'opacity-100');
    modalContent.classList.add('scale-90', 'opacity-0');

    // Wait for transition before hiding
    setTimeout(() => {
        modal.classList.add('hidden', 'pointer-events-none');
        // Re-enable body scrolling
        document.body.style.overflow = '';
    }, 300);
}

function switchModalTab(btn, index) {
    const container = btn.closest('#modal-docs');
    const btns = container.querySelectorAll('.modal-tab-pill');
    const panes = container.querySelectorAll('.modal-tab-pane');

    btns.forEach(b => {
        b.classList.remove('text-gray-900', 'dark:text-white');
        b.classList.add('text-gray-500', 'dark:text-gray-400', 'hover:text-gray-900', 'dark:hover:text-white');
    });

    btn.classList.add('text-gray-900', 'dark:text-white');
    btn.classList.remove('text-gray-500', 'dark:text-gray-400', 'hover:text-gray-900', 'dark:hover:text-white');

    updateModalTabSlider(btn);

    panes.forEach(p => {
        if (parseInt(p.dataset.index) === index) {
            p.classList.remove('hidden');
            p.classList.add('block', 'animate-fade-in-up');
            p.style.animationDelay = '0s';
        } else {
            p.classList.remove('block', 'animate-fade-in-up');
            p.classList.add('hidden');
        }
    });
}

function updateModalTabSlider(btn) {
    const slider = document.getElementById('modal-tab-slider');
    if (!slider) return;
    slider.style.width = btn.offsetWidth + 'px';
    slider.style.left = btn.offsetLeft + 'px';
}

function toggleCompletion(id, btn) {
    const card = btn.closest('.level-card');
    const index = completedLevels.indexOf(id);
    const isComplete = index === -1;

    if (isComplete) {
        completedLevels.push(id);
        triggerConfettiBtn(btn);
        markCardComplete(card, true);
    } else {
        completedLevels.splice(index, 1);
        markCardComplete(card, false);
    }

    saveState();
    updateStats();
    checkResumeLearning();
}

function markCardComplete(card, isComplete) {
    const bar = card.querySelector('.completion-bar');
    const btn = card.querySelector('.complete-btn');
    const contentDiv = card.querySelector('.shadow-premium');

    if (isComplete) {
        if (bar) bar.style.width = '100%';
        if (btn) {
            btn.classList.add('bg-emerald-500', 'text-white', 'border-transparent');
            btn.classList.remove('bg-gray-50', 'dark:bg-white/5', 'text-gray-400', 'border-gray-200', 'dark:border-white/5');
            btn.innerHTML = '<i class="fas fa-check text-sm"></i>';
        }
        if (contentDiv) contentDiv.classList.add('ring-2', 'ring-emerald-500/50', 'dark:ring-emerald-500/30');
    } else {
        if (bar) bar.style.width = '0%';
        if (btn) {
            btn.classList.remove('bg-emerald-500', 'text-white', 'border-transparent');
            btn.classList.add('bg-gray-50', 'dark:bg-white/5', 'text-gray-400', 'border-gray-200', 'dark:border-white/5');
            btn.innerHTML = '<i class="fas fa-check text-sm"></i>';
        }
        if (contentDiv) contentDiv.classList.remove('ring-2', 'ring-emerald-500/50', 'dark:ring-emerald-500/30');
    }
}

function toggleBookmark(id, btn) {
    const index = bookmarkedLevels.indexOf(id);
    const isBookmarked = index === -1;

    if (isBookmarked) {
        bookmarkedLevels.push(id);
        markBtnBookmarked(btn, true);
    } else {
        bookmarkedLevels.splice(index, 1);
        markBtnBookmarked(btn, false);
    }
    saveState();
}

function markBtnBookmarked(btn, active) {
    if (active) {
        btn.classList.add('text-amber-500', 'bg-amber-100', 'dark:bg-amber-500/20', 'border-transparent');
        btn.classList.remove('text-gray-400', 'bg-gray-50', 'dark:bg-white/5', 'border-gray-200', 'dark:border-white/5');
        btn.innerHTML = '<i class="fas fa-star text-sm"></i>'; // Solid star
    } else {
        btn.classList.remove('text-amber-500', 'bg-amber-100', 'dark:bg-amber-500/20', 'border-transparent');
        btn.classList.add('text-gray-400', 'bg-gray-50', 'dark:bg-white/5', 'border-gray-200', 'dark:border-white/5');
        btn.innerHTML = '<i class="far fa-star text-sm"></i>'; // Outline star
    }
}

function saveState() {
    localStorage.setItem('hl_completed_levels', JSON.stringify(completedLevels));
    localStorage.setItem('hl_bookmarked_levels', JSON.stringify(bookmarkedLevels));
}

function updateStats() {
    const total = typeof learningLevels !== 'undefined' ? learningLevels.length : 0;
    const count = completedLevels.length;
    const pct = total ? Math.round((count / total) * 100) : 0;
    const el = document.getElementById('user-progress-stat');
    if (el) el.textContent = pct + '%';
}


// --- FILTERING ---

function setCategory(btn, cat, scrollToGrid = false) {
    currentCategory = cat;

    // Update Path Cards
    document.querySelectorAll('.path-card').forEach(b => {
        b.classList.remove('journey-path-active', 'ring-4', 'ring-primary/20');
    });

    if (cat !== 'all' && btn && btn.classList.contains('path-card')) {
        btn.classList.add('journey-path-active', 'ring-4', 'ring-primary/20');
    }

    applyFilters();

    if (scrollToGrid) {
        const grid = document.getElementById('main-content');
        grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function applyFilters() {
    const term = document.getElementById('level-search').value.toLowerCase().trim();
    const cards = document.querySelectorAll('.level-card');
    const clearBtn = document.getElementById('clear-search');
    let visibleCount = 0;

    if (term) clearBtn.classList.remove('hidden');
    else clearBtn.classList.add('hidden');

    cards.forEach(card => {
        const cat = card.dataset.category;
        const matchesCat = currentCategory === 'all' || cat === currentCategory;
        const matchesSearch = !term ||
            card.dataset.title.includes(term) ||
            card.dataset.desc.includes(term) ||
            (card.dataset.keywords && card.dataset.keywords.includes(term));

        if (matchesCat && matchesSearch) {
            card.classList.remove('hidden');
            card.style.display = 'flex';
            visibleCount++;
        } else {
            card.classList.add('hidden');
            card.style.display = 'none';
        }
    });

    // Update UI
    const grid = document.getElementById('level-grid');
    const noRes = document.getElementById('no-results');
    const countLabel = document.getElementById('results-count');
    const sectionTitle = document.getElementById('section-title');

    if (visibleCount === 0) {
        grid.classList.add('hidden');
        noRes.classList.remove('hidden');
    } else {
        grid.classList.remove('hidden');
        noRes.classList.add('hidden');
    }

    const catNames = {
        'all': 'Full Journey',
        'elem': 'Elementary Path',
        'middle': 'Middle School Path',
        'high': 'High School Path',
        'extra': 'Extra Resources'
    };

    sectionTitle.textContent = catNames[currentCategory] || 'Academic Path';
    countLabel.textContent = `${visibleCount} levels available`;
}

function resetFilters() {
    document.getElementById('level-search').value = '';
    setCategory(null, 'all');
}

// --- UTILS ---

function debounce(func, wait) {
    let timeout;
    return function (...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}

function checkStreak() {
    const lastVisit = localStorage.getItem('hl_last_visit');
    const streakCount = parseInt(localStorage.getItem('hl_streak') || '0');
    const today = new Date().toDateString();
    const el = document.getElementById('streak-stat');

    if (!el) return;

    if (lastVisit === today) {
        el.textContent = streakCount;
    } else if (lastVisit) {
        const yesterday = new Date();
        yesterday.setDate(yesterday.getDate() - 1);
        if (lastVisit === yesterday.toDateString()) {
            const newStreak = streakCount + 1;
            localStorage.setItem('hl_streak', newStreak);
            el.textContent = newStreak;
            localStorage.setItem('hl_last_visit', today);
        } else {
            localStorage.setItem('hl_streak', 1);
            el.textContent = 1;
            localStorage.setItem('hl_last_visit', today);
        }
    } else {
        localStorage.setItem('hl_streak', 1);
        el.textContent = 1;
        localStorage.setItem('hl_last_visit', today);
    }
}

function triggerConfettiBtn(btn) {
    // Simple confetti effect centered on button
    const rect = btn.getBoundingClientRect();
    const x = (rect.left + rect.width / 2) / window.innerWidth;
    const y = (rect.top + rect.height / 2) / window.innerHeight;

    if (typeof triggerConfetti === 'function') {
        triggerConfetti({ x, y });
    }
}

function checkResumeLearning() {
    const banner = document.getElementById('resume-banner');
    if (!banner) return;

    const allCards = Array.from(document.querySelectorAll('.level-card'));
    const nextLevelCard = allCards.find(c => !completedLevels.includes(c.dataset.id));

    if (nextLevelCard && completedLevels.length > 0) {
        const levelName = nextLevelCard.querySelector('h3').textContent.trim();
        document.getElementById('next-level-name').textContent = levelName;

        const link = nextLevelCard.querySelector('a').href;
        const clickArea = document.getElementById('resume-click-area');
        if (clickArea) clickArea.onclick = () => window.location.href = link;

        banner.classList.remove('hidden');
        banner.classList.add('animate-reveal');
    } else {
        banner.classList.add('hidden');
    }
}

function updateHeroGreeting() {
    const hour = new Date().getHours();
    const el = document.getElementById('hero-dynamic-greeting');
    if (!el) return;

    let greeting = "THE LEARNING ODYSSEY";
    if (hour < 12) greeting = "Good Morning Odyssey";
    else if (hour < 18) greeting = "Good Afternoon Journey";
    else greeting = "Good Evening Odyssey";

    el.textContent = greeting.toUpperCase();
}

function syncSearch(val) {
    const mainSearch = document.getElementById('level-search');
    if (mainSearch) {
        mainSearch.value = val;
        applyFilters();
    }
}

function speakCard(btn, title, desc) {
    if ('speechSynthesis' in window) {
        if (window.speechSynthesis.speaking) {
            window.speechSynthesis.cancel();
        }
        const utterance = new SpeechSynthesisUtterance(title + ". " + desc);
        window.speechSynthesis.speak(utterance);
    }
}
