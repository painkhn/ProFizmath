<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { User } from '@/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    user: User
}>()

</script>

<template>
    <Head :title="props.user.name" />

    <MainLayout>
        
    </MainLayout>
</template>