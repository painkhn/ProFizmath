<script setup lang="ts">
import { User } from '@/types'
import axios from 'axios';
import { ref } from 'vue';

const props = defineProps<{
    user: User
}>()

const handleFileChange = (event: any) => {
    avatarFile.value = event.target.files[0];
};

const avatarFile = ref(null);

const submit = async () => {
    if (!avatarFile.value) {
        alert('Пожалуйста, выберите файл для загрузки.');
        return;
    }

    const formData = new FormData();
    formData.append('avatar_change', avatarFile.value);

    try {
        await axios.post(route('profile.update_avatar'), formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });
        // Обработка успешного изменения аватарки
        avatarFile.value = null; // Сбросить выбранный файл
        location.reload()
        // console.log('аватарка успешно изменена')
        // alert('Новая аватарка успешно установлена!')
    } catch (error) {
        // Обработка ошибок валидации
        console.error('Произошла ошибка при загрузке аватарки:', error);
        // alert('Произошла ошибка при загрузке аватарки: ' + error.response.data.errors.avatar_change.join(', '));
    }
}

const avatarModalToggle = () => {
    const block = document.getElementById('update-avatar-modal')

    block?.classList.toggle('hidden')
}
</script>

<template>
    <button @click="avatarModalToggle" type="button">
        <div class="relative max-w-32 w-full h-32 rounded-md border border-gray-300 overflow-hidden">
            <div v-if="props.user.avatar == null">
                <img src="/images/default_avatar.png" alt="" class="h-32">
            </div>
            <div>
                <img :src="`/storage/` + props.user?.avatar" alt="" encType="multipart/form-data" class="h-32">
            </div>
        </div>
    </button>
    <div class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 bg-gray-200 shadow-md shadow-black/80 rounded-md p-4 space-y-2 hidden" id="update-avatar-modal">
        <h3 class="font-semibold">
            Изменить аватарку
        </h3>
        <p class="opacity-80">
            Чтобы изменить аватарку, воспользуйтесь формой для изменения аватарки
        </p>
        <form @submit.prevent="submit" class="space-y-4">
            <div class="flex flex-col">
                <label>Добавьте новую аватарку</label>
                <input type="file" @change="handleFileChange" class="bg-white p-2 border border-black">
            </div>
            <button type="submit" class="w-full bg-white py-2 rounded-md">
                Сохранить аватарку
            </button>
            <button @click="avatarModalToggle" type="button" class="w-full py-2 rounded-md">
                Отмена
            </button>
        </form>
    </div>
</template>