<template>
    <Head title="FAQ's - AudioGold" />

    <MainLayout>
        <!-- Background slot -->
        <template #background>
            <AnimatedBackground />
        </template>

        <!-- Hero Header -->
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto text-center">
                <div class="inline-block mb-4">
                    <div class="backdrop-blur-sm bg-gradient-to-r from-orange-100 to-amber-100 border border-orange-200 rounded-full px-6 py-2 shadow-sm">
                        <p class="text-sm font-semibold bg-gradient-to-r from-orange-600 to-amber-600 bg-clip-text text-transparent flex items-center gap-2 justify-center">
                            <span class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></span>
                            Help Center
                        </p>
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent">
                        Frequently Asked
                    </span>
                    <br />
                    <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                        Questions
                    </span>
                </h1>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                    Find answers to the most common questions about Audio Gold products and services
                </p>
            </div>
        </section>

        <!-- Category Tabs -->
        <section class="py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="backdrop-blur-md bg-white/60 rounded-2xl p-2 shadow-xl border border-white/50 overflow-x-auto">
                    <div class="flex gap-2 min-w-max">
                        <button
                            v-for="category in categories"
                            :key="category.id"
                            @click="activeCategory = category.id"
                            :class="[
                                'px-6 py-3 rounded-xl font-semibold transition-all duration-300 whitespace-nowrap',
                                activeCategory === category.id
                                    ? 'bg-gradient-to-r from-audiogold-600 to-audiogold-700 text-white shadow-lg'
                                    : 'text-gray-700 hover:bg-audiogold-50'
                            ]"
                        >
                            {{ category.name }}
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Content -->
        <section class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto space-y-4">
                <div
                    v-for="(faq, index) in currentFaqs"
                    :key="index"
                    class="group backdrop-blur-md bg-white/60 rounded-2xl shadow-xl border border-white/50 hover:shadow-2xl transition-all duration-300 overflow-hidden"
                >
                    <button
                        @click="toggleFaq(index)"
                        class="w-full px-6 py-5 flex items-center justify-between text-left hover:bg-white/40 transition-colors duration-200"
                    >
                        <span class="font-semibold text-gray-800 text-lg pr-4 group-hover:text-audiogold-700 transition-colors duration-200">
                            {{ faq.question }}
                        </span>
                        <svg
                            :class="[
                                'w-6 h-6 text-audiogold-600 flex-shrink-0 transition-transform duration-300',
                                openFaqs.includes(index) ? 'rotate-180' : ''
                            ]"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <transition
                        enter-active-class="transition-all duration-300 ease-out"
                        leave-active-class="transition-all duration-200 ease-in"
                        enter-from-class="max-h-0 opacity-0"
                        enter-to-class="max-h-96 opacity-100"
                        leave-from-class="max-h-96 opacity-100"
                        leave-to-class="max-h-0 opacity-0"
                    >
                        <div v-if="openFaqs.includes(index)" class="overflow-hidden">
                            <div class="px-6 pb-5 pt-2">
                                <div class="pl-4 border-l-4 border-audiogold-400">
                                    <p class="text-gray-700 leading-relaxed">{{ faq.answer }}</p>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>

                <!-- No FAQs message -->
                <div v-if="currentFaqs.length === 0" class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-gray-600">No FAQs available in this category</p>
                </div>
            </div>
        </section>

        <!-- Quick Actions -->
        <section class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-3 gap-6">
                    <a href="/support" class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 12.22C21 6.73 16.74 3 12 3c-4.69 0-9 3.65-9 9.28-.6.34-1 .98-1 1.72v2c0 1.1.9 2 2 2h1v-6.1c0-3.87 3.13-7 7-7s7 3.13 7 7V19h-8v2h8c1.1 0 2-.9 2-2v-1.22c.59-.31 1-.92 1-1.64v-2.3c0-.7-.41-1.31-1-1.62z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Need More Help?</h3>
                        <p class="text-sm text-gray-600 mb-3">Visit our support center for additional assistance</p>
                        <span class="text-audiogold-600 font-semibold text-sm inline-flex items-center gap-1">
                            Get Support
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </a>

                    <a href="/contact" class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Contact Us</h3>
                        <p class="text-sm text-gray-600 mb-3">Have a specific question? Reach out to our team</p>
                        <span class="text-audiogold-600 font-semibold text-sm inline-flex items-center gap-1">
                            Send Message
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </a>

                    <a href="tel:+917011651721" class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Call Us</h3>
                        <p class="text-sm text-gray-600 mb-3">Speak directly with our support team</p>
                        <span class="text-audiogold-600 font-semibold text-sm inline-flex items-center gap-1">
                            +91 7011651721
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-3xl p-8 md:p-12 shadow-2xl border border-audiogold-400/50 text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Get in Touch With Audio Gold</h2>
                        <p class="text-white/90 mb-8 max-w-2xl mx-auto">
                            Can't find the answer you're looking for? Our friendly team is here to help.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="/contact" class="px-8 py-4 bg-white text-audiogold-700 rounded-2xl font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Contact Support
                            </a>
                            <a href="https://wa.me/917011651721" target="_blank" class="px-8 py-4 backdrop-blur-sm bg-white/20 border-2 border-white text-white rounded-2xl font-semibold hover:bg-white/30 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                WhatsApp Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import AnimatedBackground from '@/Pages/Home/Components/AnimatedBackground.vue';

