<template>
    <nav class="fixed w-full z-50 top-0">
        <div class="backdrop-blur-md bg-white/70 border-b border-audiogold-200/50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="/" class="flex items-center space-x-2">
                            <svg class="w-10 h-10 text-audiogold-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3v9.28c-.47-.17-.97-.28-1.5-.28C8.01 12 6 14.01 6 16.5S8.01 21 10.5 21c2.31 0 4.2-1.75 4.45-4H15V6h4V3h-7z"/>
                            </svg>
                            <span class="text-2xl font-bold bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                                AudioGold
                            </span>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a v-for="link in navLinks" :key="link.name"
                           :href="link.href"
                           :class="[
                               'relative text-gray-700 hover:text-audiogold-600 transition-all duration-300 font-medium pb-1',
                               isActive(link.href) ? 'text-audiogold-600' : ''
                           ]">
                            {{ link.name }}
                            <span
                                :class="[
                                    'absolute bottom-0 left-0 h-0.5 bg-gradient-to-r from-audiogold-500 to-audiogold-700 transition-all duration-300',
                                    isActive(link.href) ? 'w-full' : 'w-0 group-hover:w-full'
                                ]"
                            ></span>
                            <span
                                v-if="!isActive(link.href)"
                                class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-audiogold-500 to-audiogold-700 hover:w-full transition-all duration-300 group-hover:w-full"
                            ></span>
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen"
                                class="text-gray-700 hover:text-audiogold-600 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path v-if="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Mobile Overlay -->
        <Transition
            enter-active-class="transition-opacity duration-300"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition-opacity duration-300"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="mobileMenuOpen"
                @click="mobileMenuOpen = false"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40 md:hidden"
            ></div>
        </Transition>

        <!-- Mobile Sidebar Menu -->
        <Transition
            enter-active-class="transition-transform duration-300 ease-out"
            enter-from-class="translate-x-full"
            enter-to-class="translate-x-0"
            leave-active-class="transition-transform duration-300 ease-in"
            leave-from-class="translate-x-0"
            leave-to-class="translate-x-full"
        >
            <div
                v-if="mobileMenuOpen"
                class="fixed top-0 right-0 h-full w-80 bg-white shadow-2xl z-50 md:hidden overflow-y-auto"
            >
                <!-- Sidebar Header -->
                <div class="flex items-center justify-between p-6 border-b border-audiogold-200/50">
                    <div class="flex items-center space-x-2">
                        <svg class="w-8 h-8 text-audiogold-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3v9.28c-.47-.17-.97-.28-1.5-.28C8.01 12 6 14.01 6 16.5S8.01 21 10.5 21c2.31 0 4.2-1.75 4.45-4H15V6h4V3h-7z"/>
                        </svg>
                        <span class="text-xl font-bold bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                            AudioGold
                        </span>
                    </div>
                    <button
                        @click="mobileMenuOpen = false"
                        class="p-2 rounded-full hover:bg-audiogold-50 text-gray-700 hover:text-audiogold-600 transition-all duration-200"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Navigation Links -->
                <div class="px-4 py-6 space-y-2">
                    <a
                        v-for="link in navLinks"
                        :key="link.name"
                        :href="link.href"
                        @click="mobileMenuOpen = false"
                        :class="[
                            'group flex items-center justify-between px-4 py-3 rounded-xl text-gray-700 hover:text-audiogold-600 hover:bg-audiogold-50 transition-all duration-200 font-medium',
                            isActive(link.href) ? 'text-audiogold-600 bg-gradient-to-r from-audiogold-50 to-audiogold-100 border-l-4 border-audiogold-600 shadow-sm' : ''
                        ]"
                    >
                        <span>{{ link.name }}</span>
                        <svg
                            class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200"
                            :class="isActive(link.href) ? 'text-audiogold-600' : 'text-gray-400'"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <!-- Footer Section -->
                <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-audiogold-200/50 bg-gradient-to-br from-audiogold-50 to-white">
                    <div class="text-center mb-4">
                        <p class="text-sm text-gray-600 mb-3">Experience Premium Audio</p>
                        <a
                            href="/contact"
                            @click="mobileMenuOpen = false"
                            class="inline-block w-full px-6 py-3 bg-gradient-to-r from-audiogold-500 to-audiogold-600 text-white rounded-xl font-semibold hover:from-audiogold-600 hover:to-audiogold-700 transition-all duration-300 shadow-lg hover:shadow-xl"
                        >
                            Get in Touch
                        </a>
                    </div>
                    <div class="flex items-center justify-center space-x-4 text-gray-500">
                        <a href="#" class="hover:text-audiogold-600 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="hover:text-audiogold-600 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="hover:text-audiogold-600 transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </Transition>
    </nav>
</template>

<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const mobileMenuOpen = ref(false);
const page = usePage();

const navLinks = [
    { name: 'Home', href: '/' },
    { name: 'Products', href: '/products' },
    { name: 'About us', href: '/about' },
    { name: "FAQ's", href: '/faq' },
    { name: 'Support', href: '/support' },
    { name: 'Contact', href: '/contact' },
];

const isActive = (href) => {
    const currentUrl = page.url;
    if (href === '/') {
        return currentUrl === '/';
    }
    return currentUrl.startsWith(href);
};
</script>
