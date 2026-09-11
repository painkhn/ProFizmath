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
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-4">
                <div class="space-y-4 text-lg">
                    <h2 class="text-2xl font-bold">
                        {{ props.course.title }}
                    </h2>
                    <p class="font-semibold">
                        {{ props.course.subject.title }} - {{ props.course.grade.value }} класс
                    </p>
                </div>
                <p class="opacity-80">
                    {{ props.course.description }}
                </p>
            </div>
            <div class="space-y-2 p-4 bg-gray-100 rounded-xl border border-gray-200 relative">
                <button class="absolute top-4 right-4" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-heart">
                        <path
                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                    </svg>
                </button>
                <p><span class="font-semibold">Длительность курса:</span> {{ props.course.duration }}</p>
                <p><span class="font-semibold">Преподователь:</span> {{ props.course.teacher.name }}</p>
                <p><span class="font-semibold">Формат:</span> {{ props.course.course_format }}</p>
                <p><span class="font-semibold">Язык:</span> {{ props.course.language }}</p>
                <p><span class="font-semibold">Стоимость:</span> {{ props.course.price }} ₽</p>
                <button class="w-full bg-white py-2 rounded-md">
                    Добавить в корзину
                </button>
            </div>
        </div>
    </MainLayout>
</template>