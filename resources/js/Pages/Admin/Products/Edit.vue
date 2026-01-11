<template>
    <Head :title="`Edit ${product.name} - AudioGold Admin`" />

    <AdminLayout page-title="Edit Product">
        <div class="max-w-5xl">
            <!-- Back Button -->
            <Link
                :href="route('admin.products.index')"
                class="inline-flex items-center text-gray-600 hover:text-gray-900 mb-6 transition-colors duration-200"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Products
            </Link>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                    <h2 class="text-2xl font-bold text-gray-900">Edit Product</h2>
                    <p class="text-gray-600 mt-1">Update product information</p>
                </div>

                <form @submit.prevent="submitForm" class="px-8 py-6 space-y-8">
                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            Basic Information
                        </h3>

                        <!-- Product Name -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Product Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                v-model="form.name"
                                type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                placeholder="e.g., AGP-2500 Class AB Power Amplifier"
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
                                placeholder="e.g., agp-2500-class-ab (leave blank for auto-generation)"
                            />
                            <p class="mt-2 text-xs text-gray-500">If left blank, it will be automatically generated from the product name</p>
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
                                placeholder="Enter a detailed description of this product..."
                            ></textarea>
                            <p v-if="errors.description" class="mt-2 text-sm text-red-600">{{ errors.description }}</p>
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <select
                                v-model="form.category_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                required
                            >
                                <option :value="null">Select a category</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">
                                    {{ category.name }}
                                </option>
                            </select>
                            <p v-if="errors.category_id" class="mt-2 text-sm text-red-600">{{ errors.category_id }}</p>
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
                    </div>

                    <!-- Images Section -->
                    <div class="space-y-6 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                            </svg>
                            Product Images
                        </h3>

                        <!-- Existing Images -->
                        <div v-if="existingImages.length > 0">
                            <label class="block text-sm font-medium text-gray-600 mb-2">Current Images</label>
                            <div class="grid grid-cols-4 gap-4">
                                <div v-for="(image, index) in existingImages" :key="index" class="relative w-full aspect-square rounded-lg overflow-hidden bg-gray-100 border-2 border-gray-200">
                                    <img :src="image" alt="Product" class="w-full h-full object-cover">
                                    <button
                                        @click="removeExistingImage(index)"
                                        type="button"
                                        class="absolute top-1 right-1 p-1.5 bg-red-500 hover:bg-red-600 text-white rounded-full transition-colors duration-200 shadow-lg"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Upload New Images</label>
                            <input
                                @change="handleImageUpload"
                                type="file"
                                accept="image/*"
                                multiple
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                            />
                            <p class="mt-2 text-xs text-gray-500">Upload multiple images (JPEG, PNG, GIF, WebP - Max: 2MB each)</p>
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

                        <!-- Image URLs -->
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Add Image URLs</label>
                            <div class="space-y-3">
                                <div v-for="(url, index) in form.image_urls" :key="index" class="flex items-center space-x-2">
                                    <input
                                        v-model="form.image_urls[index]"
                                        type="url"
                                        class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                        placeholder="https://example.com/image.jpg"
                                    />
                                    <button
                                        @click="removeImageUrl(index)"
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
                                @click="addImageUrl"
                                type="button"
                                class="mt-3 inline-flex items-center px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-xl transition-colors duration-200"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Image URL
                            </button>
                        </div>

                        <!-- New Image Previews -->
                        <div v-if="imagePreviews.length > 0" class="mt-4">
                            <p class="text-sm font-semibold text-gray-700 mb-2">New Images Preview:</p>
                            <div class="grid grid-cols-4 gap-4">
                                <div v-for="(preview, index) in imagePreviews" :key="index" class="relative w-full aspect-square rounded-lg overflow-hidden bg-gray-100 border-2 border-green-300">
                                    <img :src="preview" alt="Preview" class="w-full h-full object-cover">
                                    <span class="absolute top-1 left-1 px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded">New</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Features Section -->
                    <div class="space-y-6 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Key Features
                        </h3>

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
                            class="inline-flex items-center px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-xl transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Feature
                        </button>
                    </div>

                    <!-- Specifications Section -->
                    <div class="space-y-6 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            </svg>
                            Technical Specifications
                        </h3>

                        <div class="space-y-3">
                            <div v-for="(spec, index) in form.specifications" :key="index" class="flex items-center space-x-2">
                                <input
                                    v-model="form.specifications[index].label"
                                    type="text"
                                    class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Label (e.g., Power Output)"
                                />
                                <input
                                    v-model="form.specifications[index].value"
                                    type="text"
                                    class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Value (e.g., 2500W)"
                                />
                                <button
                                    @click="removeSpecification(index)"
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
                            @click="addSpecification"
                            type="button"
                            class="inline-flex items-center px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-xl transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Specification
                        </button>
                    </div>

                    <!-- FAQs Section -->
                    <div class="space-y-6 pt-6 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                            </svg>
                            Frequently Asked Questions
                        </h3>

                        <div class="space-y-4">
                            <div v-for="(faq, index) in form.faqs" :key="index" class="p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <div class="space-y-3">
                                    <div class="flex items-start justify-between">
                                        <label class="text-sm font-medium text-gray-700">Question {{ index + 1 }}</label>
                                        <button
                                            @click="removeFaq(index)"
                                            type="button"
                                            class="p-1 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-200"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <input
                                        v-model="form.faqs[index].question"
                                        type="text"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                        placeholder="Enter question"
                                    />
                                    <textarea
                                        v-model="form.faqs[index].answer"
                                        rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-transparent transition-all duration-200"
                                        placeholder="Enter answer"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <button
                            @click="addFaq"
                            type="button"
                            class="inline-flex items-center px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-xl transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add FAQ
                        </button>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <Link
                            :href="route('admin.products.index')"
                            class="px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200"
                        >
                            Cancel
                        </Link>
                        <button
                            type="submit"
                            :disabled="processing"
                            class="px-6 py-3 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <span v-if="!processing">Update Product</span>
                            <span v-else class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Updating...
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
    product: Object,
    categories: Array,
    errors: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.product.name,
    slug: props.product.slug,
    description: props.product.description || '',
    category_id: props.product.category_id,
    images: null,
    image_urls: [''],
    existing_images: props.product.images || [],
    features: props.product.features && props.product.features.length > 0 ? props.product.features : [''],
    specifications: props.product.specifications && props.product.specifications.length > 0 ? props.product.specifications : [{ label: '', value: '' }],
    faqs: props.product.faqs && props.product.faqs.length > 0 ? props.product.faqs : [{ question: '', answer: '' }],
    order: props.product.order,
    is_active: props.product.is_active,
});

