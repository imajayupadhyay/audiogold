<template>
    <Head title="Inquiries - AudioGold Admin" />

    <AdminLayout page-title="Contact Inquiries">
        <!-- Success Message -->
        <div v-if="$page.props.flash?.success" class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-xl text-green-300 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $page.props.flash.success }}
        </div>

        <!-- Filters -->
        <div class="mb-6 bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                    <input
                        v-model="filterForm.search"
                        type="text"
                        placeholder="Search inquiries..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-audiogold-500 focus:border-transparent"
                    />
                </div>

                <!-- Source Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Source</label>
                    <select
                        v-model="filterForm.source"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-audiogold-500 focus:border-transparent"
                    >
                        <option value="">All Sources</option>
                        <option value="contact">Contact Page</option>
                        <option value="support">Support Page</option>
                        <option value="home">Home Page</option>
                    </select>
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select
                        v-model="filterForm.status"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-audiogold-500 focus:border-transparent"
                    >
                        <option value="">All Status</option>
                        <option value="unread">Unread</option>
                        <option value="read">Read</option>
                    </select>
                </div>

                <!-- Apply Button -->
                <div class="flex items-end">
                    <button
                        @click="applyFilters"
                        class="w-full px-6 py-2 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all duration-300"
                    >
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Total Inquiries</p>
                        <p class="text-3xl font-bold text-gray-900">{{ inquiries.total }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Unread</p>
                        <p class="text-3xl font-bold text-orange-600">{{ unreadCount }}</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 mb-1">Read</p>
                        <p class="text-3xl font-bold text-green-600">{{ readCount }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inquiries Table -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Name & Email
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Phone
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Message
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Source
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="inquiry in inquiries.data" :key="inquiry.id" :class="{'bg-blue-50/30': !inquiry.is_read}" class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span v-if="!inquiry.is_read" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                    <span class="w-2 h-2 bg-orange-500 rounded-full mr-1.5 animate-pulse"></span>
                                    Unread
                                </span>
                                <span v-else class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Read
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900">{{ inquiry.first_name }}</div>
                                <div class="text-sm text-gray-600">{{ inquiry.email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ inquiry.phone || 'N/A' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600 truncate max-w-xs">
                                    {{ inquiry.message || 'No message' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                      :class="{
                                          'bg-purple-100 text-purple-800': inquiry.page_source === 'contact',
                                          'bg-blue-100 text-blue-800': inquiry.page_source === 'support',
                                          'bg-green-100 text-green-800': inquiry.page_source === 'home'
                                      }">
                                    {{ inquiry.page_source.charAt(0).toUpperCase() + inquiry.page_source.slice(1) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ formatDate(inquiry.created_at) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <Link
                                        :href="route('admin.inquiries.show', inquiry.id)"
                                        class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-200"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </Link>
                                    <button
                                        @click="deleteInquiry(inquiry.id)"
                                        class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-200"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            <div v-if="inquiries.data.length === 0" class="p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No Inquiries Found</h3>
                <p class="text-gray-600">No contact inquiries match your search criteria</p>
            </div>
        </div>

        <!-- Pagination -->
        <div v-if="inquiries.data.length > 0 && inquiries.last_page > 1" class="mt-6 flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Showing {{ inquiries.from }} to {{ inquiries.to }} of {{ inquiries.total }} inquiries
            </div>
            <div class="flex space-x-2">
                <Link
                    v-for="link in inquiries.links"
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
import { ref, computed } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const props = defineProps({
    inquiries: {
        type: Object,
        required: true,
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
});

const filterForm = ref({
    search: props.filters.search || '',
    source: props.filters.source || '',
    status: props.filters.status || '',
});

const unreadCount = computed(() => {
    return props.inquiries.data.filter(i => !i.is_read).length;
});

const readCount = computed(() => {
    return props.inquiries.data.filter(i => i.is_read).length;
});

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
};

const applyFilters = () => {
    router.get(route('admin.inquiries.index'), filterForm.value, {
        preserveState: true,
        preserveScroll: true,
    });
};

const deleteInquiry = (id) => {
    if (confirm('Are you sure you want to delete this inquiry? This action cannot be undone.')) {
        router.delete(route('admin.inquiries.destroy', id));
    }
};
</script>