const activeCategory = ref('about');
const openFaqs = ref([]);

const categories = [
    { id: 'about', name: 'About Audio Gold' },
    { id: 'products', name: 'Product Information' },
    { id: 'purchasing', name: 'Purchasing & Orders' },
    { id: 'dealer', name: 'Dealer & Partnership' },
    { id: 'support', name: 'Support & Service' },
    { id: 'returns', name: 'Returns & Warranty' },
];

const faqs = {
    about: [
        {
            question: 'What does Audio Gold specialize in?',
            answer: 'Audio Gold specializes in designing and manufacturing professional audio products tailored to meet the needs of the Indian market at affordable prices.'
        },
        {
            question: 'Are products available for individual customers or businesses?',
            answer: 'Audio Gold products are available for both individual customers and businesses, including event organizers, audio professionals, and retailers.'
        },
        {
            question: 'What makes Audio Gold different from other brands?',
            answer: 'Audio Gold combines global expertise with local market insights to deliver innovative, high-quality, and affordable products specifically designed for Indian audiences.'
        },
        {
            question: 'Where is Audio Gold located?',
            answer: 'Our headquarters are in A-64 Roop Nagar Industrial Area Loni Ghaziabad Uttar Pradesh Pin Code: 201102'
        }
    ],
    products: [
        {
            question: 'Are your products suitable for large-scale events?',
            answer: 'Yes, our products are designed to cater to all types of events, from intimate gatherings to large-scale concerts and performances.'
        },
        {
            question: 'What types of products do you offer?',
            answer: 'We offer a wide range of professional audio amplifiers designed for various applications and venue sizes.'
        },
        {
            question: 'Do your products come with a warranty?',
            answer: 'Yes, all Audio Gold products come with a standard warranty. Please refer to the product manual or contact our support team for details.'
        },
        {
            question: 'Where can I find the user manuals for Audio Gold products?',
            answer: 'User manuals are provided with the products. You can also download them from our website under the "Support" section.'
        }
    ],
    purchasing: [
        {
            question: 'How can I purchase Audio Gold products?',
            answer: 'You can purchase our products through authorized dealers, distributors, or by contacting us directly via our website.'
        },
        {
            question: 'Can I order products online?',
            answer: 'Yes, you can place orders online. Contact us or visit our website for more details.'
        },
        {
            question: 'Do you offer discounts for bulk purchases?',
            answer: 'Yes, discounts are available for bulk purchases. Contact our sales team for a custom quote.'
        },
        {
            question: 'Do you ship products across India?',
            answer: 'Yes, we ship our products nationwide. Shipping charges and delivery times depend on the location.'
        }
    ],
    dealer: [
        {
            question: 'How can I become an Audio Gold dealer?',
            answer: 'Visit our Become a Dealer page to learn about our dealership program and fill out the application form.'
        },
        {
            question: 'What are the benefits of becoming an Audio Gold dealer?',
            answer: 'Dealers gain access to exclusive pricing, marketing support, and priority customer service.'
        }
    ],
    support: [
        {
            question: 'Do you provide technical support for your products?',
            answer: 'Yes, our technical support team is available to assist with installation, troubleshooting, and product maintenance.'
        },
        {
            question: 'Do you offer repair services?',
            answer: 'Yes, we offer repair services for all Audio Gold products. Contact us for details on service centers near you.'
        },
        {
            question: 'What should I do if my product is not working properly?',
            answer: 'Please contact our support team with the product details and a description of the issue. We\'ll guide you through the next steps.'
        },
        {
            question: 'How can I contact customer support?',
            answer: 'You can reach our support team via phone, email, or the contact form on our website.'
        }
    ],
    returns: [
        {
            question: 'What is your return policy?',
            answer: 'Products can be returned within 1 week if they are unused and in their original packaging. Visit our Returns Policy page for more details.'
        },
        {
            question: 'Are repairs covered under warranty?',
            answer: 'Repairs are covered under warranty if the issue is due to manufacturing defects. Terms and conditions apply.'
        },
        {
            question: 'How do I claim a warranty?',
            answer: 'To claim a warranty, contact our support team with your proof of purchase and product details.'
        }
    ],
    additional: [
        {
            question: 'Can I see a demo of your products?',
            answer: 'Yes, we provide product demonstrations. Contact us to schedule a session.'
        },
        {
            question: 'How can I stay updated on new products and offers?',
            answer: 'Follow us on our social media channels or subscribe to our newsletter to stay updated.'
        }
    ]
};

const currentFaqs = computed(() => {
    return faqs[activeCategory.value] || [];
});

const toggleFaq = (index) => {
    const faqIndex = openFaqs.value.indexOf(index);
    if (faqIndex > -1) {
        openFaqs.value.splice(faqIndex, 1);
    } else {
        openFaqs.value.push(index);
    }
};
</script>
