<template>
    <Head title="Admin Login - AudioGold" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-black relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-72 h-72 bg-audiogold-500 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-20 w-96 h-96 bg-orange-600 rounded-full blur-3xl animate-float-slow"></div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-audiogold-400 rounded-full blur-3xl animate-float-slower"></div>
        </div>

        <!-- Login Card -->
        <div class="relative z-10 w-full max-w-md px-6">
            <div class="bg-white/10 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-audiogold-500 to-orange-600 p-8 text-center">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-audiogold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                    </div>
                    <h1 class="text-3xl font-bold text-white mb-2">Admin Login</h1>
                    <p class="text-white/90 text-sm">Welcome back to AudioGold Dashboard</p>
                </div>

                <!-- Form -->
                <div class="p-8">
                    <!-- Status Message -->
                    <div v-if="status" class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-xl text-green-300 text-sm">
                        {{ status }}
                    </div>

                    <form @submit.prevent="submit" class="space-y-6">
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-white mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input
                                    id="email"
                                    type="email"
                                    v-model="form.email"
                                    class="w-full pl-12 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-300"
                                    placeholder="admin@audiogold.com"
                                    required
                                    autofocus
                                />
                            </div>
                            <p v-if="form.errors.email" class="mt-2 text-sm text-red-400">
                                {{ form.errors.email }}
                            </p>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-white mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input
                                    id="password"
                                    type="password"
                                    v-model="form.password"
                                    class="w-full pl-12 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-300"
                                    placeholder="Enter your password"
                                    required
                                />
                            </div>
                            <p v-if="form.errors.password" class="mt-2 text-sm text-red-400">
                                {{ form.errors.password }}
                            </p>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center cursor-pointer">
                                <input
                                    type="checkbox"
                                    v-model="form.remember"
                                    class="w-4 h-4 text-audiogold-500 bg-white/10 border-white/20 rounded focus:ring-audiogold-500 focus:ring-2 cursor-pointer"
                                />
                                <span class="ml-2 text-sm text-gray-300">Remember me</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="w-full py-3 px-6 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 flex items-center justify-center"
                        >
                            <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span v-if="form.processing">Signing in...</span>
                            <span v-else>Sign In</span>
                        </button>
                    </form>
                </div>

                <!-- Footer -->
                <div class="px-8 pb-8">
                    <div class="text-center text-sm text-gray-400">
                        <p>&copy; 2024 AudioGold. All rights reserved.</p>
                    </div>
                </div>
            </div>

            <!-- Back to Home Link -->
            <div class="mt-6 text-center">
                <a href="/" class="text-white/80 hover:text-white text-sm transition-colors duration-300 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Website
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
        default: null,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('admin.login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<style scoped>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes float-slow {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-30px); }
}

@keyframes float-slower {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-25px); }
}
</style>
