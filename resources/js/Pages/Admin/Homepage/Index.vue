<template>
    <Head title="Homepage Management - AudioGold Admin" />

    <AdminLayout page-title="Homepage Management">
        <!-- Success Message -->
        <transition
            enter-active-class="transition ease-out duration-300"
            enter-from-class="transform opacity-0 -translate-y-2"
            enter-to-class="transform opacity-100 translate-y-0"
            leave-active-class="transition ease-in duration-200"
            leave-from-class="transform opacity-100 translate-y-0"
            leave-to-class="transform opacity-0 -translate-y-2"
        >
            <div v-if="showSuccessMessage" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <p class="text-green-800 font-medium">{{ successMessageText }}</p>
                <button @click="showSuccessMessage = false" class="ml-auto text-green-600 hover:text-green-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </transition>

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Homepage Management</h2>
            <p class="text-gray-600 mt-1">Manage all sections of your homepage</p>
        </div>

        <!-- Tabs -->
        <div class="mb-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 overflow-x-auto">
                    <button
                        v-for="tab in tabs"
                        :key="tab.id"
                        @click="activeTab = tab.id"
                        :class="[
                            activeTab === tab.id
                                ? 'border-audiogold-500 text-audiogold-600'
                                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                            'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm'
                        ]"
                    >
                        {{ tab.name }}
                    </button>
                </nav>
            </div>
        </div>

        <!-- Hero Slides Section -->
        <div v-show="activeTab === 'hero'" class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
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
                        <div class="w-48 h-28 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                            <img v-if="slide.image" :src="slide.image" :alt="slide.title" class="w-full h-full object-cover" />
                            <div v-else class="w-full h-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-2">
                                <span v-if="slide.badge" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-audiogold-100 text-audiogold-800">
                                    {{ slide.badge }}
                                </span>
                                <span :class="slide.is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                    {{ slide.is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                            <h4 class="text-lg font-semibold text-gray-900">{{ slide.title }}</h4>
                            <p class="text-audiogold-600 font-medium">{{ slide.subtitle }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button @click="openEditModal(slide)" class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-200 text-sm font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </button>
                            <button @click="deleteSlide(slide.id)" class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-200 text-sm font-medium">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div v-if="heroSlides.length === 0" class="text-center py-12">
                    <p class="text-gray-600">No hero slides yet. Add your first slide.</p>
                </div>
            </div>
        </div>

        <!-- About Section Settings -->
        <div v-show="activeTab === 'about'" class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">About Section</h3>
                <p class="text-sm text-gray-500">Customize the About section on your homepage</p>
            </div>
            <form @submit.prevent="submitSettingsForm" class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge Text</label>
                        <input v-model="settingsForm.about_badge" type="text" :placeholder="defaults.about_badge" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 1</label>
                        <input v-model="settingsForm.about_title_line1" type="text" :placeholder="defaults.about_title_line1" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 2</label>
                        <input v-model="settingsForm.about_title_line2" type="text" :placeholder="defaults.about_title_line2" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input v-model="settingsForm.about_subtitle" type="text" :placeholder="defaults.about_subtitle" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mission Title</label>
                        <input v-model="settingsForm.about_mission_title" type="text" :placeholder="defaults.about_mission_title" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mission Text</label>
                        <input v-model="settingsForm.about_mission_text" type="text" :placeholder="defaults.about_mission_text" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Story Paragraph 1</label>
                    <textarea v-model="settingsForm.about_story_paragraph1" rows="3" :placeholder="defaults.about_story_paragraph1" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Story Paragraph 2</label>
                    <textarea v-model="settingsForm.about_story_paragraph2" rows="3" :placeholder="defaults.about_story_paragraph2" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CTA Title</label>
                        <input v-model="settingsForm.about_cta_title" type="text" :placeholder="defaults.about_cta_title" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CTA Subtitle</label>
                        <input v-model="settingsForm.about_cta_subtitle" type="text" :placeholder="defaults.about_cta_subtitle" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Text</label>
                        <input v-model="settingsForm.about_cta_primary_text" type="text" :placeholder="defaults.about_cta_primary_text" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Link</label>
                        <input v-model="settingsForm.about_cta_primary_link" type="text" :placeholder="defaults.about_cta_primary_link" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Text</label>
                        <input v-model="settingsForm.about_cta_secondary_text" type="text" :placeholder="defaults.about_cta_secondary_text" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Link</label>
                        <input v-model="settingsForm.about_cta_secondary_link" type="text" :placeholder="defaults.about_cta_secondary_link" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" @click="resetSettings" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors">Reset to Defaults</button>
                    <button type="submit" :disabled="settingsForm.processing" class="px-6 py-2.5 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-medium shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 disabled:opacity-50">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Why Choose Section Settings -->
        <div v-show="activeTab === 'why'" class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Why Choose Us Section</h3>
                <p class="text-sm text-gray-500">Customize the Why Choose Us section on your homepage</p>
            </div>
            <form @submit.prevent="submitSettingsForm" class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge Text</label>
                        <input v-model="settingsForm.why_badge" type="text" :placeholder="defaults.why_badge" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input v-model="settingsForm.why_subtitle" type="text" :placeholder="defaults.why_subtitle" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 1</label>
                        <input v-model="settingsForm.why_title_line1" type="text" :placeholder="defaults.why_title_line1" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 2</label>
                        <input v-model="settingsForm.why_title_line2" type="text" :placeholder="defaults.why_title_line2" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>

                <!-- Stats -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">Statistics</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div v-for="(stat, index) in settingsForm.why_stats" :key="index" class="p-4 border border-gray-200 rounded-xl">
                            <input v-model="stat.value" type="text" placeholder="Value (e.g., 1000+)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm mb-2 focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            <input v-model="stat.label" type="text" placeholder="Label (e.g., Happy Customers)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" @click="resetSettings" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors">Reset to Defaults</button>
                    <button type="submit" :disabled="settingsForm.processing" class="px-6 py-2.5 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-medium shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 disabled:opacity-50">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Dealer Section Settings -->
        <div v-show="activeTab === 'dealer'" class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Dealer Section</h3>
                <p class="text-sm text-gray-500">Customize the Become a Dealer section on your homepage</p>
            </div>
            <form @submit.prevent="submitSettingsForm" class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge Text</label>
                        <input v-model="settingsForm.dealer_badge" type="text" :placeholder="defaults.dealer_badge" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input v-model="settingsForm.dealer_subtitle" type="text" :placeholder="defaults.dealer_subtitle" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 1</label>
                        <input v-model="settingsForm.dealer_title_line1" type="text" :placeholder="defaults.dealer_title_line1" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 2</label>
                        <input v-model="settingsForm.dealer_title_line2" type="text" :placeholder="defaults.dealer_title_line2" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>

                <!-- Benefits -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-4">Benefits</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div v-for="(benefit, index) in settingsForm.dealer_benefits" :key="index" class="p-4 border border-gray-200 rounded-xl">
                            <input v-model="benefit.title" type="text" placeholder="Title" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm mb-2 focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            <textarea v-model="benefit.description" placeholder="Description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"></textarea>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CTA Title</label>
                        <input v-model="settingsForm.dealer_cta_title" type="text" :placeholder="defaults.dealer_cta_title" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CTA Subtitle</label>
                        <input v-model="settingsForm.dealer_cta_subtitle" type="text" :placeholder="defaults.dealer_cta_subtitle" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Text</label>
                        <input v-model="settingsForm.dealer_cta_primary_text" type="text" :placeholder="defaults.dealer_cta_primary_text" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Link</label>
                        <input v-model="settingsForm.dealer_cta_primary_link" type="text" :placeholder="defaults.dealer_cta_primary_link" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Text</label>
                        <input v-model="settingsForm.dealer_cta_secondary_text" type="text" :placeholder="defaults.dealer_cta_secondary_text" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Link</label>
                        <input v-model="settingsForm.dealer_cta_secondary_link" type="text" :placeholder="defaults.dealer_cta_secondary_link" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" @click="resetSettings" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors">Reset to Defaults</button>
                    <button type="submit" :disabled="settingsForm.processing" class="px-6 py-2.5 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-medium shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 disabled:opacity-50">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Contact Section Settings -->
        <div v-show="activeTab === 'contact'" class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Contact Section</h3>
                <p class="text-sm text-gray-500">Customize the Contact section on your homepage</p>
            </div>
            <form @submit.prevent="submitSettingsForm" class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Badge Text</label>
                        <input v-model="settingsForm.contact_badge" type="text" :placeholder="defaults.contact_badge" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input v-model="settingsForm.contact_subtitle" type="text" :placeholder="defaults.contact_subtitle" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 1</label>
                        <input v-model="settingsForm.contact_title_line1" type="text" :placeholder="defaults.contact_title_line1" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title Line 2</label>
                        <input v-model="settingsForm.contact_title_line2" type="text" :placeholder="defaults.contact_title_line2" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input v-model="settingsForm.contact_email" type="email" :placeholder="defaults.contact_email" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <input v-model="settingsForm.contact_phone" type="text" :placeholder="defaults.contact_phone" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp</label>
                        <input v-model="settingsForm.contact_whatsapp" type="text" :placeholder="defaults.contact_whatsapp" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Timing Days</label>
                        <input v-model="settingsForm.contact_timing_days" type="text" :placeholder="defaults.contact_timing_days" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Timing Hours</label>
                        <input v-model="settingsForm.contact_timing_hours" type="text" :placeholder="defaults.contact_timing_hours" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                    <textarea v-model="settingsForm.contact_address" rows="2" :placeholder="defaults.contact_address" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"></textarea>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" @click="resetSettings" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors">Reset to Defaults</button>
                    <button type="submit" :disabled="settingsForm.processing" class="px-6 py-2.5 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-medium shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 disabled:opacity-50">Save Changes</button>
                </div>
            </form>
        </div>

        <!-- Hero Slide Modal -->
        <div v-if="showModal" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="closeModal"></div>
                <div class="relative bg-white rounded-2xl shadow-xl transform transition-all sm:max-w-2xl sm:w-full mx-4 max-h-[90vh] overflow-y-auto">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10">
                        <h3 class="text-lg font-semibold text-gray-900">{{ editingSlide ? 'Edit Hero Slide' : 'Add New Hero Slide' }}</h3>
                        <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form @submit.prevent="submitSlideForm" class="p-6 space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Background Image</label>
                            <div class="flex items-start gap-4">
                                <div class="w-40 h-24 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                    <img v-if="imagePreview || slideForm.existing_image" :src="imagePreview || slideForm.existing_image" class="w-full h-full object-cover" />
                                    <div v-else class="w-full h-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 space-y-2">
                                    <input type="file" @change="handleImageUpload" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-audiogold-100 file:text-audiogold-700 hover:file:bg-audiogold-200" />
                                    <p class="text-xs text-gray-500">Or enter an image URL:</p>
                                    <input v-model="slideForm.image_url" type="url" placeholder="https://example.com/image.jpg" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Badge Text</label>
                            <input v-model="slideForm.badge" type="text" placeholder="e.g., Premium Audio Equipment" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                                <input v-model="slideForm.title" type="text" required placeholder="e.g., Experience" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle <span class="text-red-500">*</span></label>
                                <input v-model="slideForm.subtitle" type="text" required placeholder="e.g., Crystal Clear Sound" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea v-model="slideForm.description" rows="3" placeholder="Enter a brief description..." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Features</label>
                            <div class="space-y-2">
                                <div v-for="(feature, index) in slideForm.features" :key="index" class="flex gap-2">
                                    <input v-model="slideForm.features[index]" type="text" placeholder="Enter a feature..." class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                                    <button type="button" @click="removeFeature(index)" class="px-3 py-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <button type="button" @click="addFeature" class="text-sm text-audiogold-600 hover:text-audiogold-700 font-medium flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Feature
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Text</label>
                                <input v-model="slideForm.button_text" type="text" placeholder="Explore Products" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Primary Button Link</label>
                                <input v-model="slideForm.button_link" type="text" placeholder="/products" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Text</label>
                                <input v-model="slideForm.secondary_button_text" type="text" placeholder="Get in Touch" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Button Link</label>
                                <input v-model="slideForm.secondary_button_link" type="text" placeholder="/contact" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                                <input v-model="slideForm.order" type="number" min="0" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <input v-model="slideForm.is_active" type="checkbox" class="w-5 h-5 text-audiogold-600 border-gray-300 rounded focus:ring-audiogold-500" />
                                    <span class="text-gray-700">Active</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
                            <button type="button" @click="closeModal" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors">Cancel</button>
                            <button type="submit" :disabled="slideForm.processing" class="px-6 py-2.5 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-medium shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 disabled:opacity-50">{{ editingSlide ? 'Update Slide' : 'Create Slide' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, watch } from 'vue';
import { Head, router, useForm, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const page = usePage();
const showSuccessMessage = ref(false);
const successMessageText = ref('');

// Watch for flash messages
watch(() => page.props.flash?.success, (message) => {
    if (message) {
        successMessageText.value = message;
        showSuccessMessage.value = true;
        setTimeout(() => {
            showSuccessMessage.value = false;
        }, 4000);
    }
}, { immediate: true });

const props = defineProps({
    heroSlides: Array,
    homepageSettings: Object,
    defaults: Object,
});

const tabs = [
    { id: 'hero', name: 'Hero Slides' },
    { id: 'about', name: 'About Section' },
    { id: 'why', name: 'Why Choose Us' },
    { id: 'dealer', name: 'Dealer Section' },
    { id: 'contact', name: 'Contact Section' },
];

const activeTab = ref('hero');
const showModal = ref(false);
const editingSlide = ref(null);
const imagePreview = ref(null);

// Hero Slide Form
const slideForm = useForm({
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

// Settings Form
const settingsForm = useForm({
    // About Section
    about_badge: props.homepageSettings?.about_badge || '',
    about_title_line1: props.homepageSettings?.about_title_line1 || '',
    about_title_line2: props.homepageSettings?.about_title_line2 || '',
    about_subtitle: props.homepageSettings?.about_subtitle || '',
    about_mission_title: props.homepageSettings?.about_mission_title || '',
    about_mission_text: props.homepageSettings?.about_mission_text || '',
    about_story_paragraph1: props.homepageSettings?.about_story_paragraph1 || '',
    about_story_paragraph2: props.homepageSettings?.about_story_paragraph2 || '',
    about_key_points: props.homepageSettings?.about_key_points || props.defaults.about_key_points,
    about_feature_cards: props.homepageSettings?.about_feature_cards || props.defaults.about_feature_cards,
    about_cta_title: props.homepageSettings?.about_cta_title || '',
    about_cta_subtitle: props.homepageSettings?.about_cta_subtitle || '',
    about_cta_primary_text: props.homepageSettings?.about_cta_primary_text || '',
    about_cta_primary_link: props.homepageSettings?.about_cta_primary_link || '',
    about_cta_secondary_text: props.homepageSettings?.about_cta_secondary_text || '',
    about_cta_secondary_link: props.homepageSettings?.about_cta_secondary_link || '',

    // Why Choose Section
    why_badge: props.homepageSettings?.why_badge || '',
    why_title_line1: props.homepageSettings?.why_title_line1 || '',
    why_title_line2: props.homepageSettings?.why_title_line2 || '',
    why_subtitle: props.homepageSettings?.why_subtitle || '',
    why_feature_cards: props.homepageSettings?.why_feature_cards || props.defaults.why_feature_cards,
    why_stats: props.homepageSettings?.why_stats || props.defaults.why_stats,

    // Dealer Section
    dealer_badge: props.homepageSettings?.dealer_badge || '',
    dealer_title_line1: props.homepageSettings?.dealer_title_line1 || '',
    dealer_title_line2: props.homepageSettings?.dealer_title_line2 || '',
    dealer_subtitle: props.homepageSettings?.dealer_subtitle || '',
    dealer_benefits: props.homepageSettings?.dealer_benefits || props.defaults.dealer_benefits,
    dealer_cta_title: props.homepageSettings?.dealer_cta_title || '',
    dealer_cta_subtitle: props.homepageSettings?.dealer_cta_subtitle || '',
    dealer_cta_primary_text: props.homepageSettings?.dealer_cta_primary_text || '',
    dealer_cta_primary_link: props.homepageSettings?.dealer_cta_primary_link || '',
    dealer_cta_secondary_text: props.homepageSettings?.dealer_cta_secondary_text || '',
    dealer_cta_secondary_link: props.homepageSettings?.dealer_cta_secondary_link || '',

    // Contact Section
    contact_badge: props.homepageSettings?.contact_badge || '',
    contact_title_line1: props.homepageSettings?.contact_title_line1 || '',
    contact_title_line2: props.homepageSettings?.contact_title_line2 || '',
    contact_subtitle: props.homepageSettings?.contact_subtitle || '',
    contact_email: props.homepageSettings?.contact_email || '',
    contact_phone: props.homepageSettings?.contact_phone || '',
    contact_whatsapp: props.homepageSettings?.contact_whatsapp || '',
    contact_timing_days: props.homepageSettings?.contact_timing_days || '',
    contact_timing_hours: props.homepageSettings?.contact_timing_hours || '',
    contact_address: props.homepageSettings?.contact_address || '',
});

// Hero Slide Methods
const resetSlideForm = () => {
    slideForm.reset();
    slideForm.features = [''];
    imagePreview.value = null;
    editingSlide.value = null;
};

const openCreateModal = () => {
    resetSlideForm();
    showModal.value = true;
};

const openEditModal = (slide) => {
    editingSlide.value = slide;
    slideForm.badge = slide.badge || '';
    slideForm.title = slide.title;
    slideForm.subtitle = slide.subtitle;
    slideForm.description = slide.description || '';
    slideForm.features = slide.features && slide.features.length > 0 ? [...slide.features] : [''];
    slideForm.button_text = slide.button_text || 'Explore Products';
    slideForm.button_link = slide.button_link || '/products';
    slideForm.secondary_button_text = slide.secondary_button_text || '';
    slideForm.secondary_button_link = slide.secondary_button_link || '';
    slideForm.order = slide.order || 0;
    slideForm.is_active = slide.is_active;
    slideForm.existing_image = slide.image || '';
    imagePreview.value = null;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    resetSlideForm();
};

const handleImageUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        slideForm.image = file;
        imagePreview.value = URL.createObjectURL(file);
    }
};

const addFeature = () => {
    slideForm.features.push('');
};

const removeFeature = (index) => {
    slideForm.features.splice(index, 1);
    if (slideForm.features.length === 0) {
        slideForm.features.push('');
    }
};

const submitSlideForm = () => {
    if (editingSlide.value) {
        slideForm.post(route('admin.homepage.hero-slides.update', editingSlide.value.id), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        });
    } else {
        slideForm.post(route('admin.homepage.hero-slides.store'), {
            preserveScroll: true,
            onSuccess: () => closeModal(),
        });
    }
};

const deleteSlide = (id) => {
    if (confirm('Are you sure you want to delete this slide?')) {
        router.delete(route('admin.homepage.hero-slides.destroy', id));
    }
};

// Settings Methods
const submitSettingsForm = () => {
    settingsForm.post(route('admin.homepage.settings.update'), {
        preserveScroll: true,
    });
};

const resetSettings = () => {
    if (confirm('Are you sure you want to reset all homepage settings to defaults?')) {
        router.post(route('admin.homepage.settings.reset'));
    }
};
</script>
