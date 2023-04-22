a<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Pagination from "@/Components/Pagination.vue";
import {ref, watch} from "vue";
import { router } from '@inertiajs/vue3'
import Swal from "sweetalert2";

const props = defineProps({
    products : {
        type: Object,
        required: true
    },
    filters : Object,
    categories: {
        type: Object,
        required: true
    }
});

const form = useForm({});

const removeProduct = (product,index) => {
    Swal.fire({
        icon: "warning",
        title: 'Are you sure you want to remove this product?',
        text: "This product will be archived.",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, I am sure!',
        cancelButtonText: "No, cancel it!"
    }).then(
        function (result) {
            if (result['isConfirmed']){

                form.delete(route('products.destroy',{product:product.id}), {
                    onSuccess: (response) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product has been removed!',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        props.products.data.splice(index,0);
                    },onError: (error) => {
                        console.log(error)
                    }
                });
            }
        },
        function () { return false; });
}

let search = ref(props.filters.search);
let category = ref(props.filters.category);

watch(search, value => {
    router.get(
        '/products',{...(value !== "" ? { search: value } : null)},{
            preserveState: true,
            replace: true
        })
});

watch(category, value => {
    router.get(
        '/products',{...(value !== "" ? { category: value } : null)},{
            preserveState: true,
            replace: true
        })
});

const resetFilters = () => {
    category.value = ''; // or some default value
    search.value = ''; // or some default value
}

</script>

<template>
    <AuthenticatedLayout title="Dashboard">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a
                        href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="mr-2 w-4 h-4">
                            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                        Products
                    </a>
                </li>
            </ol>
        </nav>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-2">
                <div class="flex justify-between ">
                    <div class="space-x-2">
                        <input v-model="search"
                               type="text"
                               placeholder="Search..."
                               class="border-none  shadow-sm px-2 rounded-lg"/>

                        <select v-model="category"
                                name="category"
                                id="category"
                                class="border-none  shadow-sm px-2 rounded-lg w-40">
                            <option selected value="">Categories</option>
                            <template  v-for="(category) in categories.data">
                                <option :value="category.id">{{ category.name }}</option>
                            </template>
                        </select>

                        <button @click="resetFilters()"
                            class="bg-white px-4 py-3 text-sm leading-4 shadow rounded-lg hover:bg-indigo-600 hover:text-white dark:hover:bg-gray-700 dark:hover:text-white">
                            Reset Filters
                        </button>

                    </div>

                    <Link :href="route('products.create')"
                        class="bg-white px-4 py-3 text-sm leading-4 shadow rounded-lg hover:bg-indigo-600 hover:text-white dark:hover:bg-gray-700 dark:hover:text-white"
                        preserve-scroll>
                        Create
                    </Link>
                </div>

                <div class="bg-white shadow rounded-lg p-1.5">
                    <table
                        class="w-full text-sm text-left lg:overflow-auto overflow-x-scroll"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50"
                        >
                        <tr>
                            <th scope="col" class="uppercase px-6 py-3">Name</th>
                            <th scope="col" class="uppercase px-6 py-3">Description</th>
                            <th scope="col" class="uppercase px-6 py-3">Category</th>
                            <th scope="col" class="uppercase px-6 py-3">Date/Time</th>
                            <th scope="col" class="uppercase px-6 py-3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr
                            class="bg-white border-b odd:bg-white even:bg-gray-50"
                            v-for="(product,index) in products.data"
                            :key="product.id"
                        >
                            <td class="px-6 py-4">
                                {{ product.name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ product.description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ product.category.name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ product.date_time }}
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <Link class="text-yellow-500 " :href="route('products.edit',{product:product.id})">
                                    Edit
                                </Link>

                                <button @click="removeProduct(product,index)" class="text-red-500">Remove</button>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

                <Pagination :links="products.meta.links" />
            </div>
        </div>
    </AuthenticatedLayout>

    <div class="text-red-800 bg-red-300 text-green-800 bg-green-300">

    </div>
</template>
