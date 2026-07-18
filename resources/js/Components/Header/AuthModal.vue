<script setup lang="ts">
import IconButton from '../PfmUI/Button/Icon.vue';

import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/Components/ui/dialog'

import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from '@/Components/ui/tooltip'
import PrimaryButton from '../PfmUI/Button/Primary.vue';
import { ref } from 'vue';

const status = ref('login');

const statusChange = () => {
    status.value = status.value === 'login' ? 'register' : 'login';
}
</script>

<template>
    <Dialog>
        <TooltipProvider>
            <Tooltip>
                <TooltipTrigger>
                    <DialogTrigger>
                        <IconButton>
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd"
                                    d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </IconButton>
                    </DialogTrigger>
                </TooltipTrigger>
                <TooltipContent>
                    <p>Авторизация</p>
                </TooltipContent>
            </Tooltip>
        </TooltipProvider>
        <DialogContent>
            <DialogHeader>
                <DialogTitle v-if="status === 'login'">Авторизация</DialogTitle>
                <DialogDescription v-if="status === 'login'">
                    Чтобы пользоваться услугами сервиса ПРО ФизМат, вам необходимо авторизироваться.
                </DialogDescription>
                <DialogTitle v-if="status === 'register'">Регистрация</DialogTitle>
                <DialogDescription v-if="status === 'register'">
                    Чтобы пользоваться услугами сервиса ПРО ФизМат, вам необходимо создать аккаунт.
                </DialogDescription>
            </DialogHeader>
            <form class="space-y-4" v-if="status === 'login'">
                <div class="flex flex-col gap-2">
                    <label for="inputEmail">Электронная почта</label>
                    <input type="email" name="" id="inputEmail" placeholder="***@***.**"
                        class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="inputPassword">Пароль</label>
                    <input type="password" name="" id="inputPassword" placeholder="********"
                        class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
                </div>
                <PrimaryButton type="submit" class="w-full">Войти</PrimaryButton>
            </form>
            <form class="space-y-4" v-else>
                <div class="flex flex-col gap-2">
                    <label for="inputName">Имя</label>
                    <input type="text" name="" id="inputName" placeholder="*****"
                        class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="inputFullname">Фамилия</label>
                    <input type="text" name="" id="inputFullname" placeholder="*****"
                        class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="inputFathername">Отчество *</label>
                    <input type="text" name="" id="inputFathername" placeholder="*****"
                        class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="inputEmail">Электронная почта</label>
                    <input type="email" name="" id="inputEmail" placeholder="***@***.**"
                        class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="inputPassword">Пароль</label>
                    <input type="password" name="" id="inputPassword" placeholder="********"
                        class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="inputRepeatPassword">Повторите пароль</label>
                    <input type="password" name="" id="inputRepeatPassword" placeholder="********"
                        class="w-full py-2 rounded-xl ring-0 ring-offset-0 focus:ring-offset-1 focus:!ring-offset-purple-800 bg-transparent border border-purple-600 focus:ring-2 focus:ring-purple-800 focus:border-purple-800">
                </div>
                <PrimaryButton type="submit" class="w-full">Войти</PrimaryButton>
            </form>
            <DialogFooter class="text-center inline">
                <p class="space-y-4" v-if="status === 'login'">*Если у вас нет аккаунта, вы можете <button href="#!"
                        class="text-purple-400 transition-all hover:text-purple-200" @click="statusChange">создать
                        аккаунт</button></p>
                <p v-else>Если у вас уже есть аккаунт, вы можете <button href="#!"
                        class="text-purple-400 transition-all hover:text-purple-200" @click="statusChange">авторизироваться</button></p>
            </DialogFooter>

        </DialogContent>
    </Dialog>
</template>