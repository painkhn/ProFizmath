<script setup lang="ts">
import Header from '@/Components/Header/Index.vue'
</script>

<template>
    <Header />

    <main class="p-8">
        <div class="w-2/3 mx-auto">
            <slot />
        </div>
    </main>
</template>