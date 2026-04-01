<?php
// --- SERVER-SIDE DATA & SEO (SINGLE SOURCE OF TRUTH) ---
// This is now the *only* place you need to add or edit blog posts.
// This single PHP array powers both the server-side meta tags
// AND the client-side JavaScript rendering.

require_once __DIR__ . '/data.php';

// --- DYNAMIC METADATA LOGIC ---
$pageTitle = "Hesten's Learning Blog";
$pageDescription = "A blog about personalized learning, technology, and education.";
$pageKeywords = "blog, education, learning, tailwind, php";
$pageAuthor = "Hesten Allison";
$pageOgImage = "/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png"; // Default OG image
$welcomeMessage = "Welcome to the Blog"; // Optional: For the popup
$welcomeParagraph = "Explore articles on learning, technology, and more."; // Optional: For the popup

if (isset($_GET['id'])) {
    $currentId = $_GET['id'];
    foreach ($blogData as $post) {
        if ($post['publicId'] === $currentId) {
            $pageTitle = $post['title'] . " | Hesten's Learning Blog";
            $pageDescription = $post['excerpt'];
            $pageAuthor = $post['author'];
            if (!empty($post['imageUrl'])) {
                $pageOgImage = $post['imageUrl'];
            }
            if (!empty($post['tags'])) {
                $pageKeywords .= ", " . implode(", ", $post['tags']);
            }
            break;
        }
    }
}

// IMPROVEMENT: Use __DIR__ for more robust include paths
// This ensures the path is correct regardless of where the script is run
@include __DIR__ . '/../src/header.php';
?>

<!--
  Blog Platform Main Content
  This single file handles both the blog list and single post views
  using client-side JavaScript and URL parameters.
-->
<main class="container mx-auto px-4 py-8 min-h-screen bg-base-bg text-text-default transition-colors duration-300">

  <!-- View: Blog Post List (Default View) -->
  <div id="blog-list-view">
    <header class="mb-12 text-center mt-8">
      <h1 class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary mb-6 tracking-tight drop-shadow-sm">Explore Our Insights</h1>
      <p class="text-xl md:text-2xl text-text-secondary max-w-2xl mx-auto leading-relaxed">Discover actionable articles, step-by-step tutorials, and deep thoughts on modern education and technology.</p>
    </header>

    <!-- Filters: Search, Category, and Tags -->
    <div
      class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 p-6 bg-content-bg shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
      <!-- Search Bar -->
      <div>
        <label for="search-input" class="block text-sm font-medium text-text-default mb-2">Search Posts</label>
        <div class="relative">
          <input type="search" id="search-input" placeholder="Search by title or keyword..."
            class="w-full pl-10 pr-4 py-2 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary text-text-default">
          <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-text-secondary" aria-hidden="true"></i>
        </div>
      </div>

      <!-- Category Filter -->
      <div>
        <label for="category-filter" class="block text-sm font-medium text-text-default mb-2">Filter by
          Category</label>
        <select id="category-filter"
          class="w-full py-2 px-3 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary text-text-default">
          <option value="all">All Categories</option>
          <!-- Categories will be dynamically populated by JS -->
        </select>
      </div>

      <!-- Tag Filter (Dropdown) -->
      <div>
        <label for="tag-filter" class="block text-sm font-medium text-text-default mb-2">Filter by Tag</label>
        <select id="tag-filter"
          class="w-full py-2 px-3 rounded-lg bg-base-bg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary text-text-default">
          <option value="all">All Tags</option>
          <!-- Tags will be dynamically populated by JS -->
        </select>
      </div>
    </div>

    <!-- Blog Post Grid -->
    <div id="blog-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Blog post cards will be injected here by JavaScript -->
    </div>

    <!-- Pagination Controls -->
    <div id="pagination-controls" class="flex justify-between items-center mt-12">
      <!-- Pagination buttons will be injected here -->
    </div>

    <!-- No results message (initially hidden) -->
    <div id="no-results"
      class="hidden text-center py-16 bg-content-bg rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
      <i class="fas fa-search text-5xl text-text-secondary mb-4"></i>
      <h3 class="text-2xl font-semibold text-text-default">No Posts Found</h3>
      <p class="text-text-secondary mt-2">Try adjusting your search or filters.</p>
    </div>
  </div>

  <!-- View: Single Blog Post (Initially Hidden) -->
  <div id="blog-post-view" class="hidden">
    <!-- Post content will be injected here by JavaScript -->
  </div>

