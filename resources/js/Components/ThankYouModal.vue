<template>
    <!-- Modal Backdrop -->
    <Transition
        enter-active-class="transition-opacity duration-300"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-opacity duration-200"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="isOpen"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm px-4"
            @click="closeModal"
        >
            <!-- Modal Content -->
            <Transition
                enter-active-class="transition-all duration-300"
                enter-from-class="opacity-0 scale-90"
                enter-to-class="opacity-100 scale-100"
                leave-active-class="transition-all duration-200"
                leave-from-class="opacity-100 scale-100"
                leave-to-class="opacity-0 scale-90"
            >
                <div
                    v-if="isOpen"
                    class="relative bg-white rounded-3xl p-8 md:p-12 max-w-md w-full shadow-2xl"
                    @click.stop
                >
                    <!-- Close Button -->
                    <button
                        @click="closeModal"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors duration-200"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- Success Icon -->
                    <div class="flex justify-center mb-6">
                        <div class="relative">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center animate-bounce-once">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                            </div>
                            <!-- Animated rings -->
                            <div class="absolute inset-0 w-20 h-20 bg-green-400 rounded-full animate-ping opacity-20"></div>
                        </div>
                    </div>

                    <!-- Title -->
                    <h3 class="text-3xl font-bold text-center mb-4">
                        <span class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                            Thank You!
                        </span>
                    </h3>

                    <!-- Message -->
                    <p class="text-gray-600 text-center mb-8 leading-relaxed">
                        {{ message || 'Thank you for your message! We will get back to you within 24 hours.' }}
                    </p>

                    <!-- Action Button -->
                    <button
                        @click="closeModal"
                        class="w-full px-6 py-3 bg-gradient-to-r from-audiogold-600 to-audiogold-700 text-white rounded-xl font-semibold hover:from-audiogold-700 hover:to-audiogold-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                    >
                        Got it!
                    </button>
                </div>
            </Transition>
        </div>
    </Transition>
</template>

<script setup>
import { watch } from 'vue';

const props = defineProps({
    isOpen: {
        type: Boolean,
        default: false
    },
    message: {
        type: String,
        default: ''
    }
});

const emit = defineEmits(['close']);

const closeModal = () => {
    emit('close');
};

// Prevent body scroll when modal is open
watch(() => props.isOpen, (newVal) => {
    if (newVal) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = '';
    }
});
</script>

<style scoped>
@keyframes bounce-once {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

.animate-bounce-once {
    animation: bounce-once 0.6s ease-in-out;
}
</style>
