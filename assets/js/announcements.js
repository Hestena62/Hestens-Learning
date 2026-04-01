// announcements.js - Logic for the global announcement bar

document.addEventListener('DOMContentLoaded', () => {
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
        '<i class="fas fa-book mr-2"></i> Check out the expanded library collection with our newly added open-source titles.',
        '<i class="fas fa-globe mr-2"></i> OpenDyslexic font is not working, I am working on it.'
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
});
