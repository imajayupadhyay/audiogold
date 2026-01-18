<template>
    <section id="contact" class="py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Error Message -->
            <div v-if="showError" class="mb-8 max-w-3xl mx-auto">
                <div class="backdrop-blur-sm bg-red-50 border-2 border-red-500 rounded-2xl p-4 shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                            </svg>
                        </div>
                        <p class="text-red-800 font-semibold">{{ errorMessage }}</p>
                    </div>
                </div>
            </div>

            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <div class="backdrop-blur-sm bg-gradient-to-r from-blue-100 to-cyan-100 border border-blue-200 rounded-full px-6 py-2 shadow-sm">
                        <p class="text-sm font-semibold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent flex items-center gap-2 justify-center">
                            <span class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></span>
                            {{ settings.contact_badge }}
                        </p>
                    </div>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent">
                        {{ settings.contact_title_line1 }}
                    </span>
                    <br />
                    <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                        {{ settings.contact_title_line2 }}
                    </span>
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto mt-4">
                    {{ settings.contact_subtitle }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100">
                    <form @submit.prevent="submitForm" class="space-y-6">
                        <div>
                            <label for="firstName" class="block text-sm font-semibold text-gray-700 mb-2">
                                First Name <span class="text-audiogold-600">*</span>
                            </label>
                            <input
                                v-model="form.firstName"
                                type="text"
                                id="firstName"
                                required
                                class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-2 focus:ring-audiogold-300 outline-none transition-all duration-200 bg-white/80"
                                placeholder="Enter your first name"
                            />
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address <span class="text-audiogold-600">*</span>
                            </label>
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                required
                                class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-2 focus:ring-audiogold-300 outline-none transition-all duration-200 bg-white/80"
                                placeholder="your.email@example.com"
                            />
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <input
                                v-model="form.phone"
                                type="tel"
                                id="phone"
                                class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-2 focus:ring-audiogold-300 outline-none transition-all duration-200 bg-white/80"
                                placeholder="+91 1234567890"
                            />
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                Message
                            </label>
                            <textarea
                                v-model="form.message"
                                id="message"
                                rows="4"
                                maxlength="180"
                                class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-2 focus:ring-audiogold-300 outline-none transition-all duration-200 bg-white/80 resize-none"
                                placeholder="Enter your message..."
                            ></textarea>
                            <p class="text-sm text-gray-500 mt-1">{{ form.message.length }} / 180</p>
                        </div>

                        <button
                            type="submit"
                            class="w-full px-8 py-4 bg-gradient-to-r from-audiogold-600 to-audiogold-700 text-white rounded-xl font-semibold hover:from-audiogold-700 hover:to-audiogold-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                        >
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Get In Touch Info -->
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-gray-100">
                    <h3 class="text-3xl font-bold mb-8 text-gray-900">
                        Contact Information
                    </h3>

                    <div class="space-y-6">
                        <!-- Email -->
                        <div class="flex items-start space-x-4 group">
                            <div class="bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl p-3 transform group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Mail ID</p>
                                <a :href="'mailto:' + settings.contact_email" class="text-audiogold-600 hover:text-audiogold-700">
                                    {{ settings.contact_email }}
                                </a>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4 group">
                            <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl p-3 transform group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Contact</p>
                                <a :href="'tel:' + settings.contact_phone.replace(/\s/g, '')" class="text-audiogold-600 hover:text-audiogold-700">
                                    {{ settings.contact_phone }}
                                </a>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start space-x-4 group">
                            <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl p-3 transform group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01C17.18 3.03 14.69 2 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.23-8.24 8.23-1.48 0-2.93-.39-4.19-1.15l-.3-.17-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.26-4.38c.01-4.54 3.7-8.24 8.25-8.24M8.53 7.33c-.16 0-.43.06-.66.31-.22.25-.87.85-.87 2.07 0 1.22.89 2.39 1 2.56.14.17 1.76 2.67 4.25 3.73.59.27 1.05.42 1.41.53.59.19 1.13.16 1.56.1.48-.07 1.46-.6 1.67-1.18.21-.58.21-1.07.15-1.18-.07-.1-.23-.16-.48-.27-.25-.14-1.47-.74-1.69-.82-.23-.08-.37-.12-.56.12-.16.25-.64.81-.78.97-.15.17-.29.19-.53.07-.26-.13-1.06-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.39.11-.5.11-.11.25-.29.37-.44.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.43-.06-.11-.56-1.35-.77-1.84-.2-.48-.4-.42-.56-.43-.14 0-.3-.01-.47-.01z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">WhatsApp</p>
                                <a :href="whatsappLink" target="_blank" class="text-audiogold-600 hover:text-audiogold-700">
                                    {{ settings.contact_whatsapp }}
                                </a>
                            </div>
                        </div>

                        <!-- Timing -->
                        <div class="flex items-start space-x-4 group">
                            <div class="bg-gradient-to-br from-orange-500 to-amber-600 rounded-xl p-3 transform group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Timing</p>
                                <p class="text-gray-600">{{ settings.contact_timing_days }}</p>
                                <p class="text-gray-600">{{ settings.contact_timing_hours }}</p>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="flex items-start space-x-4 group">
                            <div class="bg-gradient-to-br from-red-500 to-rose-600 rounded-xl p-3 transform group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-700">Address</p>
                                <p class="text-gray-600" v-html="formattedAddress"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background decorative elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-blue-200 to-cyan-200 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute bottom-20 right-10 w-64 h-64 bg-gradient-to-br from-purple-200 to-pink-200 rounded-full blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 right-1/4 w-96 h-96 bg-gradient-to-br from-orange-100 to-amber-100 rounded-full blur-3xl opacity-10"></div>

        <!-- Thank You Modal -->
        <ThankYouModal
            :isOpen="showModal"
            :message="successMessage"
            @close="closeModal"
        />
    </section>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ThankYouModal from '@/Components/ThankYouModal.vue';

const props = defineProps({
    settings: {
        type: Object,
        required: true,
    },
});

// Computed for WhatsApp link (remove spaces and + from number)
const whatsappLink = computed(() => {
    const number = props.settings.contact_whatsapp.replace(/[\s+]/g, '');
    return `https://wa.me/${number}`;
});

const formattedAddress = computed(() => {
    return props.settings.contact_address.replace(/, /g, '<br>');
});

const showModal = ref(false);
const showError = ref(false);
const successMessage = ref('');
const errorMessage = ref('');

const form = useForm({
    firstName: '',
    email: '',
    phone: '',
    message: '',
    page_source: 'home'
});

const closeModal = () => {
    showModal.value = false;
};

const submitForm = () => {
    form.post(route('contact.submit'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            showModal.value = true;
            showError.value = false;
            successMessage.value = 'Thank you for your message! We will get back to you within 24 hours.';
        },
        onError: () => {
            showError.value = true;
            showModal.value = false;
            errorMessage.value = 'Something went wrong. Please try again.';
            setTimeout(() => { showError.value = false; }, 5000);
        }
    });
};
</script>
