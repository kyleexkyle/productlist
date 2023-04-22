<script setup>
import {Link} from '@inertiajs/vue3';


const props = defineProps({
    links : {
        type: Object,
        required: true
    }
});

</script>

<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1 ">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="bg-gray-100 dark:bg-gray-600 hover:cursor-not-allowed dark:text-gray-400 mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 shadow rounded"
                     v-html="link.label" />

                <Link  v-else
                       class=" mr-1 mb-1 px-4 py-3 text-sm leading-4 shadow rounded hover:bg-indigo-600 hover:text-white dark:hover:bg-gray-700 dark:hover:text-white"
                       :class="[ link.active ? 'bg-indigo-600 dark:bg-gray-600 text-white': 'bg-white dark:bg-gray-800 dark:text-gray-400' ]" :href="link.url" v-html="link.label"
                       preserve-scroll></Link>

            </template>
        </div>
    </div>
</template>
