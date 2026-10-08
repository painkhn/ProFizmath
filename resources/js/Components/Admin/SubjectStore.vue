<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import TeacherStore from './TeacherStore.vue';
import MakeStudent from './MakeStudent.vue';
import { User } from '@/types/';

const props = defineProps<{
    students: User[] | undefined
    teachers: User[] | undefined
}>()

const form = useForm({
    title: ''
})

const submit = () => {
    form.post(route('subject.store')), {
        onSuccess: () => {
            form.reset()
            console.log('заебись');

        }
    }
}
</script>

<template>
    <div class="space-y-4">
        <form class="max-w-xl space-y-4" @submit.prevent="submit">
            <h2>
                Добавить предмет
            </h2>
            <div class="flex flex-col">
                <label>
                    Название предмета
                </label>
                <input type="text" v-model="form.title" class="bg-gray-200">
            </div>
            <button type="submit" class="w-full py-2 bg-gray-200">Добавить предмет</button>
        </form>
        <TeacherStore :students="props.students" />
        <MakeStudent :teachers="props.teachers" />
    </div>
</template>