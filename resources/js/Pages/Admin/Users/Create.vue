<template>
    <Head title="Add New User - AudioGold Admin" />

    <AdminLayout page-title="Add New User">
        <!-- Back Button -->
        <div class="mb-6">
            <Link
                :href="route('admin.users.index')"
                class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Users
            </Link>
        </div>

        <!-- Create Form Card -->
        <div class="max-w-2xl">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-audiogold-500 to-orange-600 p-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Create New User
                    </h2>
                    <p class="text-white/90 mt-2">Add a new admin user to the system</p>
                </div>

                <!-- Form -->
                <form @submit.prevent="submit" class="p-6 space-y-6">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            id="name"
                            v-model="form.name"
                            type="text"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-300"
                            placeholder="Enter full name"
                            required
                        />
                        <p v-if="form.errors.name" class="mt-2 text-sm text-red-600">
                            {{ form.errors.name }}
                        </p>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-300"
                            placeholder="user@example.com"
                            required
                        />
                        <p v-if="form.errors.email" class="mt-2 text-sm text-red-600">
                            {{ form.errors.email }}
                        </p>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-300"
                            placeholder="Enter secure password"
                            required
                        />
                        <p v-if="form.errors.password" class="mt-2 text-sm text-red-600">
                            {{ form.errors.password }}
                        </p>
                        <p class="mt-2 text-xs text-gray-500">
                            Password must be at least 8 characters long
                        </p>
                    </div>

                    <!-- Password Confirmation Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <input
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-300"
                            placeholder="Re-enter password"
                            required
                        />
                    </div>

                    <!-- Info Box -->
                    <div class="p-4 bg-blue-50 border border-blue-200 rounded-xl">
                        <div class="flex">
                            <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div class="text-sm text-blue-800">
                                <p class="font-semibold mb-1">User Account Information</p>
                                <p>New users will have full admin access and will be able to log in immediately after creation.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-4 pt-4">
                        <Link
                            :href="route('admin.users.index')"
                            class="px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-300 transition-colors duration-200"
                        >
                            Cancel
                        </Link>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-6 py-3 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 flex items-center"
                        >
                            <svg v-if="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <svg v-else class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span v-if="form.processing">Creating...</span>
                            <span v-else>Create User</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('admin.users.store'), {
        onSuccess: () => form.reset(),
    });
};
</script>
