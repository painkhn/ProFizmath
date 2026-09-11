<script setup lang="ts">

import AuthLayout from '@/Layouts/AuthLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation');
        },
    });
};
</script>

<template>
    <Head title="Регистрация" />
    
    <AuthLayout>
        <form @submit.prevent="submit" class="space-y-4 max-w-xl mx-auto">
            <h2>Регистрация в ПРО ФизМат</h2>
            <div>
                <label>Имя пользователя</label>
                <input type="text" class="w-full py-2 bg-gray-200" v-model="form.name">
            </div>
            <div>
                <label>Электронная почта</label>
                <input type="email" class="w-full py-2 bg-gray-200" v-model="form.email">
            </div>
            <div>
                <label>Пароль</label>
                <input type="password" class="w-full py-2 bg-gray-200" v-model="form.password">
            </div>
            <div>
                <label>Повторите пароль</label>
                <input type="password" class="w-full py-2 bg-gray-200" v-model="form.password_confirmation">
            </div>
            <button type="submit" class="w-full py-2 bg-gray-200">
                Регистрация
            </button>
            <span class="inline-block text-sm">
                Уже есть аккаунт? <Link href="/login"
                    class="text-blue-600 font-semibold transition-all hover:text-blue-400">Войти</Link>
            </span>
        </form>
    </AuthLayout>
</template>
