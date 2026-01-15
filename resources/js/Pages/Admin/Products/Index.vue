<template>
    <Head title="Products - AudioGold Admin" />

    <AdminLayout page-title="Products Management">
        <!-- Header Actions -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Products</h2>
                <p class="text-gray-600 mt-1">Manage your product catalog</p>
            </div>
            <Link
                :href="route('admin.products.create')"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Product
            </Link>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                    <div class="relative">
                        <input
                            v-model="filterForm.search"
                            type="text"
                            placeholder="Search by product name..."
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500 transition-all duration-200"
                            @input="debouncedSearch"
                        />
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Category Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select
                        v-model="filterForm.category"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500 transition-all duration-200"
                        @change="applyFilters"
                    >
                        <option value="">All Categories</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>

                <!-- Status Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select
                        v-model="filterForm.status"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-audiogold-500 focus:border-audiogold-500 transition-all duration-200"
                        @change="applyFilters"
                    >
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Active Filters & Clear -->
            <div v-if="hasActiveFilters" class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200">
                <div class="flex items-center gap-2 flex-wrap">
                    <span class="text-sm text-gray-500">Active filters:</span>
                    <span v-if="filterForm.search" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Search: {{ filterForm.search }}
                        <button @click="clearFilter('search')" class="ml-1 hover:text-blue-600">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                    <span v-if="filterForm.category" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                        Category: {{ getCategoryName(filterForm.category) }}
                        <button @click="clearFilter('category')" class="ml-1 hover:text-purple-600">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                    <span v-if="filterForm.status" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Status: {{ filterForm.status === 'active' ? 'Active' : 'Inactive' }}
                        <button @click="clearFilter('status')" class="ml-1 hover:text-green-600">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                </div>
                <button
                    @click="clearAllFilters"
                    class="text-sm text-red-600 hover:text-red-700 font-medium flex items-center gap-1"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Clear All
                </button>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-gray-50 to-white border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Product</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Slug</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Order</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr v-for="product in products.data" :key="product.id" class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                        <img v-if="product.images && product.images.length > 0"
                                             :src="product.images[0]"
                                             :alt="product.name"
                                             class="w-full h-full object-cover"
                                        />
                                        <div v-else class="w-full h-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ product.name }}</p>
                                        <p class="text-xs text-gray-500">{{ product.images ? product.images.length : 0 }} images</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ product.category.name }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <code class="text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded">{{ product.slug }}</code>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-900">{{ product.order }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span v-if="product.is_active"
                                      class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Active
                                </span>
                                <span v-else
                                      class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    Inactive
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <Link
                                    :href="route('admin.products.edit', product.id)"
                                    class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-200 text-sm font-medium"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </Link>
                                <button
                                    @click="deleteProduct(product.id)"
                                    class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-200 text-sm font-medium"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div v-if="products.links.length > 3" class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex flex-wrap items-center justify-center gap-2">
                    <template v-for="(link, index) in products.links" :key="index">
                        <Link
                            v-if="link.url"
                            :href="link.url"
                            :class="[
                                'px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200',
                                link.active
                                    ? 'bg-gradient-to-r from-audiogold-500 to-orange-600 text-white shadow-lg'
                                    : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'
                            ]"
                            v-html="link.label"
                        />
                        <span
                            v-else
                            class="px-4 py-2 text-sm font-medium text-gray-400 cursor-not-allowed"
                            v-html="link.label"
                        />
                    </template>
                </div>
            </div>

            <!-- Empty State -->
            <div v-if="products.data.length === 0" class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No products yet</h3>
                <p class="text-gray-600 mb-6">Get started by adding your first product</p>
                <Link
                    :href="route('admin.products.create')"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-audiogold-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-audiogold-500/50 transition-all duration-300 hover:scale-105"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Your First Product
                </Link>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue';

const props = defineProps({
    products: Object,
    categories: Array,
    filters: Object,
});

// Filter form
const filterForm = ref({
    search: props.filters?.search || '',
    category: props.filters?.category || '',
    status: props.filters?.status || '',
});

// Debounce timer
let searchTimeout = null;

// Check if any filters are active
const hasActiveFilters = computed(() => {
    return filterForm.value.search || filterForm.value.category || filterForm.value.status;
});

// Get category name by ID
const getCategoryName = (id) => {
    const category = props.categories?.find(c => c.id == id);
    return category ? category.name : '';
};

// Debounced search
const debouncedSearch = () => {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        applyFilters();
    }, 300);
};

// Apply filters
const applyFilters = () => {
    router.get(route('admin.products.index'), {
        search: filterForm.value.search || undefined,
        category: filterForm.value.category || undefined,
        status: filterForm.value.status || undefined,
    }, {
        preserveState: true,
        preserveScroll: true,
    });
};

// Clear single filter
const clearFilter = (filterName) => {
    filterForm.value[filterName] = '';
    applyFilters();
};

// Clear all filters
const clearAllFilters = () => {
    filterForm.value.search = '';
    filterForm.value.category = '';
    filterForm.value.status = '';
    applyFilters();
};

const deleteProduct = (id) => {
    if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
        router.delete(route('admin.products.destroy', id));
    }
};
</script>