</main>

<!--
  JavaScript for Blog Logic
  - Manages blog post data (now injected from PHP)
  - Handles routing between list/post views
  - Renders content dynamically
  - Powers search, filters, share, and citation features
-->
  <script>
  // --- BLOG POST DATA (Single Source of Truth) ---
  // IMPROVEMENT: This data is now passed directly from the $blogData PHP array.
  // To add/edit a post, you ONLY need to edit the $blogData array at the top of this file.
  const blogData = <?php echo json_encode($blogData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?>;

  // --- (DELETED) ---
  // The large hard-coded 'const blogData = [...]' array
  // that was here has been removed.

  // --- Pagination State ---
  let currentPage = 1;
  const postsPerPage = 6;

  document.addEventListener("DOMContentLoaded", () => {
    // --- DEVELOPMENT VERIFICATION ---
    // Double-checking for duplicate IDs on the frontend side
    const seenPublicIds = new Set();
    const seenIds = new Set();
    let hasDuplicates = false;

    blogData.forEach(post => {
      if (seenIds.has(post.id)) {
        console.error(`🚨 Duplicate numeric ID found in blogData: ${post.id}`);
        hasDuplicates = true;
      }
      seenIds.add(post.id);

      if (seenPublicIds.has(post.publicId)) {
        console.error(`🚨 Duplicate publicId found in blogData: "${post.publicId}"`);
        hasDuplicates = true;
      }
      seenPublicIds.add(post.publicId);
    });

    if (hasDuplicates) {
      console.warn("Please fix the duplicate IDs in blog/data.php to avoid routing bugs!");
    }

    // --- ELEMENT SELECTORS ---
    const blogListView = document.getElementById("blog-list-view");
    const blogPostView = document.getElementById("blog-post-view");
    const blogGrid = document.getElementById("blog-grid");
    const paginationControls = document.getElementById("pagination-controls");
    const noResults = document.getElementById("no-results");
    const searchInput = document.getElementById("search-input");
    const categoryFilter = document.getElementById("category-filter");
    const tagFilter = document.getElementById("tag-filter");

    // --- INITIALIZATION ---
    populateFilters();
    handleRouting();

    // --- EVENT LISTENERS ---
    searchInput.addEventListener("input", () => {
      currentPage = 1; // Reset page on new search
      renderBlogList();
    });
    categoryFilter.addEventListener("change", () => {
      currentPage = 1; // Reset page on new filter
      renderBlogList();
    });
    tagFilter.addEventListener("change", () => {
      currentPage = 1; // Reset page on new filter
      renderBlogList();
    });

    // Listen for browser back/forward navigation
    window.addEventListener("popstate", handleRouting);

    // --- ROUTING ---
    function handleRouting() {
      // Clear any old structured data
      const oldSchema = document.getElementById('blog-post-schema');
      if (oldSchema) {
        oldSchema.remove();
      }

      const params = new URLSearchParams(window.location.search);
      const id = params.get("id"); // UPDATED: Was 'slug'

      if (id) { // UPDATED: Was 'slug'
        // Show single post view
        const post = blogData.find(p => p.publicId === id); // UPDATED: Check 'publicId'
        if (post) {
          renderSinglePost(post);
          blogListView.classList.add("hidden");
          blogPostView.classList.remove("hidden");
          window.scrollTo(0, 0);
        } else {
          // Post not found, redirect to list
          showListView();
        }
      } else {
        // Show blog list view
        showListView();
      }
    }

    // --- VIEW RENDERING ---

    function showListView() {
      blogListView.classList.remove("hidden");
      blogPostView.classList.add("hidden");
      // Clear URL params without reloading
      // Only push state if it's not the initial page load
      if (window.location.search.includes("id")) { // UPDATED: Was 'slug'
        history.pushState(null, '', window.location.pathname);
      }
      renderBlogList();
    }

    /**
     * Renders the list of blog post cards based on current filters and page
     */
    function renderBlogList() {
      const searchTerm = searchInput.value.toLowerCase();
      const selectedCategory = categoryFilter.value;
      const selectedTag = tagFilter.value;

      const filteredPosts = blogData.filter(post => {
        const matchesSearch = post.title.toLowerCase().includes(searchTerm) ||
          post.excerpt.toLowerCase().includes(searchTerm) ||
          post.tags.some(tag => tag.toLowerCase().includes(searchTerm));
        const matchesCategory = selectedCategory === "all" || post.category === selectedCategory;
        const matchesTag = selectedTag === "all" || post.tags.includes(selectedTag);
        return matchesSearch && matchesCategory && matchesTag;
      });

      // Sort by publish date, newest first
      filteredPosts.sort((a, b) => new Date(b.publishDate) - new Date(a.publishDate));

      // --- Pagination Logic ---
      const totalPosts = filteredPosts.length;
      const startIndex = (currentPage - 1) * postsPerPage;
      const endIndex = startIndex + postsPerPage;
      const paginatedPosts = filteredPosts.slice(startIndex, endIndex);

      blogGrid.innerHTML = ""; // Clear existing grid
      paginationControls.innerHTML = ""; // Clear pagination

      if (paginatedPosts.length === 0) {
        noResults.classList.remove("hidden");
      } else {
        noResults.classList.add("hidden");
        paginatedPosts.forEach(post => {
          const postCard = createPostCard(post);
          blogGrid.appendChild(postCard);
        });
        renderPagination(totalPosts);
      }
    }

    /**
     * Creates HTML for a single blog post card
     * @param {object} post - The post data object
     * @returns {HTMLElement} - The card element
     */
    function createPostCard(post) {
      const postUrl = `?id=${post.publicId}`; // UPDATED: Was 'slug'
      const card = document.createElement("a");
      card.href = postUrl;
      card.className = "flex flex-col bg-content-bg/80 backdrop-blur-sm shadow-xl rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-800 hover:shadow-2xl hover:border-primary/50 transition-all duration-500 transform hover:-translate-y-2 group focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 relative";

      // Calculate reading time
      const readingTime = calculateReadingTime(post.content);

      card.innerHTML = `
        <div class="relative overflow-hidden">
          <img class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out" src="${post.imageUrl}" alt="${post.title}" loading="lazy" onerror="this.onerror=null; this.src='https://placehold.co/600x400/CBD5E0/FFFFFF?text=Image+Not+Found';">
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>
        <div class="p-6 flex-grow flex flex-col relative z-10">
          <span class="inline-block bg-primary/10 text-primary text-xs font-bold px-3 py-1 rounded-full mb-4 self-start shadow-sm border border-primary/20">${post.category}</span>
          <h3 class="text-2xl font-bold text-text-default mb-3 group-hover:text-primary transition-colors duration-300 line-clamp-2">${post.title}</h3>
          <p class="text-text-secondary mb-6 flex-grow line-clamp-3 leading-relaxed">${post.excerpt}</p>
        </div>
        <div class="p-6 pt-0 flex justify-between items-center text-sm text-text-secondary mt-auto border-t border-gray-100 dark:border-gray-800/50 relative z-10">
          <span class="font-medium flex items-center gap-2">
            <div class="w-7 h-7 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-[10px] font-bold shadow-sm">${post.author.charAt(0)}</div>
            ${post.author}
          </span>
          <span class="flex items-center gap-1.5 font-medium bg-gray-50 dark:bg-gray-800/80 px-2.5 py-1 rounded-md text-xs">
            <i class="far fa-clock text-primary" aria-hidden="true"></i> ${readingTime} min read
          </span>
        </div>
      `;

      // Handle navigation with JS to prevent full page reload
      card.addEventListener("click", (e) => {
        e.preventDefault();
        history.pushState({ id: post.publicId }, post.title, postUrl); // UPDATED: Was 'slug'
        handleRouting();
      });

      return card;
    }

    /**
     * Renders the full content of a single blog post
     * @param {object} post - The post data object
     */
    function renderSinglePost(post) {
      // Calculate reading time
      const readingTime = calculateReadingTime(post.content);

      blogPostView.innerHTML = `
        <article class="max-w-4xl mx-auto bg-content-bg shadow-2xl rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800">
          <header class="p-8 md:p-14 text-center bg-gradient-to-b from-gray-50 dark:from-gray-900/50 to-transparent relative">
            <div class="mb-8 text-left absolute top-8 left-8">
              <button id="back-to-list-btn" class="text-text-secondary hover:text-primary transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-primary rounded p-1 inline-flex items-center font-medium bg-white dark:bg-gray-800 px-4 py-2 border border-gray-200 dark:border-gray-700 shadow-sm rounded-full">
                <i class="fas fa-arrow-left mr-2"></i> Back
              </button>
            </div>
            <span class="inline-block bg-primary/10 text-primary text-sm font-bold px-4 py-1.5 rounded-full mb-6 mx-auto shadow-sm border border-primary/20 mt-12 md:mt-0">${post.category}</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary mb-8 leading-tight max-w-3xl mx-auto drop-shadow-sm">${post.title}</h1>
            <div class="flex flex-wrap items-center justify-center gap-x-8 gap-y-4 text-sm md:text-base text-text-secondary font-medium">
              <span class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-xs font-bold shadow-md">${post.author.charAt(0)}</div>
                ${post.author}
              </span>
              <span class="flex items-center"><i class="fas fa-calendar-alt mr-2 text-primary"></i>${formatDate(post.publishDate)}</span>
              <span class="flex items-center gap-1.5 bg-gray-100 dark:bg-gray-800 px-3 py-1.5 rounded-xl shadow-inner text-sm">
                <i class="far fa-clock mr-1 text-primary" aria-hidden="true"></i> ${readingTime} min read
              </span>
            </div>
          </header>

          <img class="w-full h-64 md:h-96 object-cover" src="${post.imageUrl}" alt="${post.title}" loading="lazy" onerror="this.onerror=null; this.src='https://placehold.co/1000x400/CBD5E0/FFFFFF?text=Image+Not+Found';">

          <!-- Post Content -->
          <!-- IMPROVEMENT: Added 'dark:prose-invert' for automatic dark mode styling -->
          <div class="prose prose-lg lg:prose-xl max-w-none p-6 md:p-10 text-text-default dark:prose-invert">
            ${post.content}
          </div>

          <!-- Tags and Share -->
          <footer class="p-6 md:p-10 border-t border-gray-200 dark:border-gray-700">
            <!-- Tags -->
            <div class="mb-8">
              <h4 class="text-lg font-semibold text-text-default mb-3">Tags</h4>
              <div class="flex flex-wrap gap-2">
                ${post.tags.map(tag => `
                  <span class="inline-block bg-gray-200 dark:bg-gray-700 text-text-secondary dark:text-gray-300 text-sm font-medium px-3 py-1 rounded-full">${tag}</span>
                `).join('')}
              </div>
            </div>

            <!-- Action Buttons (Citation & Better Share) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <!-- Share Section -->
              <div>
                <h4 class="text-lg font-semibold text-text-default mb-3">Share This Post</h4>
                <div class="flex flex-wrap gap-3">
                  <button id="copy-link-btn" title="Copy Link" class="w-12 h-12 bg-gray-200 dark:bg-gray-700 text-text-secondary dark:text-gray-300 rounded-full flex items-center justify-center text-xl hover:bg-primary hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    <i class="fas fa-link"></i>
                  </button>
                  <a href="https://twitter.com/intent/tweet?url=${encodeURIComponent(window.location.href)}&text=${encodeURIComponent(post.title)}" target="_blank" rel="noopener noreferrer" title="Share on X (Twitter)" class="w-12 h-12 bg-gray-200 dark:bg-gray-700 text-text-secondary dark:text-gray-300 rounded-full flex items-center justify-center text-xl hover:bg-black hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(window.location.href)}&title=${encodeURIComponent(post.title)}&summary=${encodeURIComponent(post.excerpt)}" target="_blank" rel="noopener noreferrer" title="Share on LinkedIn" class="w-12 h-12 bg-gray-200 dark:bg-gray-700 text-text-secondary dark:text-gray-300 rounded-full flex items-center justify-center text-xl hover:bg-[#0077b5] hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a href="mailto:?subject=${encodeURIComponent(post.title)}&body=${encodeURIComponent('Check out this article: ' + window.location.href)}" title="Share via Email" class="w-12 h-12 bg-gray-200 dark:bg-gray-700 text-text-secondary dark:text-gray-300 rounded-full flex items-center justify-center text-xl hover:bg-gray-600 hover:text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                    <i class="fas fa-envelope"></i>
                  </a>
                </div>
              </div>
              <!-- Citation Section -->
              <div>
                <h4 class="text-lg font-semibold text-text-default mb-3">Citation</h4>
                <button id="citation-btn" class="w-full bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 flex items-center justify-center gap-2">
                  <i class="fas fa-quote-right"></i>Generate Citation
                </button>
              </div>
            </div>
          </footer>

          <!-- Related Posts Section -->
          <section id="related-posts-section" class="p-6 md:p-10 border-t border-gray-200 dark:border-gray-700">
            <h3 class="text-3xl font-bold text-text-default mb-6">Related Posts</h3>
            <div id="related-posts-grid" class="grid grid-cols-1 sm:grid-cols-3 gap-6">
              <!-- Related posts will be injected here -->
            </div>
          </section>
        </article>
      `;

      // --- ADD EVENT LISTENERS FOR NEW BUTTONS ---

      // Back button
      document.getElementById("back-to-list-btn").addEventListener("click", (e) => {
        e.preventDefault();
        showListView();
      });

      // Copy Link button
      document.getElementById("copy-link-btn").addEventListener("click", () => {
        copyLinkToClipboard();
      });

      // Citation button
      document.getElementById("citation-btn").addEventListener("click", () => {
        generateCitations(post);
      });

      // --- (DELETED) ---
      // The 'fixProseDarkMode()' function call has been removed.

      // Inject Structured Data
      addStructuredData(post);

      // Render Related Posts
      renderRelatedPosts(post);
    }

    // --- Pagination Rendering ---
    /**
     * Renders pagination controls
     * @param {number} totalPosts - Total number of *filtered* posts
     */
    function renderPagination(totalPosts) {
      const totalPages = Math.ceil(totalPosts / postsPerPage);
      paginationControls.innerHTML = ""; // Clear old controls

      if (totalPages <= 1) return; // No pagination needed

      const baseBtnClass = "px-4 py-2 rounded-lg font-semibold transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2";
      const disabledBtnClass = "bg-gray-200 dark:bg-gray-700 text-text-secondary cursor-not-allowed opacity-50";
      const defaultBtnClass = "bg-content-bg text-text-default border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700";

      // Previous Button
      const prevButton = document.createElement("button");
      prevButton.innerHTML = `<i class="fas fa-arrow-left mr-2"></i> Previous`;
      prevButton.className = `${baseBtnClass} ${currentPage === 1 ? disabledBtnClass : defaultBtnClass}`;
      if (currentPage === 1) {
        prevButton.disabled = true;
      }
      prevButton.addEventListener("click", () => {
        if (currentPage > 1) {
          currentPage--;
          renderBlogList();
          window.scrollTo(0, 0);
        }
      });
      paginationControls.appendChild(prevButton);

      // Page Info
      const pageInfo = document.createElement("span");
      pageInfo.className = "text-text-secondary font-medium";
      pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
      paginationControls.appendChild(pageInfo);

      // Next Button
      const nextButton = document.createElement("button");
      nextButton.innerHTML = `Next <i class="fas fa-arrow-right ml-2"></i>`;
      nextButton.className = `${baseBtnClass} ${currentPage === totalPages ? disabledBtnClass : defaultBtnClass}`;
      if (currentPage === totalPages) {
        nextButton.disabled = true;
      }
      nextButton.addEventListener("click", () => {
        if (currentPage < totalPages) {
          currentPage++;
          renderBlogList();
          window.scrollTo(0, 0);
        }
      });
      paginationControls.appendChild(nextButton);
    }

    // --- Related Posts Rendering ---
    /**
     * Finds and renders related posts
     * @param {object} currentPost - The post currently being viewed
     */
    function renderRelatedPosts(currentPost) {
      const relatedGrid = document.getElementById("related-posts-grid");
      const relatedSection = document.getElementById("related-posts-section");
      relatedGrid.innerHTML = "";

      const related = blogData.filter(post =>
        post.category === currentPost.category && post.id !== currentPost.id
      ).slice(0, 3); // Get up to 3 related posts

      if (related.length === 0) {
        relatedSection.classList.add("hidden"); // Hide section if no related posts
        return;
      }

      relatedSection.classList.remove("hidden");
      related.forEach(post => {
        const postUrl = `?id=${post.publicId}`; // UPDATED: Was 'slug'
        const card = document.createElement("a");
        card.href = postUrl;
        card.className = "flex flex-col bg-content-bg shadow-md rounded-xl overflow-hidden border border-gray-100 dark:border-gray-800 hover:shadow-xl hover:border-primary/30 transition-all duration-300 transform hover:-translate-y-1 group focus:outline-none focus:ring-2 focus:ring-primary relative";

        card.innerHTML = `
          <div class="relative overflow-hidden">
            <img class="w-full h-36 object-cover group-hover:scale-105 transition-transform duration-500" src="${post.imageUrl}" alt="${post.title}" loading="lazy" onerror="this.onerror=null; this.src='https://placehold.co/300x200/CBD5E0/FFFFFF?text=Image';">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          </div>
          <div class="p-5 flex-grow relative z-10">
            <h4 class="text-lg font-bold text-text-default mb-2 group-hover:text-primary transition-colors duration-200 line-clamp-2">${post.title}</h4>
            <span class="text-xs font-medium text-text-secondary bg-gray-50 dark:bg-gray-800/80 px-2 py-1 rounded">${formatDate(post.publishDate)}</span>
          </div>
        `;
        card.addEventListener("click", (e) => {
          e.preventDefault();
          history.pushState({ id: post.publicId }, post.title, postUrl); // UPDATED: Was 'slug'
          handleRouting();
        });
        relatedGrid.appendChild(card);
      });
    }

    // --- HELPER FUNCTIONS ---

    /**
     * Populates category and tag filters from blog data
     */
    function populateFilters() {
      const categories = [...new Set(blogData.map(post => post.category))];
      const tags = [...new Set(blogData.flatMap(post => post.tags))];

      categories.sort().forEach(category => {
        const option = document.createElement("option");
        option.value = category;
        option.textContent = category;
        categoryFilter.appendChild(option);
      });

      tags.sort().forEach(tag => {
        const option = document.createElement("option");
        option.value = tag;
        option.textContent = tag;
        tagFilter.appendChild(option);
      });
    }

    /**
     * Formats a YYYY-MM-DD date string to "Month Day, Year"
     * @param {string} dateString
     * @returns {string}
     */
    function formatDate(dateString) {
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      return new Date(dateString + 'T00:00:00').toLocaleDateString(undefined, options);
    }

    /**
     * Calculates estimated reading time
     * @param {string} htmlContent - The HTML content of the post
     * @returns {number} - Estimated minutes to read
     */
    function calculateReadingTime(htmlContent) {
      const plainText = (htmlContent || '').replace(/<[^>]+>/g, ''); // Strip HTML tags
      const wordsPerMinute = 200; // Average reading speed
      const wordCount = plainText.trim().split(/\s+/).length;
      const readingTime = Math.ceil(wordCount / wordsPerMinute);
      return readingTime;
    }

    /**
     * Copies the current URL to the clipboard
     */
    function copyLinkToClipboard() {
      try {
        // Use document.execCommand('copy') for better iFrame support
        const dummy = document.createElement('textarea');
        document.body.appendChild(dummy);
        dummy.value = window.location.href;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);

        if (typeof showMessageBox === "function") {
          showMessageBox("Link copied to clipboard!");
        }
      } catch (err) {
        if (typeof showMessageBox === "function") {
          showMessageBox("Could not copy link. Please copy from your browser's address bar.");
        }
      }
    }


    /**
     * Generates citations and displays them in the message box modal
     * @param {object} post - The post data object
     */
    function generateCitations(post) {
      const d = new Date(post.publishDate + 'T00:00:00');
      const year = d.getFullYear();
      const month = d.toLocaleString('default', { month: 'long' });
      const day = d.getDate();
      const url = window.location.href;

      // APA 7th Edition
      const apa = `APA (7th ed.):\n${post.author}. (${year}, ${month} ${day}). *${post.title}*. Hesten's Learning Blog. ${url}`;

      // MLA 9th Edition
      const mla = `MLA (9th ed.):\n${post.author}. "${post.title}." *Hesten's Learning Blog*, ${day} ${month} ${year}, ${url}.`;

      // Use the showMessageBox function from your footer.php
      if (typeof showMessageBox === "function") {
        // We use a <pre> tag to preserve formatting in the modal
        const messageContent = `
          <div class="text-left text-sm whitespace-pre-wrap" style="font-family: monospace;">
<strong class="font-bold">APA (7th ed.):</strong>
${post.author}. (${year}, ${month} ${day}). <em>${post.title}</em>. Hesten's Learning Blog. ${url}

<strong class="font-bold mt-4 block">MLA (9th ed.):</strong>
${post.author}. "${post.title}." <em>Hesten's Learning Blog</em>, ${day} ${month} ${year}, ${url}.
          </div>
        `;
        // Find and update the modal components
        const messageBox = document.getElementById("message-box");
        const messageText = document.getElementById("message-text");
        const messageTitle = document.getElementById("message-title");
        if (messageBox && messageText && messageTitle) {
          messageTitle.textContent = "Citations";
          messageText.innerHTML = messageContent;
          // Manually call the modal display logic from footer.php
          messageBox.classList.remove("hidden");
          messageBox.style.display = 'flex';
          // Find and attach click handler for OK button
          document.getElementById("message-ok-button").onclick = () => {
            messageBox.classList.add("hidden");
            messageBox.style.display = 'none';
          };
        }
      } else {
        alert("Citation Generation:\n\n" + apa + "\n\n" + mla);
      }
    }

    /**
     * Injects JSON-LD structured data for SEO
     * @param {object} post - The post data object
     */
    function addStructuredData(post) {
      // Remove old schema if it exists
      const oldSchema = document.getElementById('blog-post-schema');
      if (oldSchema) {
        oldSchema.remove();
      }

      const schema = {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": post.title,
        "name": post.title,
        "description": post.excerpt,
        "image": post.imageUrl,
        "author": {
          "@type": "Person",
          "name": post.author
        },
        "publisher": {
          "@type": "Organization",
          "name": "Hesten's Learning Blog",
          "logo": {
            "@type": "ImageObject",
            // TODO: Replace with a full URL to your logo
            "url": "https://hestena62.com/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png"
          }
        },
        "mainEntityOfPage": {
          "@type": "WebPage",
          "@id": window.location.href
        },
        "datePublished": post.publishDate
      };

      const script = document.createElement('script');
      script.type = 'application/ld+json';
      script.id = 'blog-post-schema';
      script.textContent = JSON.stringify(schema, null, 2);
      document.head.appendChild(script);
    }

    // --- (DELETED) ---
    // The 'fixProseDarkMode' function is no longer needed
    // as 'dark:prose-invert' is now part of the Tailwind class list
    // in 'renderSinglePost'.

  });
</script>

<?php
// IMPROVEMENT: Use __DIR__ for more robust include paths
@include __DIR__ . '/../src/footer.php';
?>