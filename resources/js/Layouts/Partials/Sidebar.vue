<script setup>
import {Head, Link} from '@inertiajs/vue3';
import {Icon} from "@iconify/vue";
import MenuAccordion from "@/Layouts/Partials/MenuAccordion.vue";

const sidebarToggle = () => {
    document.querySelector(".flex-sidebar").classList.add("hidden");
}

const isActive = (url) => {
    return window.location.href === url
}

</script>

<style>
.active {
}
</style>

<template>
    <!-- sidebar -->
    <nav class="sidebar bg-white dark:bg-gray-800">
        <!-- sidebar head -->
        <div class="sidebar-head p-4">
            <Link
                :href="route('welcome')">
                <h2
                    class="text-2xl font-normal text-gray-800 dark:text-gray-500"
                    translate="no"
                >
                    Product List<span class="text-primary">.</span>
                    <span
                        class="bg-gray-700 absolute mt-2 dark:block hidden rounded-md py-1 px-2 text-xs text-gray-200"
                    >Dark mode</span
                    >
                </h2>
            </Link>
            <button class="lg:hidden block float-right -mt-7" @click="sidebarToggle">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                    role="img"
                    width="25px"
                    height="25px"
                    preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 32 32"
                >
                    <path
                        fill="currentColor"
                        d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z"
                    />
                </svg>
            </button>
        </div>
        <!-- sidebar list -->
        <div class="sidebar-list p-4 mt-4">
            <p class="font-medium text-gray-400 dark:text-gray-600">Menu</p>
            <div class="wrap-item mt-4 dark:text-gray-500 space-y-1">

                <div class="item">
                    <Link :class="[isActive(route('dashboard')) ? 'bg-indigo-600 text-white dark:text-gray-300 dark:bg-gray-600' : 'hover:bg-gray-100 dark:hover:bg-gray-700']"
                        :href="route('dashboard')"
                        class="w-full flex text-left rounded-md box-border p-3">
                        <span class="mr-3 text-xl">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="mt-0.5 w-5 h-5">
                              <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                              <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                            </svg>
                        </span>
                        <span class="w-full"> Dashboard </span>
                    </Link>
                </div>

                <div class="item">
                    <Link :class="[isActive(route('products.index')) ? 'bg-indigo-600 text-white dark:text-gray-300 dark:bg-gray-600' : 'hover:bg-gray-100 dark:hover:bg-gray-700']"
                          :href="route('products.index')"
                          class="w-full flex text-left rounded-md box-border p-3">
                        <span class="mr-3 text-xl">


                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="mt-0.5 w-5 h-5">
                              <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd" />
                            </svg>


                        </span>
                        <span class="w-full"> Product List </span>
                    </Link>
                </div>


                <div class="item">
                    <Link :class="[isActive(route('products.create')) ? 'bg-indigo-600 text-white dark:text-gray-300 dark:bg-gray-600' : 'hover:bg-gray-100 dark:hover:bg-gray-700']"
                          :href="route('products.create')"
                          class="w-full flex text-left rounded-md box-border p-3">
                        <span class="mr-3 text-xl">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="mt-0.5 w-5 h-5">
                              <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                            </svg>


                        </span>
                        <span class="w-full"> Create Product </span>
                    </Link>
                </div>
            </div>
        </div>
    </nav>
</template>
