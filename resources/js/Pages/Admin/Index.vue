<script setup lang="ts">
import CourseStore from '@/Components/Admin/CourseStore.vue';
import SubjectStore from '@/Components/Admin/SubjectStore.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Course, Grade, Subject, User } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const props = defineProps<{
    subjects: Subject[] | undefined
    grades: Grade[] | undefined
    teachers: User[] | undefined
    courses: Course[]
    filters: {
        search?: string
        subject?: string | number
        grade?: string | number
        teacher?: string | number
    }
}>()

const search = ref(props.filters.search ?? '')

function applySearch() {
    router.get(
        route('admin.index'),
        { search: search.value || undefined},
        {
            preserveState: true,
            preserveScroll: true,
            replace: true,
            only: ['courses', 'filters'],
        }
    )
}

let timer: ReturnType<typeof setTimeout> | undefined
watch(search, () => {
    clearTimeout(timer)
    timer = setTimeout(applySearch, 300)
})
</script>

<template>
    <Head title="Панель администратора" />

    <MainLayout>
        <div class="grid grid-cols-3 gap-8">
            <CourseStore :subjects="props.subjects" :grades="props.grades" :teachers="props.teachers" />
            <SubjectStore />
            <div class="space-y-6">
                <h2>
                    Поиск курсов
                </h2>
                <!-- Форма поиска -->
                <form @submit.prevent="applySearch" class="flex gap-3">
                    <input v-model="search" type="text" placeholder="Название курса..."
                        class="border px-4 py-2 flex-1" />
                    <button type="submit" class="px-4 py-2 bg-gray-200">
                        Найти
                    </button>
                </form>

                <!-- Таблица курсов -->
                <ul class="space-y-4">
                    <li v-for="(course, index) in courses" :key="course.id" class="grid grid-cols-5 gap-4">
                        <Link :href="route('course.index', { id: course.id })" class="bg-gray-200 p-4 block col-span-4">
                            <h3 class="font-semibold">
                                {{ course.title }}
                            </h3>
                            <p class="line-clamp-1 opacity-80 text-sm">
                                {{ course.description }}
                            </p>
                        </Link>
                        <Link href="/" class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-square-pen preview-icon">
                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path
                                    d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z" />
                            </svg>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </MainLayout>
</template>