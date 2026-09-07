<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Course } from '@/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    course: Course
}>()
</script>

<template>
    <Head :title="props.course.title" />

    <MainLayout>
        
    </MainLayout>
</template>