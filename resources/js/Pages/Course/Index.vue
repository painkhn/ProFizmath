<script setup lang="ts">
import CourseInfo from '@/Components/Course/CourseInfo.vue';
import TeacherCard from '@/Components/Course/TeacherCard.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Course } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps<{
    course: Course
    teacherCourses: Course[] | undefined
}>()
</script>

<template>
    <Head :title="props.course.title" />

    <MainLayout>
        <div class="grid grid-cols-2 gap-8">
            <CourseInfo :course="props.course" />
        </div>
        <TeacherCard :course="props.course" :teacher-courses="props.teacherCourses" />
    </MainLayout>
</template>