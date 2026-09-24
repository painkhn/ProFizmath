<script setup lang="ts">
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
            <li v-for="(course, index) in props.courses" :key="index">
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
                        <img :src="course.image" alt="" v-if="course.image !== null" >
                        <img src="/images/example_image.jpg" alt="" v-else>
                        <span class="inline-block">{{ course.price }} ₽</span>
                        <div>
                            <button class="w-full bg-white rounded-md py-2">
                                Добавить в корзину
                            </button>
                        </div>
                    </div>
                </Link>
            </li>
        </ul>
        <p v-else>
            Не удалось загрузить курсы 😢
        </p>
    </MainLayout>
</template>