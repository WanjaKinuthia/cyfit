<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
  <AuthenticatedLayout>
  
  <div class="trainer-dashboard">
    <h1>Welcome, {{ trainerName }}</h1>
    <div class="stats">
      <div class="stat-card">
        <h2>Total Clients</h2>
        <p>{{ totalClients }}</p>
      </div>
      <div class="stat-card">
        <h2>Active Sessions</h2>
        <p>{{ activeSessions }}</p>
      </div>
    </div>
    <div class="actions">
      <button @click="viewClients">View Clients</button>
      
      <button @click="toggleSessionForm">Schedule Session</button>
    </div>
    <div v-if="showSessionForm" class="session-form">
      <h2>Schedule Workout Session</h2>
      <form @submit.prevent="submitSession">
        <label for="sessionDate">Session Date:</label>
        <input type="date" id="sessionDate" v-model="sessionDate" required>
        <label for="sessionType">Session Type:</label>
        <select id="sessionType" v-model="sessionType" required>
          <option value="Strength Training">Strength Training</option>
          <option value="Cardio">Cardio</option>
          <option value="Flexibility">Flexibility</option>
          <!-- Add more options as needed -->
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

<script>
export default {
  data() {
    return {
      trainerName: 'Fred',
      totalClients: 10,
      activeSessions: 5,
      showSessionForm: false,
      sessionDate: '',
      sessionType: 'Strength Training'
    };
  },
  methods: {
    viewClients() {
      console.log('Viewing clients...');
    },
    toggleSessionForm() {
      this.showSessionForm = !this.showSessionForm;
    },
    submitSession() {
      // Logic to submit session data
      console.log('Session created:', this.sessionDate, this.sessionType);
      // Clear form fields after submission
      this.sessionDate = '';
      this.sessionType = 'Strength Training';
    },
    deleteSession() {
      // Logic to delete session
      console.log('Session deleted');
    },
    updateSession() {
      // Logic to update session
      console.log('Session updated');
    }
  }
};
</script>

<style scoped>
.trainer-dashboard {
  padding: 20px;
}

.stats {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
}

.stat-card {
  background-color: #f0f0f0;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
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
