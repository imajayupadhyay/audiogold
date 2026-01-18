<template>
    <Head title="About Page Settings - AudioGold Admin" />

    <AdminLayout page-title="About Page Settings">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900">About Page Settings</h2>
            <p class="text-gray-600 mt-1">Manage your about page content</p>
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
                    <p class="text-sm text-gray-500">Configure the header area of the about page</p>
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

            <!-- Story & Mission Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Story & Mission</h3>
                    <p class="text-sm text-gray-500">Your company story and mission statement</p>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Story Title</label>
                                <input
                                    v-model="form.story_title"
                                    type="text"
                                    :placeholder="defaults.story_title"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Story Content</label>
                                <textarea
                                    v-model="form.story_content"
                                    rows="6"
                                    :placeholder="defaults.story_content"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                ></textarea>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mission Title</label>
                                <input
                                    v-model="form.mission_title"
                                    type="text"
                                    :placeholder="defaults.mission_title"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mission Content</label>
                                <textarea
                                    v-model="form.mission_content"
                                    rows="6"
                                    :placeholder="defaults.mission_content"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Values Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Core Values</h3>
                            <p class="text-sm text-gray-500">Company values displayed on the page</p>
                        </div>
                        <button
                            type="button"
                            @click="addValue"
                            class="px-4 py-2 bg-audiogold-500 text-white rounded-lg text-sm font-medium hover:bg-audiogold-600 transition-colors"
                        >
                            + Add Value
                        </button>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                            <input
                                v-model="form.values_title"
                                type="text"
                                :placeholder="defaults.values_title"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Subtitle</label>
                            <input
                                v-model="form.values_subtitle"
                                type="text"
                                :placeholder="defaults.values_subtitle"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>

                    <div v-for="(value, index) in form.values" :key="index" class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-sm font-semibold text-gray-600">Value {{ index + 1 }}</span>
                            <button
                                type="button"
                                @click="removeValue(index)"
                                class="text-red-500 hover:text-red-700"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                                <input
                                    v-model="value.title"
                                    type="text"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gradient</label>
                                <select
                                    v-model="value.gradient"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                >
                                    <option value="bg-gradient-to-br from-green-500 to-emerald-600">Green</option>
                                    <option value="bg-gradient-to-br from-yellow-500 to-orange-600">Yellow/Orange</option>
                                    <option value="bg-gradient-to-br from-red-500 to-rose-600">Red</option>
                                    <option value="bg-gradient-to-br from-teal-500 to-cyan-600">Teal</option>
                                    <option value="bg-gradient-to-br from-indigo-500 to-purple-600">Purple</option>
                                    <option value="bg-gradient-to-br from-pink-500 to-rose-600">Pink</option>
                                    <option value="bg-gradient-to-br from-blue-500 to-cyan-600">Blue</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea
                                    v-model="value.description"
                                    rows="2"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Statistics</h3>
                            <p class="text-sm text-gray-500">Key numbers displayed in the stats banner</p>
                        </div>
                        <button
                            type="button"
                            @click="addStat"
                            class="px-4 py-2 bg-audiogold-500 text-white rounded-lg text-sm font-medium hover:bg-audiogold-600 transition-colors"
                        >
                            + Add Stat
                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div v-for="(stat, index) in form.stats" :key="index" class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-xs font-semibold text-gray-500">Stat {{ index + 1 }}</span>
                                <button
                                    type="button"
                                    @click="removeStat(index)"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-3">
                                <input
                                    v-model="stat.value"
                                    type="text"
                                    placeholder="Value (e.g., 50K+)"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <input
                                    v-model="stat.label"
                                    type="text"
                                    placeholder="Label"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Team Members</h3>
                            <p class="text-sm text-gray-500">Team members displayed on the about page</p>
                        </div>
                        <button
                            type="button"
                            @click="addTeamMember"
                            class="px-4 py-2 bg-audiogold-500 text-white rounded-lg text-sm font-medium hover:bg-audiogold-600 transition-colors"
                        >
                            + Add Member
                        </button>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Title</label>
                            <input
                                v-model="form.team_title"
                                type="text"
                                :placeholder="defaults.team_title"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Section Subtitle</label>
                            <input
                                v-model="form.team_subtitle"
                                type="text"
                                :placeholder="defaults.team_subtitle"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                            />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div v-for="(member, index) in form.team_members" :key="index" class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                            <div class="flex justify-between items-start mb-4">
                                <span class="text-sm font-semibold text-gray-600">Member {{ index + 1 }}</span>
                                <button
                                    type="button"
                                    @click="removeTeamMember(index)"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <div class="space-y-3">
                                <input
                                    v-model="member.name"
                                    type="text"
                                    placeholder="Name"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <input
                                    v-model="member.role"
                                    type="text"
                                    placeholder="Role"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <input
                                    v-model="member.image"
                                    type="text"
                                    placeholder="Image URL"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <textarea
                                    v-model="member.bio"
                                    rows="2"
                                    placeholder="Bio"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Innovation Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Innovation Section</h3>
                    <p class="text-sm text-gray-500">Innovation highlights and features</p>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input
                            v-model="form.innovation_title"
                            type="text"
                            :placeholder="defaults.innovation_title"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                        <textarea
                            v-model="form.innovation_content"
                            rows="4"
                            :placeholder="defaults.innovation_content"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                        ></textarea>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <label class="block text-sm font-medium text-gray-700">Innovation Features</label>
                            <button
                                type="button"
                                @click="addInnovation"
                                class="px-3 py-1 bg-audiogold-500 text-white rounded-lg text-xs font-medium hover:bg-audiogold-600 transition-colors"
                            >
                                + Add
                            </button>
                        </div>
                        <div class="space-y-2">
                            <div v-for="(item, index) in form.innovations" :key="index" class="flex gap-2">
                                <input
                                    v-model="form.innovations[index]"
                                    type="text"
                                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                />
                                <button
                                    type="button"
                                    @click="removeInnovation(index)"
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
                        <div class="flex items-center justify-between mb-3">
                            <label class="block text-sm font-medium text-gray-700">Innovation Stats</label>
                            <button
                                type="button"
                                @click="addInnovationStat"
                                class="px-3 py-1 bg-audiogold-500 text-white rounded-lg text-xs font-medium hover:bg-audiogold-600 transition-colors"
                            >
                                + Add
                            </button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div v-for="(stat, index) in form.innovation_stats" :key="index" class="border border-gray-200 rounded-xl p-3 bg-gray-50">
                                <div class="flex justify-end mb-2">
                                    <button
                                        type="button"
                                        @click="removeInnovationStat(index)"
                                        class="text-red-500 hover:text-red-700"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="space-y-2">
                                    <input
                                        v-model="stat.value"
                                        type="text"
                                        placeholder="Value"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                    <input
                                        v-model="stat.label"
                                        type="text"
                                        placeholder="Label"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Call to Action</h3>
                    <p class="text-sm text-gray-500">Bottom section with action buttons</p>
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
import { Head, router, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const props = defineProps({
    aboutSettings: Object,
    defaults: Object,
});

const form = useForm({
    // Hero Section
    hero_badge: props.aboutSettings?.hero_badge || '',
    hero_title_line1: props.aboutSettings?.hero_title_line1 || '',
    hero_title_line2: props.aboutSettings?.hero_title_line2 || '',
    hero_subtitle: props.aboutSettings?.hero_subtitle || '',

    // Story Section
    story_title: props.aboutSettings?.story_title || '',
    story_content: props.aboutSettings?.story_content || '',
    mission_title: props.aboutSettings?.mission_title || '',
    mission_content: props.aboutSettings?.mission_content || '',

    // Values Section
    values_title: props.aboutSettings?.values_title || '',
    values_subtitle: props.aboutSettings?.values_subtitle || '',
    values: props.aboutSettings?.values || [...props.defaults.values],

    // Stats Section
    stats: props.aboutSettings?.stats || [...props.defaults.stats],

    // Team Section
    team_title: props.aboutSettings?.team_title || '',
    team_subtitle: props.aboutSettings?.team_subtitle || '',
    team_members: props.aboutSettings?.team_members || [...props.defaults.team_members],

    // Innovation Section
    innovation_title: props.aboutSettings?.innovation_title || '',
    innovation_content: props.aboutSettings?.innovation_content || '',
    innovations: props.aboutSettings?.innovations || [...props.defaults.innovations],
    innovation_stats: props.aboutSettings?.innovation_stats || [...props.defaults.innovation_stats],

    // CTA Section
    cta_title: props.aboutSettings?.cta_title || '',
    cta_subtitle: props.aboutSettings?.cta_subtitle || '',
    cta_primary_text: props.aboutSettings?.cta_primary_text || '',
    cta_primary_link: props.aboutSettings?.cta_primary_link || '',
    cta_secondary_text: props.aboutSettings?.cta_secondary_text || '',
    cta_secondary_link: props.aboutSettings?.cta_secondary_link || '',
});

const submitForm = () => {
    form.post(route('admin.about-page.update'), {
        preserveScroll: true,
    });
};

const resetToDefaults = () => {
    if (confirm('Are you sure you want to reset all about page settings to defaults? This action cannot be undone.')) {
        router.post(route('admin.about-page.reset'), {}, {
            preserveScroll: true,
        });
    }
};

// Values management
const addValue = () => {
    form.values.push({
        title: '',
        description: '',
        icon: 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        gradient: 'bg-gradient-to-br from-green-500 to-emerald-600'
    });
};

const removeValue = (index) => {
    form.values.splice(index, 1);
};

// Stats management
const addStat = () => {
    form.stats.push({ value: '', label: '' });
};

const removeStat = (index) => {
    form.stats.splice(index, 1);
};

// Team management
const addTeamMember = () => {
    form.team_members.push({
        name: '',
        role: '',
        image: '',
        bio: ''
    });
};

const removeTeamMember = (index) => {
    form.team_members.splice(index, 1);
};

// Innovation management
const addInnovation = () => {
    form.innovations.push('');
};

const removeInnovation = (index) => {
    form.innovations.splice(index, 1);
};

// Innovation stats management
const addInnovationStat = () => {
    form.innovation_stats.push({
        value: '',
        label: '',
        gradient: 'from-blue-500 to-cyan-600'
    });
};

const removeInnovationStat = (index) => {
    form.innovation_stats.splice(index, 1);
};
</script>
