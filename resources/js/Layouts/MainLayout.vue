<script setup lang="ts">
import Header from '@/Components/Header/Index.vue'
</script>

<template>
    <div class="pt-1.5 px-1.5">
        <Header />

        <div>
            <slot />
        </div>

        *footer
    </div>
</template>