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
            <div class="space-y-2 p-4 bg-gray-100 rounded-xl border border-gray-200">
                <p><span class="font-semibold">Длительность курса:</span> 1 час 23 минуты</p>
                <p><span class="font-semibold">Преподователь:</span> Юлия Халтаева</p>
                <p><span class="font-semibold">Формат:</span> Видеоуроки</p>
                <p><span class="font-semibold">Язык:</span> Русский</p>
                <p><span class="font-semibold">Стоимость:</span> {{ props.course.price }} ₽</p>
            </div>
        </div>
    </MainLayout>
</template>