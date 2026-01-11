<template>
    <Head title="Create Category - AudioGold Admin" />

    <AdminLayout page-title="Create Category">
        <div class="max-w-3xl">
            <!-- Back Button -->
            <Link
                :href="route('admin.categories.index')"
                class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-6 transition-colors duration-200"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Categories
            </Link>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                    <h2 class="text-2xl font-bold text-gray-900">Add New Category</h2>
                    <p class="text-gray-600 mt-1">Create a new product category or subcategory</p>
                </div>

                <form @submit.prevent="submitForm" class="px-8 py-6 space-y-6">
                    <!-- Category Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Category Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            v-model="form.name"
                            type="text"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                            placeholder="e.g., Booster Amplifiers"
                            required
                        />
                        <p v-if="errors.name" class="mt-2 text-sm text-red-600">{{ errors.name }}</p>
                    </div>

                    <!-- Slug -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Slug (URL-friendly name)
                        </label>
                        <input
                            v-model="form.slug"
                            type="text"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200 font-mono text-sm"
                            placeholder="e.g., booster-amplifiers (leave blank for auto-generation)"
                        />
                        <p class="mt-2 text-xs text-gray-500">If left blank, it will be automatically generated from the category name</p>
                        <p v-if="errors.slug" class="mt-2 text-sm text-red-600">{{ errors.slug }}</p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea
                            v-model="form.description"
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                            placeholder="Enter a brief description of this category..."
                        ></textarea>
                        <p v-if="errors.description" class="mt-2 text-sm text-red-600">{{ errors.description }}</p>
                    </div>

                    <!-- Image Upload/URL -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Category Image
                        </label>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Upload Image</label>
                            <input
                                @change="handleImageUpload"
                                type="file"
                                accept="image/*"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                            />
                            <p class="mt-2 text-xs text-gray-500">Upload an image (JPEG, PNG, GIF, WebP - Max: 2MB)</p>
                        </div>

                        <!-- OR Divider -->
                        <div class="relative my-4">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">OR</span>
                            </div>
                        </div>

                        <!-- Image URL -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Image URL</label>
                            <input
                                v-model="form.image_url"
                                type="url"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                placeholder="https://example.com/image.jpg"
                            />
                            <p class="mt-2 text-xs text-gray-500">Or enter a valid URL for the category image</p>
                        </div>

                        <!-- Image Preview -->
                        <div v-if="imagePreview" class="mt-4">
                            <p class="text-sm font-semibold text-gray-700 mb-2">Preview:</p>
                            <div class="w-48 h-48 rounded-lg overflow-hidden bg-gray-100 border-2 border-gray-200">
                                <img :src="imagePreview" alt="Preview" class="w-full h-full object-cover">
                            </div>
                        </div>

                        <p v-if="errors.image" class="mt-2 text-sm text-red-600">{{ errors.image }}</p>
                        <p v-if="errors.image_url" class="mt-2 text-sm text-red-600">{{ errors.image_url }}</p>
                    </div>

                    <!-- Icon SVG Path -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Icon SVG Path
                        </label>
                        <textarea
                            v-model="form.icon"
                            rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200 font-mono text-sm"
                            placeholder="M13 10V3L4 14h7v7l9-11h-7z"
                        ></textarea>
                        <p class="mt-2 text-xs text-gray-500">Enter the SVG path data for the category icon (optional)</p>
                        <p v-if="errors.icon" class="mt-2 text-sm text-red-600">{{ errors.icon }}</p>
                    </div>

                    <!-- Features -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Features
                        </label>
                        <div class="space-y-3">
                            <div v-for="(feature, index) in form.features" :key="index" class="flex items-center space-x-2">
                                <input
                                    v-model="form.features[index]"
                                    type="text"
                                    class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                    :placeholder="`Feature ${index + 1}`"
                                />
                                <button
                                    @click="removeFeature(index)"
                                    type="button"
                                    class="px-4 py-3 bg-red-100 hover:bg-red-200 text-red-700 rounded-xl transition-colors duration-200"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button
                            @click="addFeature"
                            type="button"
                            class="mt-3 inline-flex items-center px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-xl transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Feature
                        </button>
                        <p class="mt-2 text-xs text-gray-500">Add key features for this category</p>
                        <p v-if="errors.features" class="mt-2 text-sm text-red-600">{{ errors.features }}</p>
                    </div>

                    <!-- Parent Category -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Parent Category
                        </label>
                        <select
                            v-model="form.parent_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                        >
                            <option :value="null">None (This is a parent category)</option>
                            <option v-for="parent in parentCategories" :key="parent.id" :value="parent.id">
                                {{ parent.name }}
                            </option>
                        </select>
                        <p class="mt-2 text-xs text-gray-500">Select a parent category if this is a subcategory</p>
                        <p v-if="errors.parent_id" class="mt-2 text-sm text-red-600">{{ errors.parent_id }}</p>
                    </div>

                    <!-- Product Count -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Product Count
                        </label>
                        <input
                            v-model.number="form.product_count"
                            type="number"
                            min="0"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                            placeholder="0"
                        />
                        <p class="mt-2 text-xs text-gray-500">Number of products in this category</p>
                        <p v-if="errors.product_count" class="mt-2 text-sm text-red-600">{{ errors.product_count }}</p>
                    </div>

                    <!-- Order -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input
                            v-model.number="form.order"
                            type="number"
                            min="0"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                            placeholder="0"
                        />
                        <p class="mt-2 text-xs text-gray-500">Lower numbers appear first</p>
                        <p v-if="errors.order" class="mt-2 text-sm text-red-600">{{ errors.order }}</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="flex items-center cursor-pointer">
                            <input
                                v-model="form.is_active"
                                type="checkbox"
                                class="w-5 h-5 text-audiogold-500 border-gray-300 rounded focus:ring-2 focus:ring-audiogold-500 cursor-pointer"
                            />
                            <span class="ml-3 text-sm font-semibold text-gray-700">
                                Active (visible on website)
                            </span>
                        </label>
                        <p v-if="errors.is_active" class="mt-2 text-sm text-red-600">{{ errors.is_active }}</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <Link
                            :href="route('admin.categories.index')"
                            class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200"
                        >
                            Cancel
                        </Link>
                        <button
                            type="submit"
                            :disabled="processing"
                            class="px-6 py-3 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <span v-if="!processing">Create Category</span>
                            <span v-else class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Creating...
                            </span>
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
import { ref } from 'vue';

const props = defineProps({
    parentCategories: Array,
    errors: Object,
});

const form = useForm({
    name: '',
    slug: '',
    description: '',
    image: null,
    image_url: '',
    icon: '',
    features: [''],
    parent_id: null,
    product_count: 0,
    order: 0,
    is_active: true,
});

const processing = ref(false);
const imagePreview = ref(null);

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
        // Create preview
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
        // Clear URL if file is uploaded
        form.image_url = '';
    }
};

const addFeature = () => {
    form.features.push('');
};

const removeFeature = (index) => {
    if (form.features.length > 1) {
        form.features.splice(index, 1);
    }
};

const submitForm = () => {
    processing.value = true;
    form.post(route('admin.categories.store'), {
        onFinish: () => {
            processing.value = false;
        },
    });
};
</script>
