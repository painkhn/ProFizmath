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
        href: '/courses'
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
    <header class="text-center py-8 space-y-4 relative">
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
        <div class="fixed -top-5 right-0 bg-gray-200 px-4 py-2 rounded-bl-xl border border-gray-300">
            <ul class="flex items-center gap-4">
                <li v-if="$page.props.auth">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-shopping-cart">
                        <path d="m2.05 2.05 1.099-.028a1 1 0 0 1 1.008.815l2.69 14.347A1 1 0 0 0 7.83 18H18" />
                        <path d="M4.563 5h16.435a1 1 0 0 1 .981 1.204l-1.026 6.226A2 2 0 0 1 18.962 14H6.25" />
                        <circle cx="18" cy="20" r="2" />
                        <circle cx="8" cy="20" r="2" />
                    </svg>
                </li>
                <li v-if="$page.props.auth">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-heart">
                        <path
                            d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5" />
                    </svg>
                </li>
                <li v-else>
                    <Link href="/register">
                       <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-square-user-round">
                            <path d="M18 21a6 6 0 0 0-12 0" />
                            <circle cx="12" cy="11" r="4" />
                            <rect width="18" height="18" x="3" y="3" rx="2" />
                        </svg>
                    </Link>
                </li>
            </ul>
        </div>
    </header>
</template>