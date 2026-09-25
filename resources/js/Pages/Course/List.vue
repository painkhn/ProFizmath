<script setup lang="ts">
import CourseCard from '@/Components/Course/CourseCard.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Course } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps<{
    courses: Course[] | undefined
}>()
</script>

<template>
    <Head title="Курсы" />

    <MainLayout>
        <ul class="grid grid-cols-4 gap-8" v-if="props.courses && props.courses?.length >= 1">
            <CourseCard :courses="props.courses" />
        </ul>
        <p v-else>
            Не удалось загрузить курсы 😢
        </p>
    </MainLayout>
</template>