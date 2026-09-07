<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import NavLink from './NavLink.vue';

const navLinks = [
    {
        value: 'Главная',
        href: '/'
    },
    {
        value: 'Курсы',
        href: 'courses'
    },
    {
        value: 'Эфиры',
        href: '/'
    },
    {
        value: 'Новости',
        href: '/'
    },
    {
        value: 'Контакты',
        href: '/'
    },
    {
        value: 'Панель администратора',
        href: '/admin'
    },
]

</script>

<template>
    <div class="text-center py-8 space-y-4">
        <h1>
            <Link href="/" class="inline-flex flex-col bg-gradient-to-r from-gray-200 to-gray-200 px-4 rounded-xl bg-[length:0] bg-top bg-no-repeat transition-all duration-300 hover:bg-[length:100%]">
                <span class="font-bold text-2xl">ПРО ФизМат</span>
                <span class="opacity-80">Онлайн-школа</span>
            </Link>
        </h1>
        <nav>
            <ul class="flex gap-4 items-center justify-center">
                <li v-for="(item, index) in navLinks" :key="index" class="flex gap-4 items-center">
                    <NavLink :href="item.href">
                        {{ item.value }}
                    </NavLink>
                    <span class="pointer-events-none" v-if="index !== navLinks.length - 1">•</span>
                </li>
            </ul>
        </nav>
    </div>
</template>