<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white bg-cover bg-center"
    >
        <div class="absolute top-0 right-0 p-6 text-end z-10">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-green-900 hover:text-green-900 dark:text-green-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    v-if="canLogin"
                    :href="route('login')"
                    class="font-semibold text-green-900 hover:text-green-900 dark:text-green-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-green-900 hover:text-green-900 dark:text-green-900 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <div class="absolute inset-0 flex items-center justify-center">
            <div class="content">
                <h1 class="text-4xl font-bold mb-4 text-green-900">Welcome to Our Gym</h1>
                <p class="text-lg text-green-900">Join us to achieve your fitness goals with our state-of-the-art equipment and expert trainers.</p>
              
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url('https://img.freepik.com/free-photo/3d-gym-equipment_23-2151114163.jpg?size=626&ext=jpg&ga=GA1.1.44546679.1716422400&semt=ais_user');
    background-size: cover;
    background-position: center;
    height: 100vh;
    position: relative;
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url('https://img.freepik.com/free-photo/3d-gym-equipment_23-2151114163.jpg?size=626&ext=jpg&ga=GA1.1.44546679.1716422400&semt=ais_user');
    }
}
.content {
    text-align: center;
    color: white;
    padding: 20px;
}
</style>
