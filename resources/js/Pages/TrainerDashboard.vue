<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const trainerName = ref('Fred');
const showSessionForm = ref(false);
const sessionDate = ref('');
const sessionType = ref('Strength Training');
const sessions = ref([]);

const fetchSessions = async () => {
  try {
    const response = await axios.get('/api/sessions');
    sessions.value = response.data;
  } catch (error) {
    console.log('Failed to fetch Session Types');
  }
};

const toggleSessionForm = () => {
  showSessionForm.value = !showSessionForm.value;
};

const submitSession = () => {
  console.log('Session created:', sessionDate.value, sessionType.value);
  sessionDate.value = '';
  sessionType.value = 'Strength Training';
};

const deleteSession = () => {
  console.log('Session deleted');
};

const updateSession = () => {
  console.log('Session updated');
};

onMounted(async () => {
  await fetchSessions();
});
</script>

<template>
  <AuthenticatedLayout>
    <div class="trainer-dashboard">
      <h1>Welcome, {{ trainerName }}</h1>
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
            <button type="submit">Create</button>
            <button @click="deleteSession">Delete</button>
            <button @click="updateSession">Update</button>
          </div>
        </form>
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
