<template>
    <Head title="Users Management - AudioGold Admin" />

    <AdminLayout page-title="Users Management">
        <!-- Success/Error Messages -->
        <div v-if="$page.props.flash?.success" class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-xl text-green-300 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $page.props.flash.success }}
        </div>

        <div v-if="$page.props.flash?.error" class="mb-6 p-4 bg-red-500/20 border border-red-500/30 rounded-xl text-red-300 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $page.props.flash.error }}
        </div>

        <!-- Header with Add Button -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">All Users</h2>
                <p class="text-gray-600">Manage admin users and their access</p>
            </div>
            <Link
                :href="route('admin.users.create')"
                class="flex items-center px-6 py-3 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New User
            </Link>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                User
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Joined Date
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-audiogold-500 to-orange-600 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white font-semibold text-sm">{{ getUserInitials(user.name) }}</span>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900">{{ user.name }}</div>
                                        <div v-if="user.id === $page.props.auth.user.id" class="text-xs text-audiogold-600 font-medium">
                                            (You)
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ user.email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-600">{{ formatDate(user.created_at) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <Link
                                        :href="route('admin.users.edit', user.id)"
                                        class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-200"
                                    >
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </Link>
                                    <button
                                        v-if="user.id !== $page.props.auth.user.id"
                                        @click="deleteUser(user.id)"
                                        class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-200"
                                    >
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            <div v-if="users.data.length === 0" class="p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No Users Found</h3>
                <p class="text-gray-600 mb-4">Get started by adding your first user</p>
                <Link
                    :href="route('admin.users.create')"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New User
                </Link>
            </div>
        </div>

        <!-- Pagination -->
        <div v-if="users.data.length > 0 && users.last_page > 1" class="mt-6 flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Showing {{ users.from }} to {{ users.to }} of {{ users.total }} users
            </div>
            <div class="flex space-x-2">
                <Link
                    v-for="link in users.links"
                    :key="link.label"
                    :href="link.url"
                    :class="[
                        'px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200',
                        link.active
                            ? 'bg-gradient-to-r from-audiogold-500 to-orange-600 text-white'
                            : link.url
                            ? 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'
                            : 'bg-gray-100 text-gray-400 cursor-not-allowed'
                    ]"
                    v-html="link.label"
                />
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

defineProps({
    users: {
        type: Object,
        required: true,
    },
});

const getUserInitials = (name) => {
    const parts = name.split(' ');
    if (parts.length >= 2) {
        return (parts[0][0] + parts[1][0]).toUpperCase();
    }
    return name.substring(0, 2).toUpperCase();
};

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
};

const deleteUser = (userId) => {
    if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
        router.delete(route('admin.users.destroy', userId));
    }
};
</script>
