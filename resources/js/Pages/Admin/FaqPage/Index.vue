<template>
    <Head title="FAQ Page Settings - AudioGold Admin" />

    <AdminLayout page-title="FAQ Page Settings">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">FAQ Page Settings</h2>
            <p class="text-gray-600 mt-1">Manage your FAQ categories, questions, and page content</p>
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
            <!-- Hero Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Hero Section</h3>
                    <p class="text-sm text-gray-500">Configure the header area of the FAQ page</p>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge Text</label>
                        <input
                            v-model="form.hero_badge"
                            type="text"
                            :placeholder="defaults.hero_badge"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 1</label>
                            <input
                                v-model="form.hero_title_line1"
                                type="text"
                                :placeholder="defaults.hero_title_line1"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 2</label>
                            <input
                                v-model="form.hero_title_line2"
                                type="text"
                                :placeholder="defaults.hero_title_line2"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <textarea
                            v-model="form.hero_subtitle"
                            rows="2"
                            :placeholder="defaults.hero_subtitle"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- FAQ Categories -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">FAQ Categories (Tabs)</h3>
                            <p class="text-sm text-gray-500">Manage the category tabs shown on the FAQ page</p>
                        </div>
                        <button
                            type="button"
                            @click="addCategory"
                            class="px-4 py-2 bg-audiogold-500 text-white rounded-lg text-sm font-medium hover:bg-audiogold-600 transition-colors"
                        >
                            + Add Category
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div v-for="(category, index) in form.categories" :key="index"
                             class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl border border-gray-200">
                            <div class="flex-shrink-0 w-8 h-8 bg-audiogold-100 text-audiogold-700 rounded-lg flex items-center justify-center font-semibold text-sm">
                                {{ index + 1 }}
                            </div>
                            <input
                                v-model="category.id"
                                type="text"
                                placeholder="Category ID (e.g., about)"
                                class="w-32 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                            <input
                                v-model="category.name"
                                type="text"
                                placeholder="Category Name (e.g., About Us)"
                                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                            <button
                                type="button"
                                @click="removeCategory(index)"
                                class="text-red-500 hover:text-red-700 p-2"
                                :disabled="form.categories.length <= 1"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Questions & Answers -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">FAQ Questions & Answers</h3>
                    <p class="text-sm text-gray-500">Manage questions and answers for each category</p>
                </div>
                <div class="p-6">
                    <!-- Category Tabs for FAQs -->
                    <div class="flex gap-2 mb-6 overflow-x-auto pb-2">
                        <button
                            v-for="category in form.categories"
                            :key="category.id"
                            type="button"
                            @click="activeFaqCategory = category.id"
                            :class="[
                                'px-4 py-2 rounded-lg font-medium text-sm whitespace-nowrap transition-all',
                                activeFaqCategory === category.id
                                    ? 'bg-audiogold-500 text-white'
                                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                            ]"
                        >
                            {{ category.name }}
                            <span class="ml-1 text-xs opacity-75">({{ getFaqCount(category.id) }})</span>
                        </button>
                    </div>

                    <!-- FAQs for Selected Category -->
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <h4 class="font-semibold text-gray-700">
                                Questions in "{{ getActiveCategoryName() }}"
                            </h4>
                            <button
                                type="button"
                                @click="addFaq"
                                class="px-3 py-1.5 bg-green-500 text-white rounded-lg text-sm font-medium hover:bg-green-600 transition-colors"
                            >
                                + Add Question
                            </button>
                        </div>

                        <div v-if="getCurrentFaqs().length === 0" class="text-center py-8 text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p>No questions in this category yet.</p>
                            <button
                                type="button"
                                @click="addFaq"
                                class="mt-3 text-audiogold-600 font-medium hover:text-audiogold-700"
                            >
                                + Add your first question
                            </button>
                        </div>

                        <div v-for="(faq, index) in getCurrentFaqs()" :key="index"
                             class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-sm font-semibold text-gray-600">Question {{ index + 1 }}</span>
                                <button
                                    type="button"
                                    @click="removeFaq(index)"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Question</label>
                                    <input
                                        v-model="faq.question"
                                        type="text"
                                        placeholder="Enter the question..."
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Answer</label>
                                    <textarea
                                        v-model="faq.answer"
                                        rows="3"
                                        placeholder="Enter the answer..."
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                            <p class="text-sm text-gray-500">Action cards shown below the FAQs</p>
                        </div>
                        <button
                            type="button"
                            @click="addQuickAction"
                            class="px-4 py-2 bg-audiogold-500 text-white rounded-lg text-sm font-medium hover:bg-audiogold-600 transition-colors"
                        >
                            + Add Action
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div v-for="(action, index) in form.quick_actions" :key="index"
                             class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-sm font-semibold text-gray-600">Action {{ index + 1 }}</span>
                                <button
                                    type="button"
                                    @click="removeQuickAction(index)"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-3">
                                <input
                                    v-model="action.title"
                                    type="text"
                                    placeholder="Title"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <textarea
                                    v-model="action.description"
                                    rows="2"
                                    placeholder="Description"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                ></textarea>
                                <div class="grid grid-cols-2 gap-2">
                                    <input
                                        v-model="action.link_text"
                                        type="text"
                                        placeholder="Link Text"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                    <input
                                        v-model="action.link"
                                        type="text"
                                        placeholder="Link URL"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                </div>
                                <select
                                    v-model="action.gradient"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                >
                                    <option value="from-purple-500 to-pink-600">Purple/Pink</option>
                                    <option value="from-blue-500 to-cyan-600">Blue/Cyan</option>
                                    <option value="from-green-500 to-emerald-600">Green</option>
                                    <option value="from-orange-500 to-amber-600">Orange</option>
                                    <option value="from-red-500 to-rose-600">Red</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Call to Action</h3>
                    <p class="text-sm text-gray-500">Bottom banner section</p>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input
                            v-model="form.cta_title"
                            type="text"
                            :placeholder="defaults.cta_title"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <textarea
                            v-model="form.cta_subtitle"
                            rows="2"
                            :placeholder="defaults.cta_subtitle"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        ></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Text</label>
                                <input
                                    v-model="form.cta_primary_text"
                                    type="text"
                                    :placeholder="defaults.cta_primary_text"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Link</label>
                                <input
                                    v-model="form.cta_primary_link"
                                    type="text"
                                    :placeholder="defaults.cta_primary_link"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Text</label>
                                <input
                                    v-model="form.cta_secondary_text"
                                    type="text"
                                    :placeholder="defaults.cta_secondary_text"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Link</label>
                                <input
                                    v-model="form.cta_secondary_link"
                                    type="text"
                                    :placeholder="defaults.cta_secondary_link"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                        </div>
                    </div>
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
    faqSettings: Object,
    defaults: Object,
});

