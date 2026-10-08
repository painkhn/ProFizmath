<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.put(route('password.update'), {
        onSuccess: () => {
            form.reset();
            console.log('заебись');
            
        },
        onError: () => {
            console.log('не заебись');
        }
    })
}

const updatePasswordToggle = () => {
    const block = document.getElementById('update-password-modal')

    block?.classList.toggle('hidden')
}
</script>

<template>
    <button @click="updatePasswordToggle" type="button" class="w-full text-center text-sm">Изменить пароль</button>
    <div
        class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 p-4 bg-gray-200 space-y-2 shadow-md shadow-black/80 rounded-md hidden" id="update-password-modal">
        <h3 class="font-semibold">
            Изменить пароль
        </h3>
        <p class="opacity-80">
            Чтобы изменить пароль, воспользуйтесь формой для изменения пароля
        </p>
        <form @submit.prevent="submit()" class="space-y-4">
            <div class="flex flex-col">
                <label for="">Текущий пароль</label>
                <input type="password" v-model="form.current_password">
            </div>
            <div class="flex flex-col">
                <label for="">Новый пароль</label>
                <input type="password" v-model="form.password">
            </div>
            <div class="flex flex-col">
                <label for="">Повторите новый пароль</label>
                <input type="password" v-model="form.password_confirmation">
            </div>
            <button type="submit" class="w-full bg-white py-2 rounded-md">Сохранить изменения</button>
            <button @click="updatePasswordToggle" type="button" class="w-full py-2 rounded-md">Отмена</button>
        </form>
    </div>
</template>