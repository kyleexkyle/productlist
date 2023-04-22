<script setup>
import Sidebar from "@/Layouts/Partials/Sidebar.vue";
import Header from "@/Layouts/Partials/Header.vue";
import Footer from "@/Layouts/Partials/Footer.vue";
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String
});
</script>

<template>
    <Head :title="title" />
    <!-- App -->
    <div class="font-lexend flex bg-packed font-lexend dark:bg-gray-900">
        <div
            id="sidebar-scroll"
            class="flex-sidebar lg:flex-auto w-sidebar lg:block hidden bg-white dark:bg-gray-800 border-r-2 dark:border-gray-700 h-screen lg:z-0 z-40 overflow-auto lg:relative fixed"
        >
            <Sidebar />
        </div>
        <div class="flex-auto w-full overflow-auto h-screen">
            <Header  />

            <div class="p-4">
                <slot></slot>
            </div>

            <Footer class="mt-4"/>
        </div>
    </div>
    <!-- end app -->
</template>