const activeFaqCategory = ref(props.faqSettings?.categories?.[0]?.id || props.defaults.categories[0].id);

const form = useForm({
    // Hero Section
    hero_badge: props.faqSettings?.hero_badge || '',
    hero_title_line1: props.faqSettings?.hero_title_line1 || '',
    hero_title_line2: props.faqSettings?.hero_title_line2 || '',
    hero_subtitle: props.faqSettings?.hero_subtitle || '',

    // Categories
    categories: props.faqSettings?.categories || JSON.parse(JSON.stringify(props.defaults.categories)),

    // FAQs
    faqs: props.faqSettings?.faqs || JSON.parse(JSON.stringify(props.defaults.faqs)),

    // Quick Actions
    quick_actions: props.faqSettings?.quick_actions || JSON.parse(JSON.stringify(props.defaults.quick_actions)),

    // CTA Section
    cta_title: props.faqSettings?.cta_title || '',
    cta_subtitle: props.faqSettings?.cta_subtitle || '',
    cta_primary_text: props.faqSettings?.cta_primary_text || '',
    cta_primary_link: props.faqSettings?.cta_primary_link || '',
    cta_secondary_text: props.faqSettings?.cta_secondary_text || '',
    cta_secondary_link: props.faqSettings?.cta_secondary_link || '',
});

const submitForm = () => {
    form.post(route('admin.faq-page.update'), {
        preserveScroll: true,
    });
};

const resetToDefaults = () => {
    if (confirm('Are you sure you want to reset all FAQ page settings to defaults? This action cannot be undone.')) {
        router.post(route('admin.faq-page.reset'), {}, {
            preserveScroll: true,
        });
    }
};

// Category management
const addCategory = () => {
    const newId = 'category_' + Date.now();
    form.categories.push({
        id: newId,
        name: 'New Category'
    });
    // Initialize empty FAQs array for the new category
    form.faqs[newId] = [];
};

const removeCategory = (index) => {
    if (form.categories.length <= 1) return;

    const categoryId = form.categories[index].id;

    // Remove FAQs for this category
    delete form.faqs[categoryId];

    // Remove the category
    form.categories.splice(index, 1);

    // If the active category was removed, switch to the first one
    if (activeFaqCategory.value === categoryId) {
        activeFaqCategory.value = form.categories[0].id;
    }
};

// FAQ management
const getActiveCategoryName = () => {
    const category = form.categories.find(c => c.id === activeFaqCategory.value);
    return category ? category.name : '';
};

const getCurrentFaqs = () => {
    return form.faqs[activeFaqCategory.value] || [];
};

const getFaqCount = (categoryId) => {
    return form.faqs[categoryId]?.length || 0;
};

const addFaq = () => {
    if (!form.faqs[activeFaqCategory.value]) {
        form.faqs[activeFaqCategory.value] = [];
    }
    form.faqs[activeFaqCategory.value].push({
        question: '',
        answer: ''
    });
};

const removeFaq = (index) => {
    form.faqs[activeFaqCategory.value].splice(index, 1);
};

// Quick Actions management
const addQuickAction = () => {
    form.quick_actions.push({
        title: '',
        description: '',
        link_text: '',
        link: '#',
        gradient: 'from-purple-500 to-pink-600',
        icon: 'headset'
    });
};

const removeQuickAction = (index) => {
    form.quick_actions.splice(index, 1);
};
</script>
