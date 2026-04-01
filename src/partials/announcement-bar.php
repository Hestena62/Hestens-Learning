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

    <script src="/assets/js/announcements.js"></script>
