<?php
// --- Page-Specific Variables ---
$pageTitle = 'Hesten\'s Learning Library';
$pageDescription = 'Browse your personal collection of digital books in a Netflix-style interface.';
$pageKeywords = 'library, books, epub, pdf, digital library, collection, education, textbooks';
$pageAuthor = 'Hesten\'s Learning';

// --- Book Data Array ---
$jsonString = file_get_contents(__DIR__ . '/bookd.json');
$categories = json_decode($jsonString, true);
if (!$categories) {
    $categories = []; // Fallback in case of JSON error
}

// Include Global Header (Root)
include '../src/header.php';
?>

<!-- HERO BACKGROUND -->
<!-- We remove the fixed hardcoded dark background so the body background from styles.css shows through. 
     We can add a subtle decorative layer that respects the theme. -->
<div class="fixed inset-0 -z-10 bg-gradient-to-br from-primary/10 via-secondary/10 to-accent/10 pointer-events-none">
    <div
        class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 animate-pulse">
    </div>
</div>

<main id="main-content" class="min-h-screen relative z-10 font-sans pb-20">

    <!-- Hero Section -->
    <section class="relative pt-32 pb-12 text-center px-4">
        <div class="animate-fade-in-up">
            <div
                class="inline-flex items-center justify-center w-20 h-20 rounded-3xl bg-content-bg mb-6 border shadow-xl text-primary">
                <i class="fas fa-book-reader text-4xl"></i>
            </div>
            <h1 class="text-5xl md:text-6xl font-black text-text-default mb-6 tracking-tight drop-shadow-md">
                The <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Library</span>
            </h1>
            <p class="text-xl text-text-secondary max-w-2xl mx-auto leading-relaxed">
                <?php echo $welcomeParagraph; ?>
            </p>
        </div>

        <!-- Real-time Search and Filters -->
        <div class="mt-12 max-w-4xl mx-auto flex flex-col md:flex-row gap-4 relative group animate-fade-in-up"
            style="animation-delay: 0.1s;">
            <div
                class="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-xl opacity-20 blur-lg transition duration-300">
            </div>

            <div class="relative flex-grow flex items-center bg-content-bg border rounded-xl p-2 shadow-xl">
                <i class="fas fa-search text-text-secondary ml-4 text-lg"></i>
                <input type="text" id="library-search" placeholder="Search title, author, or ISBN..."
                    class="w-full bg-transparent border-none text-text-default placeholder-text-secondary px-4 py-3 focus:ring-0 focus:outline-none text-lg">
            </div>

            <div class="relative flex gap-2">
                <select id="category-filter"
                    class="bg-content-bg border text-text-default rounded-xl px-4 py-3 shadow-xl focus:outline-none focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                    <option value="all">All Categories</option>
                    <?php foreach (array_keys($categories) as $cat)
                        echo '<option value="' . htmlspecialchars($cat) . '">' . htmlspecialchars($cat) . '</option>'; ?>
                </select>
                <select id="sort-filter"
                    class="bg-content-bg border text-text-default rounded-xl px-4 py-3 shadow-xl focus:outline-none focus:ring-2 focus:ring-primary appearance-none cursor-pointer">
                    <option value="default">Default Order</option>
                    <option value="title-asc">Title (A-Z)</option>
                    <option value="author-asc">Author (A-Z)</option>
                </select>
            </div>
        </div>
    </section>

    <!-- Library Content -->
    <div class="container mx-auto px-4 md:px-8 space-y-16">

        <?php foreach ($categories as $categoryName => $books): ?>
            <section class="library-category animate-fade-in-up">
                <div class="flex items-center gap-4 mb-8">
                    <h2 class="text-2xl font-bold text-text-default border-l-4 border-primary pl-4">
                        <?php echo htmlspecialchars($categoryName); ?>
                    </h2>
                    <div class="h-px bg-text-secondary/20 flex-grow"></div>
                    <div class="flex gap-2">
                        <button
                            class="scroll-btn left rounded-full w-8 h-8 flex items-center justify-center bg-content-bg border hover:bg-primary hover:text-white transition-colors text-text-secondary shadow-sm"
                            aria-label="Scroll left">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="scroll-btn right rounded-full w-8 h-8 flex items-center justify-center bg-content-bg border hover:bg-primary hover:text-white transition-colors text-text-secondary shadow-sm"
                            aria-label="Scroll right">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Horizontal Scroll Container -->
                <div class="flex overflow-x-auto gap-6 pb-8 pt-2 scrollbar-hide snap-x book-container">
                    <?php foreach ($books as $book): ?>
                        <!-- Book Card -->
                        <div class="book-card flex-shrink-0 w-48 md:w-56 snap-start group cursor-pointer relative"
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

                            <!-- Cover Image Wrapper -->
                            <div
                                class="relative aspect-[2/3] rounded-xl overflow-hidden shadow-lg transition-transform duration-300 group-hover:scale-105 group-hover:-translate-y-2 border">
                                <img src="<?php echo htmlspecialchars($book['img']); ?>"
                                    alt="<?php echo htmlspecialchars($book['title']); ?>" class="w-full h-full object-cover"
                                    loading="lazy"
                                    onerror="this.onerror=null; this.src='<?php echo isset($book['fallback-img']) ? htmlspecialchars($book['fallback-img']) : 'https://placehold.co/300x450/6b7280/white?text=Image+Not+Found'; ?>';">

                                <!-- Hover Overlay -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                    <span class="text-white text-xs font-bold uppercase tracking-wider mb-1"><i
                                            class="fas fa-book-open mr-1"></i> View Details</span>
                                </div>
                            </div>

                            <!-- Info (Below Card) -->
                            <div class="mt-4 text-center">
                                <h3 class="text-text-default font-bold text-lg leading-tight truncate px-1 book-title">
                                    <?php echo htmlspecialchars($book['title']); ?>
                                </h3>
                                <p class="text-text-secondary text-sm mt-1 book-author">
                                    <?php echo htmlspecialchars($book['author']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>

        <!-- No Results Message -->
        <div id="no-results" class="hidden text-center py-20">
            <i class="fas fa-search mb-4 text-4xl text-text-secondary/50"></i>
            <h3 class="text-xl font-bold text-text-secondary">No books found matching your search.</h3>
        </div>

    </div>

</main>

<!-- Book Modal -->
<div id="bookModal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300"
    role="dialog" aria-modal="true" aria-labelledby="modal-title" onclick="closeModal()">
    <div class="bg-content-bg border rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto m-4 relative flex flex-col md:flex-row overflow-hidden"
        onclick="event.stopPropagation()">

        <!-- Close Button -->
        <button onclick="closeModal()" id="book-modal-close"
            class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-base-bg text-text-default hover:bg-primary hover:text-white transition-colors flex items-center justify-center border shadow-sm">
            <i class="fas fa-times"></i>
        </button>

        <!-- Book Cover Side -->
        <div class="w-full md:w-1/3 relative h-64 md:h-auto">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50 z-10"></div>
            <img id="modal-img" src="" alt="Book Cover" class="w-full h-full object-cover">
        </div>

        <!-- Details Side -->
        <div class="w-full md:w-2/3 p-8 md:p-10 flex flex-col">
            <div class="mb-6">
                <h2 id="modal-title" class="text-3xl md:text-4xl font-black text-text-default mb-2 leading-tight"></h2>
                <p id="modal-author" class="text-xl text-primary font-medium"></p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6 text-sm text-text-secondary bg-base-bg p-4 rounded-xl border">
                <div>
                    <span class="block text-xs uppercase tracking-wider opacity-50 mb-1">Published</span>
                    <span id="modal-date" class="text-text-default font-mono"></span>
                </div>
                <div>
                    <span class="block text-xs uppercase tracking-wider opacity-50 mb-1">ISBN</span>
                    <span id="modal-isbn" class="text-text-default font-mono"></span>
                </div>
                <div id="modal-lexile-container" class="col-span-2 border-t pt-3 mt-1">
                    <span class="block text-xs uppercase tracking-wider opacity-50 mb-1">Lexile / Reading Level</span>
                    <span id="modal-lexile" class="text-green-600 dark:text-green-400 font-bold"></span>
                </div>
            </div>

            <div class="flex-grow">
                <p id="modal-description" class="text-text-default leading-relaxed text-lg"></p>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 pt-6 border-t flex flex-col gap-4">
                <div class="flex flex-wrap gap-4">
                    <a id="modal-read-online-link" href="#"
                        class="flex-1 bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 text-white py-3 px-6 rounded-xl font-bold text-center shadow-lg transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <i class="fas fa-book-open"></i> Read Online
                    </a>

                    <div class="flex gap-2">
                        <a id="modal-pdf-link" href="#"
                            class="bg-base-bg hover:bg-primary/10 text-text-default p-3 rounded-xl border transition-colors tooltip-btn"
                            title="Download PDF">
                            <i class="fas fa-file-pdf text-red-500"></i>
                        </a>
                        <a id="modal-epub-link" href="#"
                            class="bg-base-bg hover:bg-primary/10 text-text-default p-3 rounded-xl border transition-colors tooltip-btn"
                            title="Download ePUB">
                            <i class="fas fa-book text-blue-500"></i>
                        </a>
                        <a id="modal-mobi-link" href="#"
                            class="bg-base-bg hover:bg-primary/10 text-text-default p-3 rounded-xl border transition-colors tooltip-btn"
                            title="Download MOBI">
                            <i class="fas fa-tablet-alt text-orange-500"></i>
                        </a>
                    </div>
                </div>

                <!-- Disclaimer Button -->
                <div class="flex self-start">
                    <button onclick="openDisclaimerModal()"
                        class="text-sm text-text-secondary hover:text-primary transition-colors flex items-center gap-1">
                        <i class="fas fa-exclamation-circle text-yellow-500"></i> View Disclaimer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Disclaimer Modal -->
<div id="disclaimerModal"
    class="fixed inset-0 z-[60] flex items-center justify-center bg-black/80 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300"
    role="alertdialog" aria-modal="true" onclick="closeDisclaimerModal()">
    <div class="bg-content-bg border rounded-2xl shadow-2xl w-full max-w-md p-6 m-4 relative"
        onclick="event.stopPropagation()">

        <button onclick="closeDisclaimerModal()" id="disclaimer-modal-close"
            class="absolute top-4 right-4 z-10 w-8 h-8 rounded-full bg-base-bg text-text-default hover:bg-primary hover:text-white transition-colors flex items-center justify-center border shadow-sm">
            <i class="fas fa-times"></i>
        </button>

        <div class="text-center mb-4">
            <i class="fas fa-exclamation-triangle text-4xl text-yellow-500 mb-2"></i>
            <h3 class="text-2xl font-bold text-text-default">Disclaimer</h3>
        </div>
        <p class="text-text-secondary text-sm leading-relaxed mb-6 text-center">
            The books and materials in this digital library are provided for educational and informational purposes
            only. Hesten's Learning makes no claims of ownership over third-party content. Please ensure your use of
            these materials complies with applicable copyright laws before downloading.
        </p>
        <div class="flex justify-center">
            <button onclick="closeDisclaimerModal()"
                class="bg-gradient-to-r from-primary to-secondary text-white py-2 px-6 rounded-xl font-bold shadow-lg hover:opacity-90 transition-opacity">
                I Understand
            </button>
        </div>
    </div>
</div>

<script>
    // --- Live Search & Filter Logic ---
    const searchInput = document.getElementById('library-search');
    const categoryFilter = document.getElementById('category-filter');
    const sortFilter = document.getElementById('sort-filter');
    const categoriesContainers = document.querySelectorAll('.library-category');
    const noResults = document.getElementById('no-results');

    function filterAndSortBooks() {
        const term = searchInput.value.toLowerCase();
        const selectedCat = categoryFilter.value;
        const sortBy = sortFilter.value;
        let totalVisible = 0;

        categoriesContainers.forEach(categoryContainer => {
            const catName = categoryContainer.querySelector('h2').textContent.trim();
            const bookContainer = categoryContainer.querySelector('.book-container');
            const books = Array.from(categoryContainer.querySelectorAll('.book-card'));

            // Sort books
            if (sortBy !== 'default') {
                books.sort((a, b) => {
                    if (sortBy === 'title-asc') {
                        return a.dataset.title.localeCompare(b.dataset.title);
                    } else if (sortBy === 'author-asc') {
                        return a.dataset.author.localeCompare(b.dataset.author);
                    }
                    return 0;
                });

                // Re-append to DOM for sorting
                books.forEach(book => bookContainer.appendChild(book));
            }

            let categoryHasVisible = false;

            books.forEach(book => {
                const title = book.dataset.title.toLowerCase();
                const author = book.dataset.author.toLowerCase();
                const isbn = book.dataset.isbn.toLowerCase();

                const matchesSearch = title.includes(term) || author.includes(term) || isbn.includes(term);
                const matchesCategory = selectedCat === 'all' || selectedCat === catName;

                if (matchesSearch && matchesCategory) {
                    book.style.display = 'block';
                    categoryHasVisible = true;
                    totalVisible++;
                } else {
                    book.style.display = 'none';
                }
            });

            // Hide the entire row if empty or if filtered out by category dropdown
            if (categoryHasVisible && (selectedCat === 'all' || selectedCat === catName)) {
                categoryContainer.style.display = 'block';
            } else {
                categoryContainer.style.display = 'none';
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
    searchInput.addEventListener('input', () => {
        clearTimeout(timeout);
        timeout = setTimeout(filterAndSortBooks, 300);
    });

    categoryFilter.addEventListener('change', filterAndSortBooks);
    sortFilter.addEventListener('change', filterAndSortBooks);

    // --- Horizontal Scroll Logic ---
    document.querySelectorAll('.library-category').forEach(category => {
        const container = category.querySelector('.book-container');
        const leftBtn = category.querySelector('.scroll-btn.left');
        const rightBtn = category.querySelector('.scroll-btn.right');

        if (leftBtn && rightBtn && container) {
            const scrollAmount = 400; // Scroll amount in px
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

        modal.classList.remove('hidden');
        // Small delay for fade in
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            const closeBtn = document.getElementById('book-modal-close');
            if (closeBtn) closeBtn.focus();
        }, 10);
    }

    function setupLink(el, url) {
        if (!url || url === '#') {
            el.classList.add('opacity-50', 'pointer-events-none', 'grayscale');
            el.href = '#';
        } else {
            el.classList.remove('opacity-50', 'pointer-events-none', 'grayscale');
            el.href = url;
        }
    }

    window.closeModal = function () {
        modal.classList.add('opacity-0');
        setTimeout(() => modal.classList.add('hidden'), 300);
    }

    window.openDisclaimerModal = function () {
        const disclaimerModal = document.getElementById('disclaimerModal');
        disclaimerModal.classList.remove('hidden');
        setTimeout(() => {
            disclaimerModal.classList.remove('opacity-0');
            const closeBtn = document.getElementById('disclaimer-modal-close');
            if (closeBtn) closeBtn.focus();
        }, 10);
    }

    window.closeDisclaimerModal = function () {
        const disclaimerModal = document.getElementById('disclaimerModal');
        disclaimerModal.classList.add('opacity-0');
        setTimeout(() => disclaimerModal.classList.add('hidden'), 300);
    }

    // Close on Escape
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
</script>

<?php include '../src/footer.php'; ?>