<script setup lang="ts">
import { User } from '@/types';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps<{
    students: User[] | undefined
}>()

const form = useForm({

})
const selectedId = ref<number | null>(null)

const submit = () => {
    if (!selectedId.value) return

    form.patch(route('admin.add_teacher', selectedId.value), {
        preserveScroll: true,
    })
}
</script>

<template>
    <form @submit.prevent="submit" class="space-y-4">
        <h2>
            Добавить преподавателя
        </h2>
        <div class="flex flex-col">
            <label>
                Выберите пользователя
            </label>
            <select name="" id="" v-model="selectedId">
                <option disabled value="" selected>Выберите пользователя</option>
                <option v-for="(student, index) in props.students" :key="student.id" :value="student.id">
                    {{ student.name }}
                </option>
            </select>
        </div>
        <button type="submit" class="w-full py-2 bg-gray-200">
            Сохранить преподавателя
        </button>
    </form>
</template>