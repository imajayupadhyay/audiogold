<template>
    <Head title="Support Page Settings - AudioGold Admin" />

    <AdminLayout page-title="Support Page Settings">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Support Page Settings</h2>
            <p class="text-gray-600 mt-1">Manage your support page content</p>
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
                    <p class="text-sm text-gray-500">Configure the header area of the support page</p>
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
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input
                            v-model="form.hero_title"
                            type="text"
                            :placeholder="defaults.hero_title"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <textarea
                            v-model="form.hero_subtitle"
                            rows="3"
                            :placeholder="defaults.hero_subtitle"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- Quick Support Options -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Quick Support Options</h3>
                    <p class="text-sm text-gray-500">Configure the quick action cards (Email, Phone, WhatsApp, Self-Help)</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div v-for="(option, index) in form.quick_support_options" :key="index" class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-sm font-semibold text-gray-600">{{ option.title || `Option ${index + 1}` }}</span>
                            </div>
                            <div class="space-y-3">
                                <input
                                    v-model="option.title"
                                    type="text"
                                    placeholder="Title"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <input
                                    v-model="option.description"
                                    type="text"
                                    placeholder="Description"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <input
                                    v-model="option.link"
                                    type="text"
                                    placeholder="Link (e.g., tel:+91..., https://wa.me/...)"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <select
                                    v-model="option.gradient"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                >
                                    <option value="from-blue-500 to-cyan-600">Blue</option>
                                    <option value="from-green-500 to-emerald-600">Green</option>
                                    <option value="from-purple-500 to-pink-600">Purple</option>
                                    <option value="from-orange-500 to-amber-600">Orange</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Self-Help Resources Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Self-Help Resources</h3>
                            <p class="text-sm text-gray-500">Support Library and Knowledge Base cards</p>
                        </div>
                        <button
                            type="button"
                            @click="addSelfHelpResource"
                            class="px-4 py-2 bg-audiogold-500 text-white rounded-lg text-sm font-medium hover:bg-audiogold-600 transition-colors"
                        >
                            + Add Resource
                        </button>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                            <input
                                v-model="form.self_help_title"
                                type="text"
                                :placeholder="defaults.self_help_title"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Subtitle</label>
                            <input
                                v-model="form.self_help_subtitle"
                                type="text"
                                :placeholder="defaults.self_help_subtitle"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div v-for="(resource, index) in form.self_help_resources" :key="index" class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-sm font-semibold text-gray-600">Resource {{ index + 1 }}</span>
                                <button
                                    type="button"
                                    @click="removeSelfHelpResource(index)"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-3">
                                <input
                                    v-model="resource.title"
                                    type="text"
                                    placeholder="Title"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <textarea
                                    v-model="resource.description"
                                    rows="2"
                                    placeholder="Description"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                ></textarea>
                                <div class="grid grid-cols-2 gap-2">
                                    <input
                                        v-model="resource.link_text"
                                        type="text"
                                        placeholder="Link Text"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                    <input
                                        v-model="resource.link"
                                        type="text"
                                        placeholder="Link URL"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Support Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Product Support</h3>
                            <p class="text-sm text-gray-500">Product Manuals, FAQs, Technical Assistance cards</p>
                        </div>
                        <button
                            type="button"
                            @click="addProductSupportCard"
                            class="px-4 py-2 bg-audiogold-500 text-white rounded-lg text-sm font-medium hover:bg-audiogold-600 transition-colors"
                        >
                            + Add Card
                        </button>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                            <input
                                v-model="form.product_support_title"
                                type="text"
                                :placeholder="defaults.product_support_title"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Subtitle</label>
                            <input
                                v-model="form.product_support_subtitle"
                                type="text"
                                :placeholder="defaults.product_support_subtitle"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div v-for="(card, index) in form.product_support_cards" :key="index" class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-sm font-semibold text-gray-600">Card {{ index + 1 }}</span>
                                <button
                                    type="button"
                                    @click="removeProductSupportCard(index)"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-3">
                                <input
                                    v-model="card.title"
                                    type="text"
                                    placeholder="Title"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <textarea
                                    v-model="card.description"
                                    rows="2"
                                    placeholder="Description"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                ></textarea>
                                <input
                                    v-model="card.link_text"
                                    type="text"
                                    placeholder="Link Text"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <input
                                    v-model="card.link"
                                    type="text"
                                    placeholder="Link URL"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Tutorials Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Video Tutorials</h3>
                    <p class="text-sm text-gray-500">Video tutorials banner section</p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input
                                v-model="form.video_title"
                                type="text"
                                :placeholder="defaults.video_title"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                            <input
                                v-model="form.video_button_text"
                                type="text"
                                :placeholder="defaults.video_button_text"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <textarea
                            v-model="form.video_subtitle"
                            rows="2"
                            :placeholder="defaults.video_subtitle"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        ></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                        <input
                            v-model="form.video_button_link"
                            type="text"
                            :placeholder="defaults.video_button_link"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                </div>
            </div>

            <!-- Warranty & Order Support Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Warranty Section -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Warranty & Repairs</h3>
                                <p class="text-sm text-gray-500">Warranty section content</p>
                            </div>
                            <button
                                type="button"
                                @click="addWarrantyFeature"
                                class="px-3 py-1 bg-audiogold-500 text-white rounded-lg text-xs font-medium hover:bg-audiogold-600 transition-colors"
                            >
                                + Add
                            </button>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input
                                v-model="form.warranty_title"
                                type="text"
                                :placeholder="defaults.warranty_title"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                            <input
                                v-model="form.warranty_subtitle"
                                type="text"
                                :placeholder="defaults.warranty_subtitle"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Features</label>
                            <div class="space-y-2">
                                <div v-for="(feature, index) in form.warranty_features" :key="index" class="flex gap-2">
                                    <input
                                        v-model="form.warranty_features[index]"
                                        type="text"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                    <button
                                        type="button"
                                        @click="removeWarrantyFeature(index)"
                                        class="text-red-500 hover:text-red-700 px-2"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Link Text</label>
                            <input
                                v-model="form.warranty_link_text"
                                type="text"
                                :placeholder="defaults.warranty_link_text"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>
                </div>

                <!-- Order Support Section -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Order Support</h3>
                                <p class="text-sm text-gray-500">Order support section content</p>
                            </div>
                            <button
                                type="button"
                                @click="addOrderFeature"
                                class="px-3 py-1 bg-audiogold-500 text-white rounded-lg text-xs font-medium hover:bg-audiogold-600 transition-colors"
                            >
                                + Add
                            </button>
                        </div>
                    </div>
                    <div class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <input
                                v-model="form.order_title"
                                type="text"
                                :placeholder="defaults.order_title"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                            <input
                                v-model="form.order_subtitle"
                                type="text"
                                :placeholder="defaults.order_subtitle"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Features</label>
                            <div class="space-y-2">
                                <div v-for="(feature, index) in form.order_features" :key="index" class="flex gap-2">
                                    <input
                                        v-model="form.order_features[index]"
                                        type="text"
                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                    <button
                                        type="button"
                                        @click="removeOrderFeature(index)"
                                        class="text-red-500 hover:text-red-700 px-2"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Link Text</label>
                            <input
                                v-model="form.order_link_text"
                                type="text"
                                :placeholder="defaults.order_link_text"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Contact Form & Information</h3>
                    <p class="text-sm text-gray-500">Contact form section and business contact details</p>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Contact Section Title</label>
                            <input
                                v-model="form.contact_title"
                                type="text"
                                :placeholder="defaults.contact_title"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Contact Section Subtitle</label>
                            <input
                                v-model="form.contact_subtitle"
                                type="text"
                                :placeholder="defaults.contact_subtitle"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>

                    <hr class="my-4" />

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input
                                v-model="form.email"
                                type="email"
                                :placeholder="defaults.email"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input
                                v-model="form.phone"
                                type="text"
                                :placeholder="defaults.phone"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp Number</label>
                        <input
                            v-model="form.whatsapp"
                            type="text"
                            :placeholder="defaults.whatsapp"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Working Days</label>
                            <input
                                v-model="form.timing_days"
                                type="text"
                                :placeholder="defaults.timing_days"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Working Hours</label>
                            <input
                                v-model="form.timing_hours"
                                type="text"
                                :placeholder="defaults.timing_hours"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Business Address</label>
                        <textarea
                            v-model="form.address"
                            rows="2"
                            :placeholder="defaults.address"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        ></textarea>
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
import { Head, router, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const props = defineProps({
    supportSettings: Object,
    defaults: Object,
});

const form = useForm({
    // Hero Section
    hero_badge: props.supportSettings?.hero_badge || '',
    hero_title: props.supportSettings?.hero_title || '',
    hero_subtitle: props.supportSettings?.hero_subtitle || '',

    // Quick Support Options
    quick_support_options: props.supportSettings?.quick_support_options || [...props.defaults.quick_support_options],

    // Self-Help Resources Section
    self_help_title: props.supportSettings?.self_help_title || '',
    self_help_subtitle: props.supportSettings?.self_help_subtitle || '',
    self_help_resources: props.supportSettings?.self_help_resources || [...props.defaults.self_help_resources],

    // Product Support Section
    product_support_title: props.supportSettings?.product_support_title || '',
    product_support_subtitle: props.supportSettings?.product_support_subtitle || '',
    product_support_cards: props.supportSettings?.product_support_cards || [...props.defaults.product_support_cards],

    // Video Tutorials Section
    video_title: props.supportSettings?.video_title || '',
    video_subtitle: props.supportSettings?.video_subtitle || '',
    video_button_text: props.supportSettings?.video_button_text || '',
    video_button_link: props.supportSettings?.video_button_link || '',

    // Warranty Section
    warranty_title: props.supportSettings?.warranty_title || '',
    warranty_subtitle: props.supportSettings?.warranty_subtitle || '',
    warranty_features: props.supportSettings?.warranty_features || [...props.defaults.warranty_features],
    warranty_link_text: props.supportSettings?.warranty_link_text || '',

    // Order Support Section
    order_title: props.supportSettings?.order_title || '',
    order_subtitle: props.supportSettings?.order_subtitle || '',
    order_features: props.supportSettings?.order_features || [...props.defaults.order_features],
    order_link_text: props.supportSettings?.order_link_text || '',

    // Contact Form Section
    contact_title: props.supportSettings?.contact_title || '',
    contact_subtitle: props.supportSettings?.contact_subtitle || '',

    // Contact Information
    email: props.supportSettings?.email || '',
    phone: props.supportSettings?.phone || '',
    whatsapp: props.supportSettings?.whatsapp || '',
    timing_days: props.supportSettings?.timing_days || '',
    timing_hours: props.supportSettings?.timing_hours || '',
    address: props.supportSettings?.address || '',
});

const submitForm = () => {
    form.post(route('admin.support-page.update'), {
        preserveScroll: true,
    });
};

const resetToDefaults = () => {
    if (confirm('Are you sure you want to reset all support page settings to defaults? This action cannot be undone.')) {
        router.post(route('admin.support-page.reset'), {}, {
            preserveScroll: true,
        });
    }
};

// Self-Help Resources management
const addSelfHelpResource = () => {
    form.self_help_resources.push({
        title: '',
        description: '',
        link_text: '',
        link: '#',
        gradient: 'from-indigo-500 to-purple-600'
    });
};

const removeSelfHelpResource = (index) => {
    form.self_help_resources.splice(index, 1);
};

// Product Support Cards management
const addProductSupportCard = () => {
    form.product_support_cards.push({
        title: '',
        description: '',
        link_text: '',
        link: '#',
        gradient: 'from-teal-500 to-emerald-600'
    });
};

const removeProductSupportCard = (index) => {
    form.product_support_cards.splice(index, 1);
};

// Warranty Features management
const addWarrantyFeature = () => {
    form.warranty_features.push('');
};

const removeWarrantyFeature = (index) => {
    form.warranty_features.splice(index, 1);
};

// Order Features management
const addOrderFeature = () => {
    form.order_features.push('');
};

const removeOrderFeature = (index) => {
    form.order_features.splice(index, 1);
};
</script>
