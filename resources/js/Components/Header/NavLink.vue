<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String
})

</script>

<template>
    <Link :href="props.href" class="bg-gradient-to-r from-red-500 to-blue-500 bg-[length:0_2px] bg-left-bottom bg-no-repeat transition-all duration-300 hover:bg-[length:100%_2px] py-1">
        <slot />
    </Link>
</template>