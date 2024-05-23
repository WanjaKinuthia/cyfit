<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {ref,onMounted} from 'vue';
import axios from 'axios';


const selectedMembership = ref([]);
const sessions = ref([]);

const bookSession = async () => {
  try {
    const response = await axios.post('/api/membership',  selectedMembership.value );
    console.log('Session booked successfully', response.data);
  } catch (error) {
    console.log('Failed to book session', error);
  }
};
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
    <div class="px-20 pt-4 pb-2 ml-15">
      <select  v-model="selectedMembership" id="membershipType" class="bg-gray-800 text-white font-bold py-2 px-4 rounded-full mb-4">
        <option value="Premium Membership">Premium Membership - $20,000</option>
        <option value="Group Membership">Group Membership - $5,000</option>
        <option value="Corporate Membership">Corporate Membership - $15,000</option>
        <option value="Individual Membership">Individual Membership - $10,000</option>
      </select>
      <button @click="bookSession" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Purchase Plan</button>    </div>
  </div>


  <div class="flex flex-wrap justify-center">
  <div class="max-w-sm rounded overflow-hidden shadow-lg bg-black m-4">
    <div class="w-full h-2/3">
      <img class="w-full h-full object-cover" src="https://media.istockphoto.com/id/494810207/photo/elliptical-cross-trainer.jpg?s=612x612&w=0&k=20&c=UXhsqPQHfjnBOO-I3_Uwjh0UGoB58uvtFb5xox4S69k=" alt="Membership Plan">
    </div>
    <div class="px-6 py-4">
      <div class="font-bold text-xl -mt-7 ">book</div>
      <h2 class="font-bold text-xl text-center text-white mb-4">Cardio Session</h2> <!-- Added heading -->
      <p class="text-white text-base text-center">
        Push your limits and transform your body with our cardio sessions. Stay motivated and track your progress as you reach your fitness goals!
      </p>
    </div>
    <div class="px-20 pt-4 pb-2 ml-10">
      <button @click="bookSession" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Book Session</button>
    </div>
  </div>
</div>


<div class="flex flex-wrap justify-center">
  <div class="max-w-sm rounded overflow-hidden shadow-lg bg-black m-4">
    <div class="w-full h-2/3">
      <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Z3ltfGVufDB8fDB8fHww" alt="Membership Plan">
    </div>
    <div class="px-6 py-4">
      <div class="font-bold text-xl -mt-7 ">book</div>
      <h2 class="font-bold text-xl text-center text-white mb-4">Flexibility Session</h2> <!-- Added heading -->
      <p class="text-white text-base text-center">
        Enhance your flexibility and balance with our specialized programs. Stay dedicated, improve your range of motion, and achieve your fitness milestones!
      </p>
    </div>
    <div class="px-20 pt-4 pb-2 ml-10 -m-6">
      <button @click="bookSession" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Book Session</button>
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