const processing = ref(false);
const imagePreviews = ref([]);
const existingImages = ref(props.product.images || []);

const handleImageUpload = (event) => {
    const files = event.target.files;
    if (files) {
        form.images = files;

        // Create previews
        imagePreviews.value = [];
        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreviews.value.push(e.target.result);
            };
            reader.readAsDataURL(files[i]);
        }
    }
};

const removeExistingImage = (index) => {
    existingImages.value.splice(index, 1);
    form.existing_images = existingImages.value;
};

const addImageUrl = () => {
    form.image_urls.push('');
};

const removeImageUrl = (index) => {
    if (form.image_urls.length > 1) {
        form.image_urls.splice(index, 1);
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

const addSpecification = () => {
    form.specifications.push({ label: '', value: '' });
};

const removeSpecification = (index) => {
    if (form.specifications.length > 1) {
        form.specifications.splice(index, 1);
    }
};

const addFaq = () => {
    form.faqs.push({ question: '', answer: '' });
};

const removeFaq = (index) => {
    if (form.faqs.length > 1) {
        form.faqs.splice(index, 1);
    }
};

const submitForm = () => {
    processing.value = true;
    form.post(route('admin.products.update', props.product.id), {
        onFinish: () => {
            processing.value = false;
        },
    });
};
</script>
