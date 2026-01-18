<template>
    <Head title="Footer Settings - AudioGold Admin" />

    <AdminLayout page-title="Footer Settings">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Footer Settings</h2>
            <p class="text-gray-600 mt-1">Manage your website footer content</p>
        </div>

        <!-- Success Message -->
        <div v-if="$page.props.flash?.success" class="mb-6">
            <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                    </svg>
                    <p class="text-green-800 font-medium">{{ $page.props.flash.success }}</p>
                </div>
            </div>
        </div>

        <form @submit.prevent="submitForm" class="space-y-8">
            <!-- Newsletter Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Newsletter Section</h3>
                    <p class="text-sm text-gray-500">Configure the newsletter subscription area</p>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Newsletter Title</label>
                        <input
                            v-model="form.newsletter_title"
                            type="text"
                            :placeholder="defaults.newsletter_title"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Newsletter Subtitle</label>
                        <input
                            v-model="form.newsletter_subtitle"
                            type="text"
                            :placeholder="defaults.newsletter_subtitle"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                </div>
            </div>

            <!-- Company Info Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Company Information</h3>
                    <p class="text-sm text-gray-500">Company description shown in footer</p>
                </div>
                <div class="p-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Company Description</label>
                    <textarea
                        v-model="form.company_description"
                        rows="3"
                        :placeholder="defaults.company_description"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                    ></textarea>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Social Media Links</h3>
                    <p class="text-sm text-gray-500">Enter your social media profile URLs</p>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                Facebook URL
                            </span>
                        </label>
                        <input
                            v-model="form.facebook_url"
                            type="text"
                            placeholder="https://facebook.com/yourpage"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                                Twitter URL
                            </span>
                        </label>
                        <input
                            v-model="form.twitter_url"
                            type="text"
                            placeholder="https://twitter.com/yourhandle"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                Instagram URL
                            </span>
                        </label>
                        <input
                            v-model="form.instagram_url"
                            type="text"
                            placeholder="https://instagram.com/yourprofile"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <span class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                </svg>
                                YouTube URL
                            </span>
                        </label>
                        <input
                            v-model="form.youtube_url"
                            type="text"
                            placeholder="https://youtube.com/yourchannel"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                </div>
            </div>

            <!-- Useful Links Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Useful Links</h3>
                    <p class="text-sm text-gray-500">Links shown in the footer navigation</p>
                </div>
                <div class="p-6 space-y-4">
                    <div v-for="(link, index) in form.useful_links" :key="index" class="flex gap-4 items-start">
                        <div class="flex-1">
                            <input
                                v-model="link.label"
                                type="text"
                                placeholder="Link Label (e.g., Home)"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div class="flex-1">
                            <input
                                v-model="link.url"
                                type="text"
                                placeholder="URL (e.g., /home or #section)"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <button
                            type="button"
                            @click="removeLink(index)"
                            class="px-3 py-2.5 text-red-600 hover:bg-red-100 rounded-xl transition-colors"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <button
                        type="button"
                        @click="addLink"
                        class="text-sm text-audiogold-600 hover:text-audiogold-700 font-medium flex items-center gap-1"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Link
                    </button>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Contact Information</h3>
                    <p class="text-sm text-gray-500">Your business contact details</p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input
                                v-model="form.contact_email"
                                type="email"
                                :placeholder="defaults.contact_email"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input
                                v-model="form.contact_phone"
                                type="text"
                                :placeholder="defaults.contact_phone"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Business Address</label>
                        <textarea
                            v-model="form.contact_address"
                            rows="2"
                            :placeholder="defaults.contact_address"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- Copyright Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Copyright Text</h3>
                    <p class="text-sm text-gray-500">Copyright notice shown at the bottom of footer</p>
                </div>
                <div class="p-6">
                    <input
                        v-model="form.copyright_text"
                        type="text"
                        :placeholder="defaults.copyright_text"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                    />
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center">
                <button
                    type="button"
                    @click="resetToDefaults"
                    class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors"
                >
                    Reset to Defaults
                </button>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="px-8 py-2.5 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-medium shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 disabled:opacity-50"
                >
                    <span v-if="form.processing">Saving...</span>
                    <span v-else>Save Changes</span>
                </button>
            </div>
        </form>
    </AdminLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const props = defineProps({
    footerSettings: Object,
    defaults: Object,
});

const form = useForm({
    newsletter_title: props.footerSettings?.newsletter_title || '',
    newsletter_subtitle: props.footerSettings?.newsletter_subtitle || '',
    company_description: props.footerSettings?.company_description || '',
    facebook_url: props.footerSettings?.facebook_url || '',
    twitter_url: props.footerSettings?.twitter_url || '',
    instagram_url: props.footerSettings?.instagram_url || '',
    youtube_url: props.footerSettings?.youtube_url || '',
    useful_links: props.footerSettings?.useful_links?.length > 0
        ? [...props.footerSettings.useful_links]
        : [{ label: '', url: '' }],
    contact_email: props.footerSettings?.contact_email || '',
    contact_phone: props.footerSettings?.contact_phone || '',
    contact_address: props.footerSettings?.contact_address || '',
    copyright_text: props.footerSettings?.copyright_text || '',
});

const addLink = () => {
    form.useful_links.push({ label: '', url: '' });
};

const removeLink = (index) => {
    form.useful_links.splice(index, 1);
    if (form.useful_links.length === 0) {
        form.useful_links.push({ label: '', url: '' });
    }
};

const submitForm = () => {
    form.post(route('admin.footer.update'), {
        preserveScroll: true,
    });
};

const resetToDefaults = () => {
    if (confirm('Are you sure you want to reset all footer settings to defaults? This action cannot be undone.')) {
        router.post(route('admin.footer.reset'), {}, {
            preserveScroll: true,
        });
    }
};
</script>
