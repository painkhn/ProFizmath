<script setup lang="ts">
import CourseStore from '@/Components/Admin/CourseStore.vue';
import SubjectStore from '@/Components/Admin/SubjectStore.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Grade, Subject } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps<{
    subjects: Subject[] | undefined
    grades: Grade[] | undefined
}>()
</script>

<template>
    <Head title="Панель администратора" />

    <MainLayout>
        <div class="grid grid-cols-3">
            <CourseStore :subjects="props.subjects" :grades="props.grades" />
            <SubjectStore />
        </div>
    </MainLayout>
</template>