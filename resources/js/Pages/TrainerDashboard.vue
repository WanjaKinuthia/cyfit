<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const trainerName = ref('');


const sessions = ref([]);
const totalMemberships = ref(0);
const totalsessions = ref(0);


const fetchTotalMemberships = async () => {
  try {
    const response = await axios.get('/api/totalmembership');
    totalMemberships.value = response.data;
  } catch (error) {
    console.error('error fetching total memberships', error);
  }
};

const fetchtotalsessions = async () => {
  try {
    const response = await axios.get('/api/sessions/totalsessions')
    totalsessions.value = response.data;
  } catch (error) {
    console.error('error fetching total sessions', error);
  }
};

const fetchSessions = async () => {
  try {
    const response = await axios.get('/api/sessions');
    sessions.value = response.data;
  } catch (error) {
    console.log('Failed to fetch Session Types');
  }
};





const updateSession = () => {
  console.log('Session updated');
};

onMounted(async () => {
  await fetchSessions();
  fetchTotalMemberships();
  fetchtotalsessions();

});
</script>

<template>
  <AuthenticatedLayout>
    <div class="trainer-dashboard">
      <h1>Welcome {{ trainerName }}</h1>
      


      




      <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
          <h3 class="text-lg font-medium text-gray-900 mb-4">Total Clients</h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-orange-100 p-6 rounded-lg shadow text-center">
              <div class="text-3xl font-bold" @click="toggleAllIssues" style="cursor: pointer">{{totalMemberships}}</div>
              <div class="text-gray-600">All Memberships </div>
            </div>

            <div class="bg-orange-100 p-6 rounded-lg shadow text-center">
              <a href="/sessions" >
              <div class="text-3xl font-bold" @click="toggleAllIssues" style="cursor: pointer">{{totalsessions}}</div>
              <div class="text-gray-600">All sessions </div>
              </a>
            </div>
            <!-- Add similar blocks for other metrics -->
          </div>
        </div>

     






    </div>
  </AuthenticatedLayout>
</template>

<style scoped>
.trainer-dashboard {
  padding: 20px;
}

.actions {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

button {
  margin: 0 10px;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.session-form {
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input,
select {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form-actions {
  display: flex;
  justify-content: flex-end;
}
</style>
