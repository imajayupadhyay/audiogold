<template>
    <div class="fixed inset-0 -z-10 overflow-hidden bg-gradient-to-br from-white via-orange-50 to-orange-100">
        <!-- Floating audio wave SVGs -->
        <div class="absolute top-20 left-10 animate-float opacity-20">
            <svg class="w-32 h-32 text-audiogold-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
            </svg>
        </div>

        <div class="absolute top-1/4 right-20 animate-float-slow opacity-20">
            <svg class="w-40 h-40 text-audiogold-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 3v9.28c-.47-.17-.97-.28-1.5-.28C8.01 12 6 14.01 6 16.5S8.01 21 10.5 21c2.31 0 4.2-1.75 4.45-4H15V6h4V3h-7z"/>
            </svg>
        </div>

        <div class="absolute bottom-1/4 left-1/4 animate-float-slower opacity-20">
            <svg class="w-36 h-36 text-audiogold-500" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/>
            </svg>
        </div>

        <div class="absolute top-1/2 left-1/2 animate-float opacity-15">
            <svg class="w-48 h-48 text-audiogold-200" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 1c-4.97 0-9 4.03-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2c0-3.87 3.13-7 7-7s7 3.13 7 7v2h-4v8h3c1.66 0 3-1.34 3-3v-7c0-4.97-4.03-9-9-9z"/>
            </svg>
        </div>

        <div class="absolute bottom-20 right-1/4 animate-float-slow opacity-20">
            <svg class="w-28 h-28 text-audiogold-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7 9v6h4l5 5V4l-5 5H7z"/>
            </svg>
        </div>

        <!-- Soundwave particles -->
        <div class="absolute top-10 right-10 animate-pulse-slow opacity-30">
            <div class="flex gap-1 items-end">
                <div class="w-1 h-8 bg-audiogold-400 rounded-full"></div>
                <div class="w-1 h-12 bg-audiogold-500 rounded-full"></div>
                <div class="w-1 h-6 bg-audiogold-400 rounded-full"></div>
                <div class="w-1 h-10 bg-audiogold-600 rounded-full"></div>
                <div class="w-1 h-8 bg-audiogold-400 rounded-full"></div>
            </div>
        </div>

        <div class="absolute bottom-1/3 left-10 animate-pulse-slow opacity-30" style="animation-delay: 1s">
            <div class="flex gap-1 items-end">
                <div class="w-1 h-10 bg-audiogold-500 rounded-full"></div>
                <div class="w-1 h-6 bg-audiogold-400 rounded-full"></div>
                <div class="w-1 h-12 bg-audiogold-600 rounded-full"></div>
                <div class="w-1 h-8 bg-audiogold-400 rounded-full"></div>
                <div class="w-1 h-10 bg-audiogold-500 rounded-full"></div>
            </div>
        </div>

        <!-- Gradient orbs -->
        <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-gradient-to-br from-audiogold-300 to-audiogold-500 rounded-full blur-3xl opacity-20 animate-float"></div>
        <div class="absolute bottom-1/4 left-1/3 w-72 h-72 bg-gradient-to-tr from-audiogold-400 to-audiogold-200 rounded-full blur-3xl opacity-20 animate-float-slow"></div>
    </div>
</template>

<script setup>
// Animated background with audio-themed SVG infographics
</script>
