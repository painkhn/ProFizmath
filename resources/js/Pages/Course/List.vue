<script setup lang="ts">
import CourseCard from '@/Components/Course/CourseCard.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Course, Grade, Subject } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const props = defineProps<{
    courses: Course[] | undefined
    subjects: Subject[] | undefined
    grades: Grade[] | undefined
}>()

const search = ref('')
const selectedSubject = ref<number | ''>('')
const selectedGrade = ref<number | ''>('')
const sort = ref<'none' | 'asc' | 'desc'>('none')

const sourceCourses = computed<Course[]>(() => props.courses ?? [])

const filteredCourses = computed(() => {
    let list = [...sourceCourses.value]

    const q = search.value.trim().toLowerCase()
    if (q) {
        list = list.filter(c => c.title.toLowerCase().includes(q))
    }

    if (selectedSubject.value !== '') {
        list = list.filter(c => c.subject?.id === selectedSubject.value)
    }

    if (selectedGrade.value !== '') {
        list = list.filter(c => c.grade?.id === selectedGrade.value)
    }

    if (sort.value === 'asc') {
        list.sort((a, b) => Number(a.price) - Number(b.price))
    } else if (sort.value === 'desc') {
        list.sort((a, b) => Number(b.price) - Number(a.price))
    }

    return list
})

const subjectOptions = computed<Subject[]>(() => props.subjects ?? [])
const gradeOptions = computed<Grade[]>(() => props.grades ?? [])

function resetFilters() {
    search.value = ''
    selectedSubject.value = ''
    selectedGrade.value = ''
    sort.value = 'none'
}
</script>

<template>

    <Head title="Курсы" />

    <MainLayout>
        <div class="mb-6 flex gap-4">
            <input v-model="search" type="text" placeholder="Поиск по названию..."
                class="border border-gray-300 rounded-md px-3 py-2 w-1/2" />

            <select v-model="selectedSubject" class="border border-gray-300 rounded-md px-3 py-2 w-2/12">
                <option value="">Все предметы</option>
                <option v-for="s in subjectOptions" :key="s.id" :value="s.id">
                    {{ s.title }}
                </option>
            </select>

            <select v-model="selectedGrade" class="border border-gray-300 rounded-md px-3 py-2 w-2/12">
                <option value="">Все классы</option>
                <option v-for="g in gradeOptions" :key="g.id" :value="g.id">
                    {{ g.value }} класс
                </option>
            </select>

            <select v-model="sort" class="border border-gray-300 rounded-md px-3 py-2 w-2/12">
                <option value="none">Без сортировки</option>
                <option value="asc">Цена: по возрастанию</option>
                <option value="desc">Цена: по убыванию</option>
            </select>
        </div>

        <button @click="resetFilters" class="mb-4 text-sm text-gray-500 underline">
            Сбросить фильтры
        </button>

        <ul v-if="filteredCourses.length" class="grid grid-cols-4 gap-8">
            <CourseCard :courses="filteredCourses" />
        </ul>
        <p v-else-if="!sourceCourses.length">
            Не удалось загрузить курсы 😢
        </p>
        <p v-else>
            Ничего не найдено 😢
        </p>
    </MainLayout>
</template>