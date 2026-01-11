<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <aside
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-gray-900 via-gray-800 to-black shadow-2xl transition-transform duration-300 lg:translate-x-0"
        >
            <!-- Logo -->
            <div class="flex items-center justify-between h-16 px-6 bg-black/30">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-audiogold-500 to-orange-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">AG</span>
                    </div>
                    <span class="ml-3 text-white font-bold text-lg">AudioGold</span>
                </div>
                <button @click="toggleSidebar" class="lg:hidden text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="mt-6 px-3">
                <Link
                    :href="route('admin.dashboard')"
                    :class="isActive('admin.dashboard') ? 'bg-gradient-to-r from-audiogold-500 to-orange-600 text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white'"
                    class="flex items-center px-4 py-3 mb-2 rounded-xl transition-all duration-300 group"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="ml-3 font-medium">Dashboard</span>
                </Link>

                <div class="mt-8">
                    <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Management
                    </p>
                    <div class="mt-3 space-y-2">
                        <Link
                            :href="route('admin.users.index')"
                            :class="isActive('admin.users.*') ? 'bg-gradient-to-r from-audiogold-500 to-orange-600 text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white'"
                            class="flex items-center px-4 py-3 rounded-xl transition-all duration-300"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="ml-3 font-medium">Users</span>
                        </Link>
                        <Link
                            :href="route('admin.inquiries.index')"
                            :class="isActive('admin.inquiries.*') ? 'bg-gradient-to-r from-audiogold-500 to-orange-600 text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white'"
                            class="flex items-center px-4 py-3 rounded-xl transition-all duration-300"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="ml-3 font-medium">Inquiries</span>
                        </Link>
                        <Link
                            :href="route('admin.newsletter.index')"
                            :class="isActive('admin.newsletter.*') ? 'bg-gradient-to-r from-audiogold-500 to-orange-600 text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white'"
                            class="flex items-center px-4 py-3 rounded-xl transition-all duration-300"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                            </svg>
                            <span class="ml-3 font-medium">Newsletter</span>
                        </Link>
                        <Link
                            :href="route('admin.categories.index')"
                            :class="isActive('admin.categories.*') ? 'bg-gradient-to-r from-audiogold-500 to-orange-600 text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white'"
                            class="flex items-center px-4 py-3 rounded-xl transition-all duration-300"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                            <span class="ml-3 font-medium">Categories</span>
                        </Link>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-white/5 hover:text-white rounded-xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <span class="ml-3 font-medium">Products</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-400 hover:bg-white/5 hover:text-white rounded-xl transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span class="ml-3 font-medium">Orders</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Logout Button -->
            <div class="absolute bottom-0 left-0 right-0 p-4">
                <form @submit.prevent="logout">
                    <button
                        type="submit"
                        class="w-full flex items-center px-4 py-3 text-gray-400 hover:bg-red-500/10 hover:text-red-400 rounded-xl transition-all duration-300"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="ml-3 font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="lg:pl-64">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-40">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Mobile Menu Button -->
                    <button
                        @click="toggleSidebar"
                        class="lg:hidden text-gray-600 hover:text-gray-900"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Page Title -->
                    <h1 v-if="pageTitle" class="text-xl font-bold text-gray-900 hidden lg:block">
                        {{ pageTitle }}
                    </h1>
                    <div v-else></div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>

                        <!-- User Profile -->
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-audiogold-500 to-orange-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">{{ userInitials }}</span>
                            </div>
                            <div class="hidden md:block">
                                <p class="text-sm font-semibold text-gray-900">{{ userName }}</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                <slot />
            </main>
        </div>

        <!-- Mobile Overlay -->
        <div
            v-if="sidebarOpen"
            @click="toggleSidebar"
            class="fixed inset-0 bg-black/50 z-40 lg:hidden"
        ></div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';

defineProps({
    pageTitle: {
        type: String,
        default: '',
    },
});

const page = usePage();
const sidebarOpen = ref(false);

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value;
};

const isActive = (routeName) => {
    return route().current(routeName);
};

const logout = () => {
    router.post(route('admin.logout'));
};

const userName = computed(() => {
    return page.props.auth?.user?.name || 'Admin User';
});

const userInitials = computed(() => {
    const name = userName.value;
    const parts = name.split(' ');
    if (parts.length >= 2) {
        return (parts[0][0] + parts[1][0]).toUpperCase();
    }
    return name.substring(0, 2).toUpperCase();
});
</script>
