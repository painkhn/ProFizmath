<script setup lang="ts">
import MainLayout from '@/Layouts/MainLayout.vue';
import { Course, User } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps<{
    user: User
    courses: Course[] | undefined
}>()

</script>

<template>
    <Head :title="props.user.name" />

    <MainLayout>
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-8">
                <div class="p-4 bg-gray-200 border border-gray-300 rounded-xl flex gap-8">
                    <img src="/images/default_avatar.png" alt=""
                        class="max-w-xs w-full rounded-md border border-gray-300">
                    <ul class="space-y-4">
                        <li>
                            <p class="text-4xl font-semibold">{{ props.user.name }}</p>
                        </li>
                        <li>
                            <p class="text-2xl font-semibold">{{ props.user.email }}</p>
                        </li>
                        <li>
                            <p class="text-2xl font-semibold" v-if="props.user.role === 'teacher'">
                                Преподаватель
                            </p>
                            <p class="text-2xl font-semibold" v-if="props.user.role === 'admin'">
                                Администратор
                            </p>
                            <p class="text-2xl font-semibold" v-if="props.user.role === 'student'">
                                Ученик
                            </p>
                        </li>
                    </ul>
                </div>
                <div>
                    <form class="w-1/2 space-y-4">
                        <h3 class="font-semibold text-xl">
                            Редактировать аккаунт
                        </h3>
                        <div class="flex flex-col">
                            <label for="">Имя пользователя</label>
                            <input type="text">
                        </div>
                        <div class="flex flex-col">
                            <label for="">Электронная почта</label>
                            <input type="email">
                        </div>
                        <div class="flex flex-col">
                            <label for="">Пароль</label>
                            <input type="password">
                        </div>
                        <button type="submit" class="w-full bg-gray-200 py-2 rounded-md">
                            Сохранить изменения
                        </button>
                    </form>
                </div>
            </div>
            <div class="border-l border-gray-300 pl-8 space-y-4">
                <h3 class="text-2xl font-semibold">
                    Мои курсы
                </h3>
                <ul class="space-y-4">
                    <li v-for="(n, index) in 3" :key="index">
                        <Link href="/">
                            <div class="w-full bg-gray-200 p-4 rounded-md border border-gray-300 flex gap-8">
                                <img src="/images/example_image.jpg" alt="" class="w-24">
                                <div>
                                    <h4 class="font-semibold">
                                        Название
                                    </h4>
                                    <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia maiores sint atque quisquam quos nemo nesciunt, corporis excepturi id animi dolorem! Repellat exercitationem quia dolorum magni qui neque aspernatur voluptatem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ab libero ratione soluta veritatis suscipit totam officia omnis rem ad ullam recusandae nobis quam odio, minus expedita, accusamus mollitia saepe.</p>
                                </div>
                            </div>
                        </Link>
                    </li>
                </ul>
                <div class="space-y-4" v-if="props.user.role === 'teacher'">
                    <div class="border-t border-gray-300 w-full"></div>
                    <h3 class="text-2xl font-semibold">Курсы преподавателя</h3>
                    <ul class="space-y-4" v-if="props.courses && props.courses?.length >= 1">
                        <li v-for="(course, index) in props.courses" :key="index">
                            <Link :href="route('course.index', { id: course.id })">
                                <div class="w-full bg-gray-200 p-4 rounded-md border border-gray-300 flex gap-8">
                                    <img src="/images/example_image.jpg" alt="" class="w-24">
                                    <div>
                                        <h4 class="font-semibold">
                                            {{ course.title }}
                                        </h4>
                                        <p class="line-clamp-3">{{ course.description }}</p>
                                    </div>
                                </div>
                            </Link>
                        </li>
                    </ul>
                    <p v-else>
                        У преподавателя нет доступных курсов
                    </p>
                </div>
            </div>
        </div>
    </MainLayout>
</template>