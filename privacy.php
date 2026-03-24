<?php
// ====================================================================
// PHP SETUP: Define dynamic variables for use in header.php and footer.php
// ====================================================================
$pageTitle       = "Privacy Policy - Hesten's Learning";
$pageDescription = "Privacy Policy for Hesten's Learning Platform.";
$pageKeywords    = "privacy policy, privacy, terms, terms of service";
$pageAuthor      = "Hesten Allison";

// Include the header file
include 'src/header.php';
?>

<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-primary via-secondary to-accent text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
    <!-- Abstract Background Shapes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <i class="fas fa-shield-alt absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
        <i class="fas fa-lock absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
    </div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-4 uppercase tracking-wider backdrop-blur-md shadow-sm">
            Legal
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">
            Privacy Policy
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
            How we protect and handle your personal information.
        </p>
    </div>
</div>

<main class="container mx-auto p-4 lg:p-8 min-h-[70vh] bg-content-bg shadow-xl rounded-base-rounded mb-8">
    <div class="space-y-10 p-4">
        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">1. Information We Collect</h2>
            <p class="text-text-default leading-loose">
                We collect information you provide directly to us when you create an account, update your profile, use the interactive features of our services, participate in assessments, request customer support, or otherwise communicate with us.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">2. How We Use Information</h2>
            <p class="text-text-default leading-loose">
                We use the information we collect to provide, maintain, and improve our services, such as to personalize your educational experience, process transactions, and send you related information including confirmations and support messages.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">3. Information Sharing</h2>
            <p class="text-text-default leading-loose">
                We do not share your personal information with third parties except as described in this privacy policy, such as with vendors, consultants, and other service providers who need access to such information to carry out work on our behalf.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">4. Security</h2>
            <p class="text-text-default leading-loose">
                We take reasonable measures to help protect information about you from loss, theft, misuse, and unauthorized access, disclosure, alteration, and destruction.
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-3 text-secondary border-b pb-1">5. Contact Us</h2>
            <p class="text-text-default leading-loose">
                If you have any questions about this Privacy Policy, please contact us at 
                <a href="mailto:admin@hestena62.com" class="text-accent hover:underline font-medium">admin@hestena62.com</a>.
            </p>
        </section>
    </div>
</main>

<?php
include 'src/footer.php';
?>
