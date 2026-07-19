<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '../../PfmUI/Button/Primary.vue';

const form = useForm({
    name: '',
    fullname: '',
    fathername: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const registerSubmit = () => {
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation')
        }
    })
}
</script>

<template>
    <form class="space-y-4">
        <div class="flex flex-col gap-2">
            <label for="inputName">Имя</label>
            <input type="text" v-model="form.name" name="" id="inputName" placeholder="*****"
                class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
        </div>
        <div class="flex flex-col gap-2">
            <label for="inputFullname">Фамилия</label>
            <input type="text" v-model="form.fullname" name="" id="inputFullname" placeholder="*****"
                class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
        </div>
        <div class="flex flex-col gap-2">
            <label for="inputFathername">Отчество *</label>
            <input type="text" v-model="form.fathername" name="" id="inputFathername" placeholder="*****"
                class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
        </div>
        <div class="flex flex-col gap-2">
            <label for="inputEmail">Электронная почта</label>
            <input type="email" v-model="form.email" name="" id="inputEmail" placeholder="***@***.**"
                class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
        </div>
        <div class="flex flex-col gap-2">
            <label for="inputPassword">Пароль</label>
            <input type="password" v-model="form.password" name="" id="inputPassword" placeholder="********"
                class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
        </div>
        <div class="flex flex-col gap-2">
            <label for="inputRepeatPassword">Повторите пароль</label>
            <input type="password" v-model="form.password_confirmation" name="" id="inputRepeatPassword"
                placeholder="********"
                class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
        </div>
        <PrimaryButton type="submit" class="w-full" @click="registerSubmit">Регистрация</PrimaryButton>
    </form>
</template>