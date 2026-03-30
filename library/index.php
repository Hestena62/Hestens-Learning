<?php
// --- Page-Specific Variables ---
$pageTitle = 'Hesten\'s Learning Library';
$pageDescription = 'Browse your personal collection of digital books in a Netflix-style interface.';
$pageKeywords = 'library, books, epub, pdf, digital library, collection, education, textbooks';
$pageAuthor = 'Hesten\'s Learning';
$welcomeMessage = "Welcome to Hesten's Learning Library";
$welcomeParagraph = "Explore our vast collection of fiction classics and comprehensive educational resources for all grade levels.";

// --- Book Data Array ---
$jsonString = file_get_contents(__DIR__ . '/bookd.json');
$categories = json_decode($jsonString, true);
if (!$categories) {
    $categories = []; // Fallback in case of JSON error
}

// Include Global Header (Root)
include '../src/header.php';
?>

<!-- AURORA MESH BACKGROUND -->
<div class="fixed inset-0 overflow-hidden pointer-events-none noise-grain -z-10 bg-white dark:bg-gray-950 transition-colors duration-500">
    <div class="absolute -top-[20%] -left-[10%] w-[70vw] h-[70vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 will-change-transform bg-indigo-200 dark:bg-indigo-900/40"></div>
    <div class="absolute top-[20%] -right-[10%] w-[60vw] h-[60vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 style='animation-delay: -2s;' will-change-transform bg-purple-200 dark:bg-purple-900/40"></div>
    <div class="absolute -bottom-[20%] left-[20%] w-[50vw] h-[50vw] rounded-full mix-blend-multiply dark:mix-blend-overlay filter blur-[80px] opacity-40 style='animation-delay: -4s;' will-change-transform bg-emerald-200 dark:bg-teal-900/40"></div>
</div>

