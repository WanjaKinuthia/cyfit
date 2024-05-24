<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref, onMounted } from "vue";
import axios from "axios";

const selectedMembership = ref('');
const selectedPrice = ref(0);
const sessionsType = ref([]);

const fetchSessions = async () => {
  try {
    const response = await axios.get("/api/sessions");
    sessionsType.value = response.data;
    console.log(sessionsType.value);
  } catch (error) {
    console.log("Failed to fetch Session Types", error);
  }
};

const storeSession = async () => {
  if (!selectedMembership.value || !selectedPrice.value) {
    console.log('Please select both membership type and price.');
    return;
  }

  try {
    const response = await axios.post('/api/membership', {
      price: selectedPrice.value,
      type: selectedMembership.value
    });
    console.log('Session booked successfully', response.data);
  } catch (error) {
    console.log('Failed to book session', error);
  }
};

onMounted(async () => {
  await fetchSessions();
});
</script>

<template>
  <AuthenticatedLayout>
    <div class="flex flex-wrap justify-center">
      <div v-for="session in sessionsType" :key="session.id" class="max-w-sm rounded overflow-hidden shadow-lg bg-black m-4">
        <img class="w-full" src="https://comfitme.com/cdn/shop/files/Membershipproductimage.png?v=1689136314&width=1426" alt="Membership Plan"/>
        <div class="px-6 py-4">
          <div class="font-bold text-white text-xl mb-2">{{session.session_type}}</div>
          <p class="text-white text-base text-center">{{ session.description }}</p>
        </div>
        <div class="px-20 pt-4 pb-2 ml-15">
          <select v-model="selectedMembership" id="membershipType" class="bg-gray-800 text-white font-bold py-2 px-4 rounded-full mb-4">
            <option value="Premium Membership">Premium Membership</option>
            <option value="Group Membership">Group Membership</option>
            <option value="Corporate Membership">Corporate Membership</option>
            <option value="Individual Membership">Individual Membership</option>
          </select>

          <select v-model="selectedPrice" id="price" class="bg-gray-800 text-white font-bold py-2 px-4 rounded-full mb-4">
            <option value="20000">20000</option>
            <option value="5000">5000</option>
            <option value="15000">15000</option>
            <option value="10000">10000</option>
          </select>

          <button @click="storeSession" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">
            Purchase Plan
          </button>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script>
export default {};
</script>

<style scoped>
/* Styles specific to this component go here */
</style>
