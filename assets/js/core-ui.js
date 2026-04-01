// core-ui.js - Global UI interactions

document.addEventListener('DOMContentLoaded', () => {
    // --- 1. Scroll Progress ---
    window.addEventListener('scroll', () => {
        const h = document.documentElement, 
              b = document.body,
              st = 'scrollTop',
              sh = 'scrollHeight';
        const pct = (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100;
        const bar = document.getElementById('scroll-bar');
        if (bar) bar.style.width = pct + '%';
    });

    // --- 2. Magnetic Buttons ---
    const initMagnetic = () => {
        document.querySelectorAll('.magnetic-wrap').forEach(item => {
            item.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                this.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translate(0px, 0px)';
            });
        });
    };
    initMagnetic();

    // --- 3. Personalization: Time Greetings ---
    window.getGreeting = () => {
        const hour = new Date().getHours();
        if (hour < 12) return "Good Morning";
        if (hour < 17) return "Good Afternoon";
        return "Good Evening";
    };
    
    const greetingEl = document.getElementById('dynamic-greeting');
    if (greetingEl) greetingEl.textContent = window.getGreeting();
});
