<script setup lang="ts">
import { Course } from '@/types';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    course: Course
    teacherCourses: Course[] | undefined
}>()
</script>

<template>
    <Link :href="route('profile.index', { id: props.course.teacher.id })"
        class="p-4 bg-gray-200 mt-10 rounded-lg flex gap-4">
    <div>
        <img src="/images/default_avatar.png" alt="" class="max-w-32 rounded-md">
    </div>
    <div class="space-y-2">
        <p class="text-2xl font-semibold">
            {{ props.course.teacher.name }}
        </p>
        <p class="font-semibold">
            {{ props.course.teacher.email }}
        </p>
        <p class="font-semibold">
            Количество курсов преподователя: {{ props.teacherCourses?.length }}
        </p>
    </div>
    </Link>
</template>