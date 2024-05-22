<template>
    <div>
      <h2 class="text-xl font-bold mb-4">Manage Memberships</h2>
      <table class="min-w-full bg-white">
        <thead>
          <tr>
            <th class="py-2 px-4 bg-gray-200 text-left">ID</th>
            <th class="py-2 px-4 bg-gray-200 text-left">Name</th>
            <th class="py-2 px-4 bg-gray-200 text-left">Details</th>
            <th class="py-2 px-4 bg-gray-200 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="membership in memberships" :key="membership.id">
            <td class="py-2 px-4 border-b">{{ membership.id }}</td>
            <td class="py-2 px-4 border-b">{{ membership.name }}</td>
            <td class="py-2 px-4 border-b">{{ membership.details }}</td>
            <td class="py-2 px-4 border-b">
              <button @click="editMembership(membership)" class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Edit</button>
              <button @click="deleteMembership(membership.id)" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
      <button @click="createMembership" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Create New Membership</button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        memberships: []
      };
    },
    methods: {
      fetchMemberships() {
        axios.get('/api/memberships')
          .then(response => {
            this.memberships = response.data;
          });
      },
      createMembership() {
        // Logic to create a membership
      },
      editMembership(membership) {
        // Logic to edit a membership
      },
      deleteMembership(id) {
        axios.delete(`/api/memberships/${id}`)
          .then(() => {
            this.fetchMemberships();
          });
      }
    },
    mounted() {
      this.fetchMemberships();
    }
  };
  </script>
  
  <style scoped>
  /* Scoped styles for this component */
  </style>
  