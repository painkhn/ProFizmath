<script setup lang="ts">
import { Grade, Subject, User } from '@/types';
import { useForm } from '@inertiajs/vue3';

const props = defineProps<{
    subjects: Subject[] | undefined
    grades: Grade[] | undefined
    teachers: User[] | undefined
}>()

const form = useForm({
    title: '',
    description: '',
    price: '',
    course_format: '',
    language: '',
    duration: '',
    grade_id: '',
    subject_id: '',
    teacher_id: '',
})

const submit = () => {
    console.log(form.teacher_id);
    
    form.post(route('course.store')), {
        onSuccess: () => {
            form.reset()
            console.log('заебись');

        }
    }
}
</script>

<template>
    <form class="max-w-xl space-y-4" @submit.prevent="submit">
        <h2>
            Добавить курс
        </h2>
        <div class="flex flex-col">
            <label>
                Название
            </label>
            <input type="text" v-model="form.title" class="bg-gray-200">
        </div>
        <div class="flex flex-col">
            <label>
                Описание
            </label>
            <textarea type="text" v-model="form.description" class="bg-gray-200"></textarea>
        </div>
        <div class="flex flex-col">
            <label>
                Стоимость
            </label>
            <input type="number" v-model="form.price" class="bg-gray-200">
        </div>
        <div class="flex flex-col">
            <label>
                Язык
            </label>
            <input type="text" v-model="form.language" class="bg-gray-200">
        </div>
        <div class="flex flex-col">
            <label>
                Формат
            </label>
            <input type="text" v-model="form.course_format" class="bg-gray-200">
        </div>
        <div class="flex flex-col">
            <label>
                Длительность
            </label>
            <input type="time" v-model="form.duration" class="bg-gray-200">
        </div>
        <div class="flex flex-col">
            <label>
                Предмет
            </label>
            <select type="select" class="bg-gray-200" v-model="form.subject_id">
                <option selected>Выберите предмет</option>
                <option :value="subject.id" v-for="(subject, index) in props.subjects" :key="index">
                    {{ subject.title }}
                </option>
            </select>
        </div>
        <div class="flex flex-col">
            <label>
                Класс
            </label>
            <select type="select" class="bg-gray-200" v-model="form.grade_id">
                <option selected>Выберите класс</option>
                <option :value="grade.id" v-for="(grade, index) in props.grades" :key="index">
                    {{ grade.value }}
                </option>
            </select>
        </div>
        <div class="flex flex-col">
            <label>
                Преподаватель
            </label>
            <select type="select" class="bg-gray-200" v-model="form.teacher_id">
                <option selected>Выберите преподавателя</option>
                <option :value="teacher.id" v-for="(teacher, index) in props.teachers" :key="index">
                    {{ teacher.name }}
                </option>
            </select>
        </div>
        <button type="submit" class="w-full py-2 bg-gray-200">Добавить курс</button>
    </form>
</template>