<script setup>
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue';

</script>

<template>
    <AdminLayout title="Dashboard">
        <div class="space-y-4">
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
                            Dashboard
                        </a>
                    </li>
                </ol>
            </nav>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">You're logged in!</div>
            </div>

            <!-- component -->
            <section class="bg-white dark:bg-gray-900 rounded-lg shadow-sm">
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-8 xl:gap-12 sm:grid-cols-2 xl:grid-cols-4 lg:grid-cols-3">
                        <div class="w-full ">
                            <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600"></div>

                            <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                            <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        </div>

                        <div class="w-full ">
                            <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600"></div>

                            <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                            <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        </div>

                        <div class="w-full ">
                            <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600"></div>

                            <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                            <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        </div>

                        <div class="w-full ">
                            <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600"></div>

                            <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                            <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        </div>

                        <div class="w-full ">
                            <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600"></div>

                            <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                            <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        </div>

                        <div class="w-full ">
                            <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600"></div>

                            <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                            <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        </div>

                        <div class="w-full ">
                            <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600"></div>

                            <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                            <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        </div>

                        <div class="w-full ">
                            <div class="w-full h-64 bg-gray-300 rounded-lg dark:bg-gray-600"></div>

                            <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                            <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </AdminLayout>
</template>
