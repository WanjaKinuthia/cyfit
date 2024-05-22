<template>
  <AuthenticatedLayout>
    <div class="bg-cover bg-center min-h-screen flex justify-end items-center" :style="{ backgroundImage: `url(${imageUrl})` }">
      <div class="text-white text-right mr-10">
        <h1 class="text-4xl font-bold mb-4">Transform <span class="text-red-500">Today</span></h1>
        <p class="text-lg">Begin your fitness journey</p>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const imageUrl = 'https://images.unsplash.com/photo-1558611848-73f7eb4001a1?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGd5bXxlbnwwfHwwfHx8MA%3D%3D';
</script>
