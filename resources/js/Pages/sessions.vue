<template>
      <AuthenticatedLayout>
        <div><h3>sessions</h3></div>

        <div class="actions">
        <button @click="toggleSessionForm">Schedule Session</button>
      </div>


        <div v-if="showSessionForm" class="session-form">
        <h2>Schedule Workout Session</h2>
        <form @submit.prevent="submitSession">
          <label for="sessionDate">Session Date:</label>
          <input type="date" id="sessionDate" v-model="sessionDate" required>
          <label for="sessionType">Session Type:</label>
          <select id="sessionType" v-model="sessionType" required>
            <option v-for="session in sessions" :key="session.id">
              {{ session.session_type }}
            </option>
          </select>
          <div class="form-actions">
            <button type="submit" >Create</button>

          </div>
        </form>
      </div>

    <div class="relative overflow-x-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">id</th>
            <th scope="col" class="px-6 py-3">description</th>
            <th scope="col" class="px-6 py-3">type</th>
            <th scope="col" class="px-6 py-3">date</th>
            <th scope="col" class="px-6 py-3">actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="session in sessions" :key="session.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ session.id }}
            </th>
            <td class="px-6 py-4">{{ session.description }}</td>
            <td class="px-6 py-4">{{ session.session_type }}</td>
            <td class="px-6 py-4">{{ session.session_date }}</td>
            <td class="px-6 py-4">
              <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                @click="deleteSession(session.id)">Delete</button>
              <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                @click="updateSession(session)">Update</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</AuthenticatedLayout>
  </template>

  
  <script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

  import axios from "axios";
  import { onMounted, ref } from "vue";
  
  const sessions = ref([]);
  const showSessionForm = ref(false);

const sessionDate = ref('');
const sessionType = ref('Strength Training');
  
  const fetchSessions = async () => {
    try {
      const response = await axios.get('/api/sessions');
      sessions.value = response.data;
    } catch (error) {
      console.log('Failed to fetch sessions');
    }
  };

  const submitSession = async () => {
  //console.log('Session created:', sessionDate.value, sessionType.value);
  //sessionDate.value = '';
  //sessionType.value = 'Strength Training';
  try {
    const response = await axios.post('/api/sessions',{date:sessionDate.value, session_type:sessionType.value});
   
  } catch (error) {
    console.error('error submitting session', error);
  }
};

  
  const deleteSession = async (id) => {
    if (window.confirm("Are you sure you want to delete this session?")) {
      try {
        await axios.delete('/api/sessions/' + id);
        sessions.value = sessions.value.filter(session => session.id !== id);
        console.log('Session deleted');
      } catch (error) {
        console.error('Error deleting session', error);
      }
    }
  };
  
  const updateSession = async (session) => {
    const newDescription = prompt('Enter updated description', session.description);
    const newType = prompt('Enter updated type', session.session_type);
    const newDate = prompt('Enter updated date', session.session_date);
  
    if (newDescription && newType && newDate) {
      try {
        const updatedSession = {
          description: newDescription,
          session_type: newType,
          session_date: newDate
        };
        const response = await axios.put('/api/sessions/' + session.id, updatedSession);
        const index = sessions.value.findIndex(s => s.id === session.id);
        if (index !== -1) {
          sessions.value[index] = { ...response.data };
          console.log('Session updated');
        }
      } catch (error) {
        alert
        ('Error updating session');
      }
    }
  };
  const toggleSessionForm = () => {
  showSessionForm.value = !showSessionForm.value;
};

  
  onMounted(async () => {
    await fetchSessions();
  });
  </script>
  
  <style>
  /* Add your custom styles here */
  </style>
  