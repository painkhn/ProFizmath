<script setup lang="ts">
import { ref } from 'vue';
import PrimaryButton from '../PfmUI/Button/Primary.vue';
import IconButton from '../PfmUI/Button/Icon.vue';
import { Button } from '@/Components/ui/button'

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

const navList = ref([
    {
        value: 'Главная'
    },
    {
        value: 'Курсы'
    },
    {
        value: 'Прямые эфиры'
    },
    {
        value: 'Новости'
    },
    {
        value: 'Контакты'
    },
])

const open = ref(false)
</script>

<template>
    <header class="w-full py-8 rounded-b-xl bg-[#2d1759] shadow-lg shadow-black/40">
        <div class="flex flex-col gap-4 items-center">
            <a href="#!" class="text-white font-semibold text-2xl">
                Инженерная онлайн-школа ПРО ФизМат
            </a>
            <ul class="grid grid-cols-[4rem_auto_4rem] gap-4 justify-stretch items-center w-full px-8">
                <li></li>
                <li class="flex gap-4 justify-self-center">
                    <a href="#!" v-for="(item, index) in navList" :key="index" class="transition-all hover:mx-1">
                        <PrimaryButton>
                            {{ item.value }}
                        </PrimaryButton>
                    </a>
                </li>
                <li class="justify-self-end flex gap-4">
                    <Dialog v-if="!$page.props.auth.user" v-model:open="open">
                        <TooltipProvider>
                            <Tooltip>
                                <TooltipTrigger>
                                    <DialogTrigger>
                                        <IconButton>
                                            <svg class="w-6 h-6 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="currentColor" viewBox="0 0 24 24">
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
                                <DialogTitle>Are you absolutely sure?</DialogTitle>
                                <DialogDescription>
                                    This action cannot be undone. This will permanently delete your account
                                    and remove your data from our servers.
                                </DialogDescription>
                            </DialogHeader>
                        </DialogContent>
                    </Dialog>
                    <IconButton v-else>
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                clip-rule="evenodd" />
                        </svg>
                    </IconButton>
                    <IconButton v-if="$page.props.auth.user">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                        </svg>
                    </IconButton>
                    <IconButton>
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16Z" />
                            <path fill-rule="evenodd"
                                d="M21.707 21.707a1 1 0 0 1-1.414 0l-3.5-3.5a1 1 0 0 1 1.414-1.414l3.5 3.5a1 1 0 0 1 0 1.414Z"
                                clip-rule="evenodd" />
                        </svg>
                    </IconButton>
                </li>
            </ul>
        </div>
    </header>
</template>