<template>
    <!-- Modal Overlay -->
    <Transition
        enter-active-class="transition-opacity duration-300 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-200 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="show"
            @click="closeModal"
            class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[60] flex items-center justify-center p-4"
        >
            <!-- Modal Content -->
            <Transition
                enter-active-class="transition-all duration-300 ease-out"
                enter-from-class="opacity-0 scale-95 translate-y-4"
                enter-to-class="opacity-100 scale-100 translate-y-0"
                leave-active-class="transition-all duration-200 ease-in"
                leave-from-class="opacity-100 scale-100 translate-y-0"
                leave-to-class="opacity-0 scale-95 translate-y-4"
            >
                <div
                    v-if="show"
                    @click.stop
                    class="relative w-full max-w-lg backdrop-blur-md bg-white rounded-3xl shadow-2xl border border-gray-200 max-h-[90vh] overflow-y-auto"
                >
                    <!-- Close Button -->
                    <button
                        @click="closeModal"
                        class="absolute top-6 right-6 z-10 w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-900 transition-all duration-200 flex items-center justify-center group"
                    >
                        <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- Modal Header -->
                    <div class="p-8 pb-6 border-b border-gray-200">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-audiogold-500 to-audiogold-600 flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900">Get a Quote</h2>
                        </div>
                        <p class="text-gray-600">Fill out the form below and we'll get back to you within 24 hours</p>
                    </div>

                    <!-- Modal Body - Form -->
                    <div class="p-8">
                        <form @submit.prevent="submitForm" class="space-y-5">
                            <!-- First Name -->
                            <div class="group/input">
                                <label for="modal-firstName" class="block text-sm font-semibold text-gray-700 mb-2">
                                    First Name <span class="text-audiogold-600">*</span>
                                </label>
                                <input
                                    v-model="form.firstName"
                                    type="text"
                                    id="modal-firstName"
                                    required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-4 focus:ring-audiogold-200 outline-none transition-all duration-300 bg-white hover:shadow-md"
                                    placeholder="Enter your first name"
                                />
                            </div>

                            <!-- Email -->
                            <div class="group/input">
                                <label for="modal-email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email Address <span class="text-audiogold-600">*</span>
                                </label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    id="modal-email"
                                    required
                                    class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-4 focus:ring-audiogold-200 outline-none transition-all duration-300 bg-white hover:shadow-md"
                                    placeholder="your.email@example.com"
                                />
                            </div>

                            <!-- Phone -->
                            <div class="group/input">
                                <label for="modal-phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Phone Number
                                </label>
                                <input
                                    v-model="form.phone"
                                    type="tel"
                                    id="modal-phone"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-4 focus:ring-audiogold-200 outline-none transition-all duration-300 bg-white hover:shadow-md"
                                    placeholder="+91 1234567890"
                                />
                            </div>

                            <!-- Message -->
                            <div class="group/input">
                                <label for="modal-message" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Message
                                </label>
                                <textarea
                                    v-model="form.message"
                                    id="modal-message"
                                    rows="4"
                                    maxlength="180"
                                    class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-4 focus:ring-audiogold-200 outline-none transition-all duration-300 bg-white hover:shadow-md resize-none"
                                    placeholder="Tell us about your requirements..."
                                ></textarea>
                                <div class="flex justify-between items-center mt-2">
                                    <p class="text-sm text-gray-500">{{ form.message.length }} / 180</p>
                                    <p v-if="form.message.length >= 180" class="text-sm text-audiogold-600 font-semibold">Maximum length reached</p>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="group/btn w-full px-8 py-4 bg-gradient-to-r from-audiogold-600 to-audiogold-700 text-white rounded-2xl font-semibold hover:from-audiogold-700 hover:to-audiogold-800 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center gap-2"
                            >
                                Send Message
                                <svg class="w-5 h-5 transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Modal Footer -->
                    <div class="p-6 pt-0 border-t border-gray-200 mt-4">
                        <div class="flex items-center justify-center gap-6 text-sm text-gray-600">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span>24hr Response</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-audiogold-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>100% Secure</span>
                            </div>
                        </div>
                    </div>
                </div>
            </Transition>
        </div>
    </Transition>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false
    }
});

const emit = defineEmits(['close']);

const form = ref({
    firstName: '',
    email: '',
    phone: '',
    message: ''
});

const closeModal = () => {
    emit('close');
};

const submitForm = () => {
    // Handle form submission
    console.log('Form submitted:', form.value);
    alert('Thank you for your message! We will get back to you within 24 hours.');

    // Reset form
    form.value = {
        firstName: '',
        email: '',
        phone: '',
        message: ''
    };

    // Close modal
    closeModal();
};

// Prevent body scroll when modal is open
watch(() => props.show, (newValue) => {
    if (newValue) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
});
</script>
