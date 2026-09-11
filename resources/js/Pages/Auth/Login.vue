<script setup lang="ts">

import AuthLayout from '@/Layouts/AuthLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
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
                <label>Электронная почта</label>
                <input type="email" class="w-full py-2 bg-gray-200" v-model="form.email">
            </div>
            <div>
                <label>Пароль</label>
                <input type="password" class="w-full py-2 bg-gray-200" v-model="form.password">
            </div>
            <button type="submit" class="w-full py-2 bg-gray-200">
                Войти
            </button>
            <span class="inline-block text-sm">
                Нет аккаунта? <Link href="/register" class="text-blue-600 font-semibold transition-all hover:text-blue-400">Создать аккаунт</Link>
            </span>
        </form>
    </AuthLayout>
</template>
