<script setup lang="ts">
import CourseStore from '@/Components/Admin/CourseStore.vue';
import SubjectStore from '@/Components/Admin/SubjectStore.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Grade, Subject, User } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps<{
    subjects: Subject[] | undefined
    grades: Grade[] | undefined
    teachers: User[] | undefined
}>()
</script>

<template>
    <Head title="Панель администратора" />

    <MainLayout>
        <div class="grid grid-cols-3">
            <CourseStore :subjects="props.subjects" :grades="props.grades" :teachers="props.teachers" />
            <SubjectStore />
        </div>
    </MainLayout>
</template>