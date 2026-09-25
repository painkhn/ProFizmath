<script setup lang="ts">
import { Course } from '@/types';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    courses: Course[] | undefined
}>()
</script>

<template>
    <li v-for="(course, index) in props.courses" :key="course.id" class="space-y-4 p-4 rounded-md border border-gray-200">
        <Link :href="route('course.index', { id: course.id })">
            <div class="w-full bg-gray-200 p-6 rounded-xl space-y-4">
                <div>
                    <h4 class="opacity-70">
                        {{ course.subject.title }} - {{ course.grade.value }} класс
                    </h4>
                    <h3 class="font-semibold text-xl text-gray-800">
                        {{ course.title }}
                    </h3>
                </div>
                <img :src="course.image" alt="" v-if="course.image !== null">
                <img src="/images/example_image.jpg" alt="" v-else>
                <span class="inline-block">{{ course.price }} ₽</span>
            </div>
        </Link>
        <div>
            <button class="w-full bg-gray-200 rounded-md py-2">
                Добавить в корзину
            </button>
        </div>
    </li>
</template>