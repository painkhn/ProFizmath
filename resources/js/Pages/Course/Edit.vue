<script setup lang="ts">
import { Course } from '@/types';

const props = defineProps<{
    course: Course
}>()
</script>

<template>
    <p>
        {{ props.course.title }}
    </p>
</template>