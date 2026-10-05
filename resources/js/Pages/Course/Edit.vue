<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Course, CourseForm, Grade, Subject, User } from '@/types';
import { useForm } from '@inertiajs/vue3';

const props = defineProps<{
    subjects: Subject[] | undefined
    grades: Grade[] | undefined
    teachers: User[] | undefined
    course: Course
}>()

const form = useForm<CourseForm>({
    title: props.course.title || '',
    description: props.course.description || '',
    price: props.course.price,
    course_format: props.course.course_format || '',
    language: props.course.language || '',
    duration: props.course.duration || '',
    grade_id: props.course.grade.id,
    subject_id: props.course.subject.id,
    teacher_id: props.course.teacher.id,
    image: null
})

function handleImage(e: Event): void {
    const target = e.target as HTMLInputElement
    form.image = target.files?.[0] ?? null
}

const submit = () => {
    form.patch(route('course.update', { id: props.course.id }), {
        forceFormData: true,
        onSuccess: () => {
            form.reset()
            console.log('заебись')
        },
    })
}

const deleteToggle = () => {
    const block = document.getElementById('delete-block')
    block?.classList.toggle('hidden')
}

const deleteCourse = (id: number) => {
    form.delete(route('course.destroy', { id: props.course.id }), {
        forceFormData: true,
        onSuccess: () => {
            console.log('заебись');
        }
    })
}
</script>

<template>
    <MainLayout>
        <form class="w-full space-y-4" @submit.prevent="submit">
            <h2>
                {{ props.course.title }}
            </h2>
            <div class="grid grid-cols-2 gap-8">
                <div class="space-y-4">
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
                            Изображение
                        </label>
                        <input type="file" @change="handleImage" class="bg-gray-200 p-2 border border-black">
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
                </div>
                <div class="space-y-4">
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
                            <option disabled value="">Выберите предмет</option>
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
                    <button type="submit" class="w-full py-2 bg-gray-200">Сохранить изменения</button>
                    <button @click="deleteToggle" type="button" class="w-full py-2 bg-gray-200">Удалить курс</button>
                    <div id="delete-block" class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 bg-gray-200 p-4 space-y-4 shadow-md shadow-black/70 hidden">
                        <h3>Вы уверены что хотите удалить курс?</h3>
                        <form @submit.prevent="deleteCourse()" class="space-y-2">
                            <button type="submit" class="w-full py-2 bg-red-200">Да, удалить курс</button>
                            <button @click="deleteToggle" type="button" class="w-full py-2 bg-white">Отмена</button>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </MainLayout>
</template>