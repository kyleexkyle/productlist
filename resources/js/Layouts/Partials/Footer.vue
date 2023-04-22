<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const app = computed(() => usePage().props.app)

</script>

<template>
    <div
        class="bg-white dark:bg-gray-800 w-full p-6 border-t-2 dark:border-gray-700"
    >
        <div class="flex flex-row justify-between">
            <div class="wrapper-link flex gap-4 text-sm text-gray-400">
                <p>{{ app.url }} &copy; {{ app.year }}</p>
            </div>

            <div class="wrapper-link flex gap-4 text-sm text-gray-400">
                <p>Server Time: {{  app.timezone }}</p>
            </div>
        </div>
    </div>
</template>
