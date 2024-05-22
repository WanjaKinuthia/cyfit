<template>
    <div>
      <h2>Workout Plans</h2>
      <div>
        <form @submit.prevent="createPlan">
          <input v-model="newPlan.member_id" placeholder="Member ID" required />
          <textarea v-model="newPlan.plan" placeholder="Plan Details" required></textarea>
          <button type="submit">Create Plan</button>
        </form>
      </div>
      <ul>
        <li v-for="plan in workoutPlans" :key="plan.id">
          {{ plan.plan }} 
          <button @click="deletePlan(plan.id)">Delete</button>
          <button @click="editPlan(plan)">Edit</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import api from '../services/api';
  
  export default {
    data() {
      return {
        workoutPlans: [],
        newPlan: {
          member_id: '',
          plan: ''
        }
      };
    },
    created() {
      this.fetchWorkoutPlans();
    },
    methods: {
      fetchWorkoutPlans() {
        // Fetch workout plans related to the trainer
      },
      createPlan() {
        api.createWorkoutPlan(this.newPlan).then(response => {
          this.workoutPlans.push(response.data);
          this.newPlan = { member_id: '', plan: '' };
        });
      },
      deletePlan(id) {
        api.deleteWorkoutPlan(id).then(() => {
          this.workoutPlans = this.workoutPlans.filter(plan => plan.id !== id);
        });
      },
      editPlan(plan) {
        // Show a form to edit the plan and update it using API
      }
    }
  };
  </script>
  