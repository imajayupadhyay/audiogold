<template>
    <Head title="View Inquiry - AudioGold Admin" />

    <AdminLayout page-title="Inquiry Details">
        <!-- Back Button -->
        <div class="mb-6">
            <Link
                :href="route('admin.inquiries.index')"
                class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors duration-200"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Inquiries
            </Link>
        </div>

        <!-- Inquiry Details Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 to-cyan-600 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2">{{ inquiry.first_name }}</h2>
                        <p class="text-white/90">Submitted on {{ formatDate(inquiry.created_at) }}</p>
                    </div>
                    <div>
                        <span v-if="!inquiry.is_read" class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-white/20 text-white backdrop-blur-sm">
                            <span class="w-2 h-2 bg-white rounded-full mr-2 animate-pulse"></span>
                            Unread
                        </span>
                        <span v-else class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-white/20 text-white backdrop-blur-sm">
                            Read
                        </span>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-6">
                <!-- Contact Information -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                            <div class="px-4 py-3 bg-gray-50 rounded-lg">
                                <p class="text-gray-900">{{ inquiry.first_name }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                            <div class="px-4 py-3 bg-gray-50 rounded-lg">
                                <a :href="'mailto:' + inquiry.email" class="text-blue-600 hover:text-blue-700">
                                    {{ inquiry.email }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <div class="px-4 py-3 bg-gray-50 rounded-lg">
                                <a v-if="inquiry.phone" :href="'tel:' + inquiry.phone" class="text-blue-600 hover:text-blue-700">
                                    {{ inquiry.phone }}
                                </a>
                                <span v-else class="text-gray-500">Not provided</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Source Page</label>
                            <div class="px-4 py-3 bg-gray-50 rounded-lg">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                      :class="{
                                          'bg-purple-100 text-purple-800': inquiry.page_source === 'contact',
                                          'bg-blue-100 text-blue-800': inquiry.page_source === 'support',
                                          'bg-green-100 text-green-800': inquiry.page_source === 'home'
                                      }">
                                    {{ inquiry.page_source.charAt(0).toUpperCase() + inquiry.page_source.slice(1) }} Page
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                    <div class="px-6 py-4 bg-gray-50 rounded-lg">
                        <p v-if="inquiry.message" class="text-gray-900 whitespace-pre-wrap">{{ inquiry.message }}</p>
                        <p v-else class="text-gray-500 italic">No message provided</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <div class="flex items-center space-x-3">
                        <a
                            :href="'mailto:' + inquiry.email"
                            class="inline-flex items-center px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Reply via Email
                        </a>

                        <a
                            v-if="inquiry.phone"
                            :href="'tel:' + inquiry.phone"
                            class="inline-flex items-center px-6 py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg font-semibold transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            Call
                        </a>
                    </div>

                    <button
                        @click="deleteInquiry"
                        class="inline-flex items-center px-6 py-3 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg font-semibold transition-colors duration-200"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Inquiry
                    </button>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const props = defineProps({
    inquiry: {
        type: Object,
        required: true,
    },
});

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
};

const deleteInquiry = () => {
    if (confirm('Are you sure you want to delete this inquiry? This action cannot be undone.')) {
        router.delete(route('admin.inquiries.destroy', props.inquiry.id), {
            onSuccess: () => {
                router.visit(route('admin.inquiries.index'));
            }
        });
    }
};
</script>
