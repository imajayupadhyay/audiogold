<template>
    <Head title="Homepage Management - AudioGold Admin" />

    <AdminLayout page-title="Homepage Management">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Homepage Management</h2>
            <p class="text-gray-600 mt-1">Manage your homepage hero section slides</p>
        </div>

        <!-- Hero Slides Section -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200 flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Hero Slides</h3>
                    <p class="text-sm text-gray-500">Manage the slides shown in the hero section</p>
                </div>
                <button
                    @click="openCreateModal"
                    class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Slide
                </button>
            </div>

            <!-- Slides List -->
            <div class="divide-y divide-gray-200">
                <div v-for="slide in heroSlides" :key="slide.id" class="p-6 hover:bg-gray-50 transition-colors duration-200">
                    <div class="flex items-start gap-6">
                        <!-- Image Preview -->
                        <div class="w-48 h-28 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                            <img v-if="slide.image" :src="slide.image" :alt="slide.title" class="w-full h-full object-cover" />
                            <div v-else class="w-full h-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Slide Content -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-2">
                                <span v-if="slide.badge" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-audiogold-100 text-audiogold-800">
                                    {{ slide.badge }}
                                </span>
                                <span :class="slide.is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                    {{ slide.is_active ? 'Active' : 'Inactive' }}
                                </span>
                                <span class="text-xs text-gray-500">Order: {{ slide.order }}</span>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900">{{ slide.title }}</h4>
                            <p class="text-audiogold-600 font-medium">{{ slide.subtitle }}</p>
                            <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ slide.description }}</p>
                            <div v-if="slide.features && slide.features.length > 0" class="flex flex-wrap gap-2 mt-2">
                                <span v-for="(feature, index) in slide.features.slice(0, 3)" :key="index" class="text-xs bg-gray-100 text-gray-700 px-2 py-1 rounded">
                                    {{ feature }}
                                </span>
                                <span v-if="slide.features.length > 3" class="text-xs text-gray-500">
                                    +{{ slide.features.length - 3 }} more
                                </span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center gap-2">
                            <button
                                @click="openEditModal(slide)"
                                class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-200 text-sm font-medium"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </button>
                            <button
                                @click="deleteSlide(slide.id)"
                                class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-200 text-sm font-medium"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-if="heroSlides.length === 0" class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No hero slides yet</h3>
                    <p class="text-gray-600 mb-6">Get started by adding your first hero slide</p>
                    <button
                        @click="openCreateModal"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Your First Slide
                    </button>
                </div>
            </div>
        </div>

        <!-- Create/Edit Modal -->
        <div v-if="showModal" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="closeModal"></div>

                <div class="relative bg-white rounded-2xl shadow-xl transform transition-all sm:max-w-2xl sm:w-full mx-4 max-h-[90vh] overflow-y-auto">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10">
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ editingSlide ? 'Edit Hero Slide' : 'Add New Hero Slide' }}
                        </h3>
                        <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form @submit.prevent="submitForm" class="p-6 space-y-6">
                        <!-- Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Background Image</label>
                            <div class="flex items-start gap-4">
                                <div class="w-40 h-24 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                    <img v-if="imagePreview || form.existing_image" :src="imagePreview || form.existing_image" class="w-full h-full object-cover" />
                                    <div v-else class="w-full h-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 space-y-2">
                                    <input
                                        type="file"
                                        @change="handleImageUpload"
                                        accept="image/*"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-audiogold-100 file:text-audiogold-700 hover:file:bg-audiogold-200"
                                    />
                                    <p class="text-xs text-gray-500">Or enter an image URL:</p>
                                    <input
                                        v-model="form.image_url"
                                        type="url"
                                        placeholder="https://example.com/image.jpg"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Badge -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Badge Text</label>
                            <input
                                v-model="form.badge"
                                type="text"
                                placeholder="e.g., Premium Audio Equipment"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>

                        <!-- Title & Subtitle -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                                <input
                                    v-model="form.title"
                                    type="text"
                                    required
                                    placeholder="e.g., Experience"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle <span class="text-red-500">*</span></label>
                                <input
                                    v-model="form.subtitle"
                                    type="text"
                                    required
                                    placeholder="e.g., Crystal Clear Sound"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea
                                v-model="form.description"
                                rows="3"
                                placeholder="Enter a brief description..."
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            ></textarea>
                        </div>

                        <!-- Features -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Features</label>
                            <div class="space-y-2">
                                <div v-for="(feature, index) in form.features" :key="index" class="flex gap-2">
                                    <input
                                        v-model="form.features[index]"
                                        type="text"
                                        placeholder="Enter a feature..."
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                    <button
                                        type="button"
                                        @click="removeFeature(index)"
                                        class="px-3 py-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <button
                                    type="button"
                                    @click="addFeature"
                                    class="text-sm text-audiogold-600 hover:text-audiogold-700 font-medium flex items-center gap-1"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Feature
                                </button>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Text</label>
                                <input
                                    v-model="form.button_text"
                                    type="text"
                                    placeholder="Explore Products"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Link</label>
                                <input
                                    v-model="form.button_link"
                                    type="text"
                                    placeholder="/products"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Text</label>
                                <input
                                    v-model="form.secondary_button_text"
                                    type="text"
                                    placeholder="Get in Touch"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Link</label>
                                <input
                                    v-model="form.secondary_button_link"
                                    type="text"
                                    placeholder="/contact"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                        </div>

                        <!-- Order & Status -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input
                                    v-model="form.order"
                                    type="number"
                                    min="0"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input
                                        v-model="form.is_active"
                                        type="checkbox"
                                        class="w-5 h-5 text-audiogold-600 border-gray-300 rounded focus:ring-audiogold-500"
                                    />
                                    <span class="text-gray-700">Active</span>
                                </label>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                            <button
                                type="button"
                                @click="closeModal"
                                class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors"
                            >
                                Cancel
                            </button>
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="px-6 py-2.5 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-medium shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 disabled:opacity-50"
                            >
                                {{ editingSlide ? 'Update Slide' : 'Create Slide' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const props = defineProps({
    heroSlides: Array,
});

const showModal = ref(false);
const editingSlide = ref(null);
const imagePreview = ref(null);

const form = useForm({
    image: null,
    image_url: '',
    existing_image: '',
    badge: '',
    title: '',
    subtitle: '',
    description: '',
    features: [''],
    button_text: 'Explore Products',
    button_link: '/products',
    secondary_button_text: 'Get in Touch',
    secondary_button_link: '/contact',
    order: 0,
    is_active: true,
});

const resetForm = () => {
    form.reset();
    form.features = [''];
    imagePreview.value = null;
    editingSlide.value = null;
};

const openCreateModal = () => {
    resetForm();
    showModal.value = true;
};

const openEditModal = (slide) => {
    editingSlide.value = slide;
    form.badge = slide.badge || '';
    form.title = slide.title;
    form.subtitle = slide.subtitle;
    form.description = slide.description || '';
    form.features = slide.features && slide.features.length > 0 ? [...slide.features] : [''];
    form.button_text = slide.button_text || 'Explore Products';
    form.button_link = slide.button_link || '/products';
    form.secondary_button_text = slide.secondary_button_text || '';
    form.secondary_button_link = slide.secondary_button_link || '';
    form.order = slide.order || 0;
    form.is_active = slide.is_active;
    form.existing_image = slide.image || '';
    imagePreview.value = null;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    resetForm();
};

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
        imagePreview.value = URL.createObjectURL(file);
    }
};

const addFeature = () => {
    form.features.push('');
};

const removeFeature = (index) => {
    form.features.splice(index, 1);
    if (form.features.length === 0) {
        form.features.push('');
    }
};

const submitForm = () => {
    if (editingSlide.value) {
        form.post(route('admin.homepage.hero-slides.update', editingSlide.value.id), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        });
    } else {
        form.post(route('admin.homepage.hero-slides.store'), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        });
    }
};

const deleteSlide = (id) => {
    if (confirm('Are you sure you want to delete this slide? This action cannot be undone.')) {
        router.delete(route('admin.homepage.hero-slides.destroy', id));
    }
};
</script>
