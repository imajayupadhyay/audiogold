<template>
    <Head title="Support - AudioGold" />

    <MainLayout>
        <!-- Background slot -->
        <template #background>
            <AnimatedBackground />
        </template>

        <!-- Hero Header -->
        <section class="relative pt-32 pb-20 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto text-center">
                <div class="inline-block mb-4">
                    <span class="text-sm font-semibold text-audiogold-600 tracking-wider uppercase">Customer Support</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                    <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                        We're Here to Help!
                    </span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-4">
                    At Audio Gold, customer satisfaction is our top priority. Whether you need technical assistance, product information, or help with an order, our dedicated support team is ready to assist you.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-audiogold-500 to-audiogold-700 mx-auto rounded-full"></div>
            </div>
        </section>

        <!-- Quick Support Options -->
        <section class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-4 gap-6">
                    <a href="#contact-form" class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2 cursor-pointer">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Email Support</h3>
                        <p class="text-sm text-gray-600">Get help via email</p>
                    </a>

                    <a href="tel:+917011651721" class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2 cursor-pointer">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Phone Support</h3>
                        <p class="text-sm text-gray-600">Call us directly</p>
                    </a>

                    <a href="https://wa.me/917011651721" target="_blank" class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2 cursor-pointer">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01C17.18 3.03 14.69 2 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.23-8.24 8.23-1.48 0-2.93-.39-4.19-1.15l-.3-.17-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.26-4.38c.01-4.54 3.7-8.24 8.25-8.24M8.53 7.33c-.16 0-.43.06-.66.31-.22.25-.87.85-.87 2.07 0 1.22.89 2.39 1 2.56.14.17 1.76 2.67 4.25 3.73.59.27 1.05.42 1.41.53.59.19 1.13.16 1.56.1.48-.07 1.46-.6 1.67-1.18.21-.58.21-1.07.15-1.18-.07-.1-.23-.16-.48-.27-.25-.14-1.47-.74-1.69-.82-.23-.08-.37-.12-.56.12-.16.25-.64.81-.78.97-.15.17-.29.19-.53.07-.26-.13-1.06-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.39.11-.5.11-.11.25-.29.37-.44.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.43-.06-.11-.56-1.35-.77-1.84-.2-.48-.4-.42-.56-.43-.14 0-.3-.01-.47-.01z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">WhatsApp</h3>
                        <p class="text-sm text-gray-600">Chat with us</p>
                    </a>

                    <a href="#self-help" class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2 cursor-pointer">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-amber-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Self-Help</h3>
                        <p class="text-sm text-gray-600">Browse resources</p>
                    </a>
                </div>
            </div>
        </section>

        <!-- Self-Help Resources -->
        <section id="self-help" class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                            Self-Help Resources
                        </span>
                    </h2>
                    <p class="text-gray-600">Find answers quickly with our comprehensive resources</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="group backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl hover:bg-white/80 transition-all duration-500 transform hover:-translate-y-2">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-800 mb-3">Support Library</h3>
                                <p class="text-gray-700 mb-4">Explore our library of product manuals, quick-start guides, and troubleshooting tips.</p>
                                <a href="#" class="inline-flex items-center gap-2 text-audiogold-600 font-semibold hover:text-audiogold-700 transition-colors duration-200">
                                    Browse Library
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="group backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl hover:bg-white/80 transition-all duration-500 transform hover:-translate-y-2">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-800 mb-3">Knowledge Base</h3>
                                <p class="text-gray-700 mb-4">Find detailed articles and solutions for common issues in our comprehensive knowledge base.</p>
                                <a href="#" class="inline-flex items-center gap-2 text-audiogold-600 font-semibold hover:text-audiogold-700 transition-colors duration-200">
                                    Visit Knowledge Base
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Support -->
        <section class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                            Product Support
                        </span>
                    </h2>
                    <p class="text-gray-600">Having trouble with your Audio Gold product? Explore our resources or contact our experts for guidance.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all duration-300 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Product Manuals</h3>
                        <p class="text-sm text-gray-600 mb-4">Download user guides and manuals from our Support Library</p>
                        <a href="#" class="text-audiogold-600 font-semibold text-sm hover:text-audiogold-700">Download →</a>
                    </div>

                    <div class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all duration-300 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">FAQs</h3>
                        <p class="text-sm text-gray-600 mb-4">Visit our FAQ Page for answers to common questions</p>
                        <a href="#" class="text-audiogold-600 font-semibold text-sm hover:text-audiogold-700">View FAQs →</a>
                    </div>

                    <div class="group backdrop-blur-md bg-white/60 rounded-2xl p-6 shadow-xl border border-white/50 hover:shadow-2xl hover:bg-white/80 transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-12 h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-all duration-300 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 9h-2V5h2v6zm0 4h-2v-2h2v2z"/>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Technical Assistance</h3>
                        <p class="text-sm text-gray-600 mb-4">Contact us for troubleshooting and setup support</p>
                        <a href="#contact-form" class="text-audiogold-600 font-semibold text-sm hover:text-audiogold-700">Get Help →</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Tutorials -->
        <section class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-500 to-audiogold-700 rounded-3xl p-8 md:p-12 shadow-2xl border border-audiogold-400/50 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <div class="grid md:grid-cols-2 gap-8 items-center">
                            <div>
                                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Video Tutorials</h2>
                                <p class="text-white/90 mb-6">Learn how to get the most out of your Audio Gold products with our step-by-step video guides.</p>
                                <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-audiogold-700 rounded-xl font-semibold hover:bg-gray-100 transition-all duration-300 shadow-lg">
                                    Watch Tutorials
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-32 h-32 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm animate-pulse-slow">
                                    <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Warranty and Repairs + Order Support -->
        <section class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Warranty and Repairs -->
                    <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-500">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800 mb-2">Warranty and Repairs</h2>
                                <p class="text-gray-600">Your peace of mind matters to us</p>
                            </div>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                                <span class="text-gray-700">Comprehensive warranty coverage on all products</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                                <span class="text-gray-700">Quick and reliable repair services</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                                <span class="text-gray-700">Genuine parts and certified technicians</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                                <span class="text-gray-700">Easy warranty claim process</span>
                            </li>
                        </ul>
                        <a href="#contact-form" class="inline-flex items-center gap-2 mt-6 text-audiogold-600 font-semibold hover:text-audiogold-700 transition-colors duration-200">
                            Submit Warranty Claim
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Order Support -->
                    <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl transition-all duration-500">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-14 h-14 bg-gradient-to-br from-fuchsia-500 to-pink-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800 mb-2">Order Support</h2>
                                <p class="text-gray-600">Track and manage your orders</p>
                            </div>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                                <span class="text-gray-700">Track your order status in real-time</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                                <span class="text-gray-700">Modify or cancel orders before shipment</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                                <span class="text-gray-700">Easy returns and exchanges within 7 days</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-audiogold-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                                <span class="text-gray-700">Billing and invoice support</span>
                            </li>
                        </ul>
                        <a href="#contact-form" class="inline-flex items-center gap-2 mt-6 text-audiogold-600 font-semibold hover:text-audiogold-700 transition-colors duration-200">
                            Contact Order Support
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section id="contact-form" class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <!-- Success Message -->
                <div v-if="$page.props.flash?.success" class="mb-8 max-w-3xl mx-auto">
                    <div class="backdrop-blur-sm bg-green-50 border-2 border-green-500 rounded-2xl p-4 shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </svg>
                            </div>
                            <p class="text-green-800 font-semibold">{{ $page.props.flash.success }}</p>
                        </div>
                    </div>
                </div>

                <!-- Error Message -->
                <div v-if="$page.props.flash?.error" class="mb-8 max-w-3xl mx-auto">
                    <div class="backdrop-blur-sm bg-red-50 border-2 border-red-500 rounded-2xl p-4 shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                </svg>
                            </div>
                            <p class="text-red-800 font-semibold">{{ $page.props.flash.error }}</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                            Get in Touch With Audio Gold
                        </span>
                    </h2>
                    <p class="text-gray-600">Fill out the form below, and we'll get back to you within 24 hours.</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 md:p-10 shadow-2xl border border-white/50 hover:shadow-3xl hover:bg-white/70 transition-all duration-500">
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
                                    class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-4 focus:ring-audiogold-200 outline-none transition-all duration-300 bg-white/80 hover:bg-white hover:shadow-md"
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
                                    class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-4 focus:ring-audiogold-200 outline-none transition-all duration-300 bg-white/80 hover:bg-white hover:shadow-md"
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
                                    class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-4 focus:ring-audiogold-200 outline-none transition-all duration-300 bg-white/80 hover:bg-white hover:shadow-md"
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
                                    class="w-full px-4 py-3 rounded-xl border-2 border-audiogold-200 focus:border-audiogold-500 focus:ring-4 focus:ring-audiogold-200 outline-none transition-all duration-300 bg-white/80 hover:bg-white hover:shadow-md resize-none"
                                    placeholder="Enter your message..."
                                ></textarea>
                                <p class="text-sm text-gray-500 mt-2">{{ form.message.length }} / 180</p>
                            </div>

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

                    <!-- Contact Information -->
                    <div class="space-y-6">
                        <div class="backdrop-blur-md bg-white/60 rounded-3xl p-8 shadow-2xl border border-white/50 hover:shadow-3xl hover:bg-white/70 transition-all duration-500">
                            <h3 class="text-2xl font-bold mb-6">
                                <span class="bg-gradient-to-r from-audiogold-600 to-audiogold-800 bg-clip-text text-transparent">
                                    Contact Information
                                </span>
                            </h3>

                            <div class="space-y-5">
                                <div class="flex items-start space-x-4 p-3 rounded-xl hover:bg-white/60 transition-all duration-300">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-700 mb-1">Mail ID</p>
                                        <a href="mailto:shivamelectronics7@gmail.com" class="text-audiogold-600 hover:text-audiogold-700 break-all">
                                            shivamelectronics7@gmail.com
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 p-3 rounded-xl hover:bg-white/60 transition-all duration-300">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-700 mb-1">Contact</p>
                                        <a href="tel:+917011651721" class="text-audiogold-600 hover:text-audiogold-700">
                                            +91 7011651721
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 p-3 rounded-xl hover:bg-white/60 transition-all duration-300">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01C17.18 3.03 14.69 2 12.04 2m.01 1.67c2.2 0 4.26.86 5.82 2.42a8.225 8.225 0 0 1 2.41 5.83c0 4.54-3.7 8.23-8.24 8.23-1.48 0-2.93-.39-4.19-1.15l-.3-.17-3.12.82.83-3.04-.2-.32a8.188 8.188 0 0 1-1.26-4.38c.01-4.54 3.7-8.24 8.25-8.24M8.53 7.33c-.16 0-.43.06-.66.31-.22.25-.87.85-.87 2.07 0 1.22.89 2.39 1 2.56.14.17 1.76 2.67 4.25 3.73.59.27 1.05.42 1.41.53.59.19 1.13.16 1.56.1.48-.07 1.46-.6 1.67-1.18.21-.58.21-1.07.15-1.18-.07-.1-.23-.16-.48-.27-.25-.14-1.47-.74-1.69-.82-.23-.08-.37-.12-.56.12-.16.25-.64.81-.78.97-.15.17-.29.19-.53.07-.26-.13-1.06-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.39.11-.5.11-.11.25-.29.37-.44.13-.14.17-.25.25-.41.08-.17.04-.31-.02-.43-.06-.11-.56-1.35-.77-1.84-.2-.48-.4-.42-.56-.43-.14 0-.3-.01-.47-.01z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-700 mb-1">WhatsApp</p>
                                        <a href="https://wa.me/917011651721" target="_blank" class="text-audiogold-600 hover:text-audiogold-700">
                                            +91 7011651721
                                        </a>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 p-3 rounded-xl hover:bg-white/60 transition-all duration-300">
                                    <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-amber-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-700 mb-1">Timing</p>
                                        <p class="text-gray-600">Monday to Saturday<br>9:00 AM – 6:00 PM</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-4 p-3 rounded-xl hover:bg-white/60 transition-all duration-300">
                                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-rose-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-700 mb-1">Address</p>
                                        <p class="text-gray-600">A-64 Roop nagar industrial area<br>Loni Ghaziabad</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="backdrop-blur-md bg-gradient-to-br from-audiogold-50 to-audiogold-100 rounded-3xl p-8 md:p-12 shadow-2xl border border-audiogold-200/50 text-center">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Stay Updated</h2>
                    <p class="text-gray-600 mb-8">Get the latest updates, tips, and product information by subscribing to our newsletter and following us on social media.</p>
                    <form @submit.prevent="subscribeNewsletter" class="max-w-md mx-auto flex gap-3">
                        <input
                            v-model="newsletterForm.email"
                            type="email"
                            required
                            placeholder="Your email address"
                            class="flex-1 px-6 py-3 rounded-xl border-2 border-audiogold-300 focus:border-audiogold-500 focus:ring-2 focus:ring-audiogold-300 outline-none bg-white"
                        />
                        <button
                            type="submit"
                            :disabled="newsletterForm.processing"
                            class="px-6 py-3 bg-gradient-to-r from-audiogold-600 to-audiogold-700 text-white rounded-xl font-semibold hover:from-audiogold-700 hover:to-audiogold-800 transition-all duration-300 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import AnimatedBackground from '@/Pages/Home/Components/AnimatedBackground.vue';

const form = useForm({
    firstName: '',
    email: '',
    phone: '',
    message: '',
    page_source: 'support'
});

const newsletterForm = useForm({
    email: ''
});

const submitForm = () => {
    form.post(route('contact.submit'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};

const subscribeNewsletter = () => {
    newsletterForm.post(route('newsletter.subscribe'), {
        preserveScroll: true,
        onSuccess: () => newsletterForm.reset(),
    });
};
</script>