<main id="main-content" class="min-h-screen relative z-10 font-sans pb-20">

    <!-- Hero Section -->
    <section class="relative pt-32 pb-12 text-center px-4 flex flex-col items-center">
        <div class="animate-reveal">
            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-3 rounded-full bg-white/60 dark:bg-black/20 backdrop-blur-xl px-5 py-2 text-xs font-bold text-gray-800 dark:text-gray-200 mb-10 border border-black/5 dark:border-white/10 shadow-[0_8px_32px_rgba(0,0,0,0.04)] justify-center max-w-fit mx-auto">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-500 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
                </span>
                <span class="tracking-[0.2em] uppercase"><i class="fas fa-book-reader mr-2"></i> DIGITAL ARCHIVE</span>
            </div>

            <h1 class="text-6xl md:text-8xl lg:text-[7.5rem] font-black tracking-tighter text-gray-900 dark:text-white mb-8 font-outfit leading-[0.95]">
                The
                <span class="text-transparent bg-clip-text bg-gradient-to-br from-indigo-500 via-purple-500 to-emerald-400">Library</span>
            </h1>
            <p class="mt-6 text-xl md:text-2xl leading-relaxed text-gray-600 dark:text-gray-300/80 max-w-2xl mx-auto mb-14 font-medium backdrop-blur-sm">
                <?php echo $welcomeParagraph; ?>
            </p>
        </div>

        <!-- Real-time Search and Filters -->
        <div class="mt-8 max-w-4xl mx-auto w-full flex flex-col md:flex-row items-center gap-4 relative group animate-reveal" style="animation-delay: 0.1s;">
            <!-- Redesigned Search bar -->
            <div class="relative w-full md:w-2/3 group">
                <input type="text" id="library-search" aria-label="Search Library" placeholder="Search title, author, or ISBN..."
                    class="w-full pl-12 pr-12 py-4 rounded-2xl border border-gray-200 dark:border-white/10 bg-white/60 dark:bg-black/40 backdrop-blur-2xl text-gray-900 dark:text-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 transition-all font-semibold placeholder-gray-500 dark:placeholder-gray-400 text-lg shadow-[0_8px_32px_rgba(0,0,0,0.04)] hover:bg-white/80 dark:hover:bg-white/10 glass-shine focus:outline-none">
                <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-indigo-500 transition-colors pointer-events-none text-lg"></i>
            </div>
            
            <div class="w-full md:w-1/3 flex gap-2 h-full relative">
                 <select id="category-filter" aria-label="Select Category"
                    class="appearance-none w-full h-full min-h-[56px] bg-white/60 dark:bg-black/40 backdrop-blur-2xl border border-gray-200 dark:border-white/10 rounded-2xl py-3 px-4 pr-10 text-gray-900 dark:text-white font-bold focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-[0_8px_32px_rgba(0,0,0,0.04)] hover:bg-white/80 dark:hover:bg-white/10 glass-shine transition-all cursor-pointer">
                    <option value="all">All Categories</option>
                    <?php foreach (array_keys($categories) as $cat)
                        echo '<option value="' . htmlspecialchars($cat) . '">' . htmlspecialchars($cat) . '</option>'; ?>
                </select>
                <i class="fas fa-filter absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>
        </div>
    </section>

    <!-- Library Content -->
    <div class="container mx-auto px-4 md:px-8 space-y-20">

        <?php foreach ($categories as $categoryName => $books): ?>
            <section class="library-category animate-reveal">
                <!-- Category Header -->
                <div class="flex items-center gap-4 mb-8">
                    <h2 class="text-3xl font-black text-gray-900 dark:text-white font-outfit tracking-tight">
                        <?php echo htmlspecialchars($categoryName); ?>
                    </h2>
                    <div class="h-px bg-gray-200 dark:bg-white/10 flex-grow rounded-full"></div>
                    <div class="flex gap-2 shrink-0">
                        <button class="scroll-btn left w-10 h-10 rounded-xl bg-gray-50 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-white/10 flex items-center justify-center transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 shadow-sm border border-gray-200 dark:border-white/5" aria-label="Scroll left">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="scroll-btn right w-10 h-10 rounded-xl bg-gray-50 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-white/10 flex items-center justify-center transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 shadow-sm border border-gray-200 dark:border-white/5" aria-label="Scroll right">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Horizontal Scroll Container -->
                <div class="flex overflow-x-auto gap-8 pb-8 pt-2 scrollbar-none snap-x book-container px-2">
                    <?php foreach ($books as $book): ?>
                        <!-- Book Card based on new design specs -->
                        <div class="book-card flex-shrink-0 w-48 md:w-56 snap-start group cursor-pointer relative flex flex-col h-full"
                            onclick="openModal(this)" data-title="<?php echo htmlspecialchars($book['title']); ?>"
                            data-author="<?php echo htmlspecialchars($book['author']); ?>"
                            data-isbn="<?php echo htmlspecialchars($book['isbn']); ?>"
                            data-date="<?php echo htmlspecialchars($book['date']); ?>"
                            data-img="<?php echo htmlspecialchars($book['img']); ?>"
                            data-description="<?php echo htmlspecialchars($book['description']); ?>"
                            data-pdf-link="<?php echo htmlspecialchars($book['pdf-link']); ?>"
                            data-epub-link="<?php echo htmlspecialchars($book['epub-link']); ?>"
                            data-read-online-link="<?php echo htmlspecialchars($book['read-online-link'] ?? '#'); ?>"
                            data-txt-link="<?php echo htmlspecialchars($book['txt-link'] ?? '#'); ?>"
                            data-mobi-link="<?php echo htmlspecialchars($book['mobi-link'] ?? '#'); ?>"
                            data-word-link="<?php echo htmlspecialchars($book['word-link'] ?? '#'); ?>"
                            data-lexile="<?php echo htmlspecialchars($book['lexile'] ?? ''); ?>">

                            <!-- Cover Image Wrapper with hover lifting action -->
                            <div class="relative aspect-[2/3] rounded-2xl overflow-hidden shadow-lg border border-gray-200 dark:border-white/10 transition-all duration-300 group-hover:shadow-xl group-hover:shadow-indigo-500/20 group-hover:-translate-y-2 will-animate bg-gray-100 dark:bg-gray-800">
                                <img src="<?php echo htmlspecialchars($book['img']); ?>"
                                    alt="<?php echo htmlspecialchars($book['title']); ?>" class="w-full h-full object-cover relative z-10 transition-transform duration-500 group-hover:scale-105"
                                    loading="lazy"
                                    onerror="this.onerror=null; this.src='<?php echo isset($book['fallback-img']) ? htmlspecialchars($book['fallback-img']) : 'https://placehold.co/300x450/6b7280/white?text=Image+Not+Found'; ?>';">

                                <!-- Hover Overlay Info -->
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-5 z-20">
                                    <span class="text-white text-[10px] font-bold uppercase tracking-widest mb-1 flex items-center gap-1.5"><i class="fas fa-book-open text-indigo-400"></i> View Details</span>
                                </div>
                            </div>

                            <!-- Info (Below Card) -->
                            <div class="mt-5 text-center px-1 flex-grow flex flex-col">
                                <h3 class="text-gray-900 dark:text-white font-black text-lg font-outfit leading-tight line-clamp-2 book-title group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                    <?php echo htmlspecialchars($book['title']); ?>
                                </h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1.5 font-medium book-author truncate">
                                    <?php echo htmlspecialchars($book['author']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <!-- No Results Message -->
        <div id="no-results" class="hidden text-center py-24 px-4 bg-white/50 dark:bg-gray-900/50 backdrop-blur-md rounded-3xl border border-dashed border-gray-300 dark:border-gray-700 mx-auto max-w-4xl will-animate">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gray-100 dark:bg-gray-800/50 mb-8 text-indigo-500/50 shadow-inner relative">
                <i class="fas fa-search text-5xl"></i>
                <div class="absolute inset-0 bg-indigo-500/10 rounded-full animate-ping opacity-20" style="animation-duration: 3s;"></div>
            </div>
            <h3 class="text-2xl font-black text-gray-900 dark:text-white mb-2 font-outfit tracking-tight">No books found</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">We couldn't find anything matching your search criteria.</p>
        </div>

    </div>

</main>

<!-- Book Modal (Refined as Knowledge Portal) -->
<div id="bookModal"
    class="fixed inset-0 z-[100] hidden opacity-0 transition-all duration-500 flex items-center justify-center p-4 sm:p-6 sm:pb-12 pointer-events-none"
    role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-gray-900/40 dark:bg-black/60 backdrop-blur-sm transition-opacity cursor-pointer pointer-events-auto" onclick="closeModal()"></div>

    <!-- Modal Content -->
    <div class="bg-white dark:bg-[#0a0a0a] rounded-3xl relative w-full max-w-4xl max-h-[90vh] overflow-y-auto transform scale-95 opacity-0 transition-all duration-500 book-modal-content pointer-events-auto flex flex-col border border-gray-200 dark:border-white/10 shadow-2xl custom-modal-scrollbar"
        onclick="event.stopPropagation()">

        <!-- Close Button Top -->
        <button onclick="closeModal()" id="book-modal-close"
            class="absolute top-6 right-6 z-50 w-10 h-10 md:w-12 md:h-12 rounded-xl bg-gray-100 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-white/10 flex items-center justify-center transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 shadow-sm backdrop-blur-md">
            <i class="fas fa-times text-lg"></i>
        </button>

        <div class="flex flex-col md:flex-row h-full">
            <!-- Book Cover Side -->
            <div class="w-full md:w-5/12 relative h-72 md:h-auto shrink-0 bg-gray-100 dark:bg-gray-900 flex items-center justify-center p-8 md:p-12 border-b md:border-b-0 md:border-r border-gray-200 dark:border-white/5">
                <!-- Subtle background glow -->
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 via-transparent to-transparent pointer-events-none blur-2xl"></div>
                <img id="modal-img" src="" alt="Book Cover" class="w-full max-h-full object-contain rounded-xl shadow-2xl relative z-10 transition-transform hover:scale-105 duration-500">
            </div>

            <!-- Details Side -->
            <div class="w-full md:w-7/12 p-8 md:p-10 flex flex-col relative z-20 bg-gray-50/50 dark:bg-transparent">
                <!-- Titles -->
                <div class="mb-8">
                    <div class="flex items-center gap-2 mb-3">
                         <span class="w-8 h-1 bg-indigo-500 rounded-full opacity-70"></span>
                         <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">Library Access</span>
                    </div>
                    <h2 id="modal-title" class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white font-outfit mb-2 leading-tight tracking-tight"></h2>
                    <p id="modal-author" class="text-xl text-indigo-600 dark:text-indigo-400 font-bold"></p>
                </div>

                <!-- Specs Grid -->
                <div class="grid grid-cols-2 gap-4 mb-8 p-6 bg-white dark:bg-white/5 rounded-2xl border border-gray-200 dark:border-white/10 shadow-sm dark:shadow-none relative overflow-hidden group">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-500/5 rounded-full blur-xl group-hover:bg-indigo-500/10 transition-colors pointer-events-none"></div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest opacity-50 mb-1 font-bold text-gray-500 dark:text-gray-400">Published</span>
                        <span id="modal-date" class="text-gray-900 dark:text-gray-200 font-mono text-sm font-semibold"></span>
                    </div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest opacity-50 mb-1 font-bold text-gray-500 dark:text-gray-400">ISBN</span>
                        <span id="modal-isbn" class="text-gray-900 dark:text-gray-200 font-mono text-sm font-semibold break-all"></span>
                    </div>
                    <div id="modal-lexile-container" class="col-span-2 pt-4 mt-2 border-t border-gray-100 dark:border-white/5">
                        <span class="block text-[10px] uppercase tracking-widest opacity-50 mb-1 font-bold text-gray-500 dark:text-gray-400">Lexile / Reading Level</span>
                        <span id="modal-lexile" class="text-emerald-600 dark:text-emerald-400 font-black text-lg"></span>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <p id="modal-description" class="text-base md:text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-medium"></p>
                </div>

                <!-- Action Buttons Area -->
                <div class="mt-auto pt-6 border-t border-gray-200 dark:border-white/10 flex flex-col gap-5">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a id="modal-read-online-link" href="#" target="_blank" rel="noopener noreferrer"
                            class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white py-3.5 px-6 rounded-xl font-bold text-center shadow-lg shadow-indigo-500/25 transition-all transform hover:-translate-y-0.5 active:scale-95 flex items-center justify-center gap-3 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                            <i class="fas fa-book-open"></i> <span>Read Online</span>
                        </a>

                        <div class="flex gap-2 justify-center sm:justify-start">
                             <a id="modal-pdf-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="bg-gray-100 dark:bg-white/5 hover:bg-rose-50 dark:hover:bg-rose-500/10 text-gray-700 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-400 p-3.5 rounded-xl border border-gray-200 dark:border-white/10 transition-colors tooltip-btn focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-rose-500 shadow-sm"
                                title="Download PDF" aria-label="Download PDF">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <a id="modal-epub-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="bg-gray-100 dark:bg-white/5 hover:bg-blue-50 dark:hover:bg-blue-500/10 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 p-3.5 rounded-xl border border-gray-200 dark:border-white/10 transition-colors tooltip-btn focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 shadow-sm"
                                title="Download ePUB" aria-label="Download ePUB">
                                <i class="fas fa-book"></i>
                            </a>
                            <a id="modal-mobi-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="bg-gray-100 dark:bg-white/5 hover:bg-amber-50 dark:hover:bg-amber-500/10 text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400 p-3.5 rounded-xl border border-gray-200 dark:border-white/10 transition-colors tooltip-btn focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 shadow-sm"
                                title="Download MOBI" aria-label="Download MOBI">
                                <i class="fas fa-tablet-alt"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Disclaimer Button -->
                    <div class="flex">
                        <button onclick="openDisclaimerModal()"
                            class="text-[11px] font-bold uppercase tracking-widest text-gray-400 hover:text-amber-500 transition-colors flex items-center gap-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 rounded p-1">
                            <i class="fas fa-exclamation-circle text-amber-500/80"></i> Content Disclaimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Disclaimer Modal -->
<div id="disclaimerModal"
    class="fixed inset-0 z-[110] flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300 pointer-events-none"
    role="alertdialog" aria-modal="true" onclick="closeDisclaimerModal()">
    <div class="absolute inset-0 bg-gray-900/60 dark:bg-black/70 backdrop-blur-sm pointer-events-auto"></div>
    <div class="bg-white dark:bg-[#0a0a0a] border border-gray-200 dark:border-white/10 rounded-3xl shadow-2xl w-full max-w-md p-8 m-4 relative pointer-events-auto z-10 transform scale-95 transition-transform duration-300 disclaimer-modal-content"
        onclick="event.stopPropagation()">

        <button onclick="closeDisclaimerModal()" id="disclaimer-modal-close"
            class="absolute top-5 right-5 z-10 w-10 h-10 rounded-xl bg-gray-100 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-white/10 hover:text-gray-900 dark:hover:text-white transition-colors flex items-center justify-center border border-transparent shadow-sm">
            <i class="fas fa-times"></i>
        </button>

        <div class="text-center mb-6 mt-2">
            <div class="w-20 h-20 bg-amber-50 dark:bg-amber-500/10 rounded-full flex items-center justify-center mx-auto mb-4 border border-amber-100 dark:border-amber-500/30">
                 <i class="fas fa-exclamation-triangle text-3xl text-amber-500"></i>
            </div>
            <h3 class="text-3xl font-black font-outfit text-gray-900 dark:text-white tracking-tight">Disclaimer</h3>
        </div>
        <div class="bg-gray-50 dark:bg-white/5 p-6 rounded-2xl border border-gray-100 dark:border-white/5 mb-8">
            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed font-medium">
                 The books and materials in this digital library are provided for educational and informational purposes
                 only. Hesten's Learning makes no claims of ownership over third-party content. Please ensure your use of
                 these materials complies with applicable copyright laws before downloading.
            </p>
        </div>
        <div class="flex justify-center">
            <button onclick="closeDisclaimerModal()"
                class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 py-3.5 px-8 rounded-xl font-bold shadow-lg hover:-translate-y-1 transition-all active:scale-95 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-400">
                I Understand
            </button>
        </div>
    </div>
</div>

<script>
    // --- Live Search & Filter Logic ---
    const searchInput = document.getElementById('library-search');
    const categoryFilter = document.getElementById('category-filter');
    const categoriesContainers = document.querySelectorAll('.library-category');
    const noResults = document.getElementById('no-results');

    function filterBooks() {
        const term = searchInput.value.toLowerCase();
        const selectedCat = categoryFilter.value;
        let totalVisible = 0;

        categoriesContainers.forEach(categoryContainer => {
            const catNameElement = categoryContainer.querySelector('h2');
            if(!catNameElement) return;
            const catName = catNameElement.textContent.trim();
            const books = Array.from(categoryContainer.querySelectorAll('.book-card'));

            let categoryHasVisible = false;

            books.forEach(book => {
                const title = book.dataset.title.toLowerCase();
                const author = book.dataset.author.toLowerCase();
                const isbn = book.dataset.isbn.toLowerCase();

                const matchesSearch = title.includes(term) || author.includes(term) || isbn.includes(term);
                const matchesCategory = selectedCat === 'all' || selectedCat === catName;

                if (matchesSearch && matchesCategory) {
                     book.classList.remove('hidden');
                     book.style.display = 'flex';
                     categoryHasVisible = true;
                     totalVisible++;
                } else {
                     book.classList.add('hidden');
                     book.style.display = 'none';
                }
            });

            // Hide the entire row if empty or if filtered out by category dropdown
            if (categoryHasVisible && (selectedCat === 'all' || selectedCat === catName)) {
                categoryContainer.classList.remove('hidden');
            } else {
                categoryContainer.classList.add('hidden');
            }
        });

        if (totalVisible === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }

    // Debounce wrapper
    let timeout = null;
    if (searchInput) {
        searchInput.addEventListener('input', () => {
            clearTimeout(timeout);
            timeout = setTimeout(filterBooks, 300);
        });
    }
    
    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterBooks);
    }

    // --- Horizontal Scroll Logic ---
    document.querySelectorAll('.library-category').forEach(category => {
        const container = category.querySelector('.book-container');
        const leftBtn = category.querySelector('.scroll-btn.left');
        const rightBtn = category.querySelector('.scroll-btn.right');

        if (leftBtn && rightBtn && container) {
            const scrollAmount = Math.max(container.clientWidth * 0.7, 300); // Dynamic responsive scroll
            leftBtn.addEventListener('click', () => {
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });
            rightBtn.addEventListener('click', () => {
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        }
    });

    // --- Modal Logic ---
    const modal = document.getElementById('bookModal');
    const modalContent = modal ? modal.querySelector('.book-modal-content') : null;
    const modalTitle = document.getElementById('modal-title');
    const modalAuthor = document.getElementById('modal-author');
    const modalDescription = document.getElementById('modal-description');
    const modalIsbn = document.getElementById('modal-isbn');
    const modalDate = document.getElementById('modal-date');
    const modalImg = document.getElementById('modal-img');
    const modalReadOnlineLink = document.getElementById('modal-read-online-link');
    const modalPdfLink = document.getElementById('modal-pdf-link');
    const modalEpubLink = document.getElementById('modal-epub-link');
    const modalMobiLink = document.getElementById('modal-mobi-link');
    const modalLexile = document.getElementById('modal-lexile');
    const modalLexileContainer = document.getElementById('modal-lexile-container');

    window.openModal = function (element) {
        const data = element.dataset;

        modalTitle.textContent = data.title;
        modalAuthor.textContent = data.author;
        modalDescription.textContent = data.description;
        modalIsbn.textContent = data.isbn;
        modalDate.textContent = data.date;
        modalImg.src = data.img;

        // Links
        setupLink(modalReadOnlineLink, data.readOnlineLink);
        setupLink(modalPdfLink, data.pdfLink);
        setupLink(modalEpubLink, data.epubLink);
        setupLink(modalMobiLink, data.mobiLink);

        // Lexile
        if (data.lexile) {
            modalLexile.textContent = data.lexile;
            modalLexileContainer.style.display = 'block';
        } else {
            modalLexileContainer.style.display = 'none';
        }

        // Open animation
        modal.classList.remove('hidden');
        void modal.offsetWidth; // Trigger reflow
        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100');
        if (modalContent) {
           modalContent.classList.remove('scale-95', 'opacity-0');
           modalContent.classList.add('scale-100', 'opacity-100');
        }
        document.body.style.overflow = 'hidden'; // Prevents background scroll
        
        setTimeout(() => {
            const closeBtn = document.getElementById('book-modal-close');
            if (closeBtn) closeBtn.focus();
        }, 100);
    }

    function setupLink(el, url) {
        if (!el) return;
        if (!url || url === '#') {
            el.classList.add('opacity-40', 'pointer-events-none', 'grayscale', 'cursor-not-allowed');
            el.href = '#';
            el.removeAttribute('target');
            el.removeAttribute('rel');
        } else {
            el.classList.remove('opacity-40', 'pointer-events-none', 'grayscale', 'cursor-not-allowed');
            el.href = url;
            el.target = '_blank'; // From the target="_blank" book links conversation!
            el.rel = 'noopener noreferrer';
        }
    }

    window.closeModal = function () {
        if (!modal) return;
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        if (modalContent) {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
        }
        
        setTimeout(() => {
            modal.classList.add('hidden', 'pointer-events-none');
            document.body.style.overflow = '';
        }, 300);
    }

    window.openDisclaimerModal = function () {
        const dModal = document.getElementById('disclaimerModal');
        const dContent = dModal.querySelector('.disclaimer-modal-content');
        if(!dModal) return;
        
        dModal.classList.remove('hidden');
        void dModal.offsetWidth;
        dModal.classList.remove('opacity-0', 'pointer-events-none');
        dModal.classList.add('opacity-100');
        
        if (dContent){
            dContent.classList.remove('scale-95');
            dContent.classList.add('scale-100');
        }
    }

    window.closeDisclaimerModal = function () {
        const dModal = document.getElementById('disclaimerModal');
        const dContent = dModal.querySelector('.disclaimer-modal-content');
        if(!dModal) return;
        
        dModal.classList.remove('opacity-100');
        dModal.classList.add('opacity-0');
        
        if(dContent) {
             dContent.classList.remove('scale-100');
             dContent.classList.add('scale-95');
        }
        
        setTimeout(() => dModal.classList.add('hidden', 'pointer-events-none'), 300);
    }

    // Close on Escape & Initial setup
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const disclaimerModal = document.getElementById('disclaimerModal');
            if (disclaimerModal && !disclaimerModal.classList.contains('hidden')) {
                closeDisclaimerModal();
            } else {
                closeModal();
            }
        }
    });

    // Run custom setup on boot
    document.addEventListener("DOMContentLoaded", () => {
         // Fix CSS missing custom utilities
         const style = document.createElement('style');
         style.textContent = `
             .scrollbar-none::-webkit-scrollbar { display: none; }
             .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
             .custom-modal-scrollbar::-webkit-scrollbar { width: 8px; border-radius: 9999px; }
             .custom-modal-scrollbar::-webkit-scrollbar-track { background: transparent; }
             .custom-modal-scrollbar::-webkit-scrollbar-thumb { background: rgba(156, 163, 175, 0.4); border-radius: 9999px; }
             .dark .custom-modal-scrollbar::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.2); }
             .custom-modal-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(156, 163, 175, 0.8); }
             .dark .custom-modal-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.4); }
         `;
         document.head.appendChild(style);
         
         // Trigger reveal animations
         const revealObserver = new IntersectionObserver((entries) => {
             entries.forEach(entry => {
                 if (entry.isIntersecting) {
                     entry.target.classList.add('animate-reveal');
                     revealObserver.unobserve(entry.target);
                 }
             });
         }, { threshold: 0.1 });

         document.querySelectorAll('.will-animate').forEach(el => {
             revealObserver.observe(el);
         });
    });
</script>

<?php include '../src/footer.php'; ?>