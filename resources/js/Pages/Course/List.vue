<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';


</script>

<template>
    <MainLayout>
        <ul class="grid grid-cols-5">
            <li>
                <Link href="/">
                    <div class="w-full bg-gray-200 p-10 rounded-xl space-y-4">
                        <div>
                            <h4 class="opacity-70">
                                МАТ - 5
                            </h4>
                            <h3 class="font-semibold text-xl text-gray-800">
                                ДРОБИ | ТЕОРИЯ
                            </h3>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-image">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                            <circle cx="9" cy="9" r="2" />
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                        </svg>
                        <span>100 P</span>
                        <div>
                            <button class="w-full bg-white rounded-md py-2">
                                Добавить в корзину
                            </button>
                        </div>
                    </div>
                </Link>
            </li>
        </ul>
    </MainLayout>
</template>