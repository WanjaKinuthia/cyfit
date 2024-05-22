<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <AuthenticatedLayout>
    <div class="flex flex-wrap justify-center">
      <div class="max-w-sm rounded overflow-hidden shadow-lg bg-black m-4">
        <img class="w-full" src="https://comfitme.com/cdn/shop/files/Membershipproductimage.png?v=1689136314&width=1426" alt="Membership Plan">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">Membership Plan</div>
          <p class="text-white text-base text-center">
            Purchase a membership plan and manage your membership by viewing your upcoming and previous payments and booking sessions online.
          </p>
        </div>
        <div class="px-20 pt-4 pb-2 ml-10">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Purchase Plan</button>
        </div>
      </div>

      <div class="flex flex-wrap justify-center">
      <div class="max-w-sm rounded overflow-hidden shadow-lg bg-black m-4">
        <div class="w-full h-2/3">
          <img class="w-full h-full object-cover" src="https://media.istockphoto.com/id/494810207/photo/elliptical-cross-trainer.jpg?s=612x612&w=0&k=20&c=UXhsqPQHfjnBOO-I3_Uwjh0UGoB58uvtFb5xox4S69k=" alt="Membership Plan">
        </div>
        <div class="px-6 py-4">
          <div class="font-bold text-xl -mt-7 ">book</div>
          <p class="text-white text-base text-center">
            Join our gym and take advantage of our cross-training programs. Manage your membership by booking sessions and tracking your progress online.
          </p>
        </div>
        <div class="px-20 pt-4 pb-2 ml-10">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Book Now</button>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap justify-center">
      <div class="max-w-sm rounded overflow-hidden shadow-lg bg-black m-4">
        <div class="w-full h-2/3">
          <img class="w-full h-full object-cover" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBEzznNOZsP92jRn7PwhxNt5l2Jghx7BQxEPeYl-NcsXTxQJYgLjmPP3HVob8EuMUThxI&usqp=CAU" alt="Membership Plan">
        </div>
        <div class="px-6 py-4">
          <div class="font-bold text-xl -mt-7 ">book</div>
          <p class="text-white text-base text-center">
            Join our gym and take advantage of our dumbbells programs. Manage your membership by booking sessions and tracking your progress online.
          </p>
        </div>
        <div class="px-20 pt-4 pb-2 ml-10">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Book Now</button>
        </div>
      </div>
    </div>

  </div>
  </AuthenticatedLayout>
</template>

<script>
export default {
  // Component logic goes here
};
</script>

<style scoped>
/* Styles specific to this component go here */
</style>
