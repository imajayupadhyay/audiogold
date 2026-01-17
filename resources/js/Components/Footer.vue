<template>
    <footer class="backdrop-blur-md bg-gray-900/95 text-white py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
        <!-- Newsletter Section -->
            <div class="backdrop-blur-sm bg-white/10 rounded-3xl p-8 md:p-12 mb-12 border border-white/20">
                <!-- Success/Error Messages -->
                <div v-if="showSuccess" class="mb-6 max-w-md mx-auto">
                    <div class="bg-green-500/20 border-2 border-green-400 rounded-xl p-3 shadow-lg animate-pulse">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                            </svg>
                            <p class="text-green-700 font-semibold text-sm">{{ successMessage }}</p>
                        </div>
                    </div>
                </div>

                <div v-if="showError" class="mb-6 max-w-md mx-auto">
                    <div class="backdrop-blur-sm bg-red-50 border-2 border-red-500 rounded-2xl p-4 shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                </svg>
                            </div>
                            <p class="text-red-800 font-semibold">{{ errorMessage }}</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h3 class="text-3xl font-bold mb-2">{{ newsletterTitle }}</h3>
                    <p class="text-gray-300">{{ newsletterSubtitle }}</p>
                </div>
                <form @submit.prevent="subscribe" class="max-w-md mx-auto flex gap-3">
                    <input
                        v-model="newsletterForm.email"
                        type="email"
                        required
                        placeholder="Your mail here"
                        class="flex-1 px-6 py-3 rounded-full bg-white/20 border-2 border-white/30 focus:border-audiogold-400 focus:ring-2 focus:ring-audiogold-300 outline-none text-white placeholder-gray-300"
                    />
                    <button
                        type="submit"
                        :disabled="newsletterForm.processing"
                        class="px-8 py-3 bg-gradient-to-r from-audiogold-600 to-audiogold-700 rounded-full font-semibold hover:from-audiogold-700 hover:to-audiogold-800 transition-all duration-300 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Subscribe
                    </button>
                </form>
            </div>

            <!-- Footer Content -->
            <div class="grid md:grid-cols-3 gap-12 mb-12">
                <!-- Logo and Description -->
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="w-10 h-10 text-audiogold-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3v9.28c-.47-.17-.97-.28-1.5-.28C8.01 12 6 14.01 6 16.5S8.01 21 10.5 21c2.31 0 4.2-1.75 4.45-4H15V6h4V3h-7z"/>
                        </svg>
                        <span class="text-2xl font-bold text-white">AudioGold</span>
                    </div>
                    <p class="text-gray-300 mb-6">
                        {{ companyDescription }}
                    </p>
                    <!-- Social Media Icons -->
                    <div class="flex space-x-4">
                        <a :href="facebookUrl" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white/10 hover:bg-audiogold-600 flex items-center justify-center transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a :href="twitterUrl" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white/10 hover:bg-audiogold-600 flex items-center justify-center transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a :href="instagramUrl" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white/10 hover:bg-audiogold-600 flex items-center justify-center transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a :href="youtubeUrl" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-white/10 hover:bg-audiogold-600 flex items-center justify-center transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Useful Links -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-audiogold-400">Useful Links</h4>
                    <ul class="space-y-3">
                        <li v-for="(link, index) in usefulLinks" :key="index">
                            <a :href="link.url" class="text-gray-300 hover:text-audiogold-400 transition-colors duration-200">
                                {{ link.label }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Get in Touch -->
                <div>
                    <h4 class="text-xl font-bold mb-6 text-audiogold-400">Get in Touch With Audio Gold</h4>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-audiogold-400 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <a :href="'mailto:' + contactEmail" class="text-gray-300 hover:text-audiogold-400 transition-colors duration-200 break-all">
                                {{ contactEmail }}
                            </a>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-audiogold-400 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <a :href="'tel:' + contactPhone.replace(/\s/g, '')" class="text-gray-300 hover:text-audiogold-400 transition-colors duration-200">
                                {{ contactPhone }}
                            </a>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-audiogold-400 mt-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <p class="text-gray-300">{{ contactAddress }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="pt-8 border-t border-white/20 text-center">
                <p class="text-gray-400">
                    {{ copyrightText }}
                </p>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';

const page = usePage();

// Default values
const defaults = {
    newsletter_title: 'Subscribe Now',
    newsletter_subtitle: "Don't miss our future updates! Get Subscribed Today!",
    company_description: 'Making premium audio technology accessible to all. Professional-grade equipment for the Indian market.',
    facebook_url: '#',
    twitter_url: '#',
    instagram_url: '#',
    youtube_url: '#',
    useful_links: [
        { label: 'Home', url: '/' },
        { label: 'Products', url: '#products' },
        { label: 'About us', url: '#about' },
        { label: "FAQ's", url: '#faq' },
        { label: 'Support', url: '#support' },
        { label: 'Contact', url: '#contact' },
    ],
    contact_email: 'shivamelectronics7@gmail.com',
    contact_phone: '+91 7011651721',
    contact_address: 'A-64 Roop nagar industrial area, Loni Ghaziabad',
    copyright_text: '©2025. AudioGold.in All Rights Reserved.',
};

// Computed properties with fallback to defaults
const footerSettings = computed(() => page.props.footerSettings || {});

const newsletterTitle = computed(() => footerSettings.value.newsletter_title || defaults.newsletter_title);
const newsletterSubtitle = computed(() => footerSettings.value.newsletter_subtitle || defaults.newsletter_subtitle);
const companyDescription = computed(() => footerSettings.value.company_description || defaults.company_description);
const facebookUrl = computed(() => footerSettings.value.facebook_url || defaults.facebook_url);
const twitterUrl = computed(() => footerSettings.value.twitter_url || defaults.twitter_url);
const instagramUrl = computed(() => footerSettings.value.instagram_url || defaults.instagram_url);
const youtubeUrl = computed(() => footerSettings.value.youtube_url || defaults.youtube_url);
const usefulLinks = computed(() => {
    const links = footerSettings.value.useful_links;
    return links && links.length > 0 ? links : defaults.useful_links;
});
const contactEmail = computed(() => footerSettings.value.contact_email || defaults.contact_email);
const contactPhone = computed(() => footerSettings.value.contact_phone || defaults.contact_phone);
const contactAddress = computed(() => footerSettings.value.contact_address || defaults.contact_address);
const copyrightText = computed(() => footerSettings.value.copyright_text || defaults.copyright_text);

const showSuccess = ref(false);
const showError = ref(false);
const successMessage = ref('');
const errorMessage = ref('');

const newsletterForm = useForm({
    email: ''
});

const subscribe = () => {
    newsletterForm.post(route('newsletter.subscribe'), {
        preserveScroll: true,
        onSuccess: () => {
            newsletterForm.reset();
            showSuccess.value = true;
            showError.value = false;
            successMessage.value = 'Thank you for subscribing to our newsletter!';
            setTimeout(() => { showSuccess.value = false; }, 5000);
        },
        onError: () => {
            showError.value = true;
            showSuccess.value = false;
            errorMessage.value = 'This email is already subscribed to our newsletter!';
            setTimeout(() => { showError.value = false; }, 5000);
        }
    });
};
</script>
