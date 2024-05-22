<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
  <AuthenticatedLayout>
    <div class="container mx-auto p-4">
      <h2 class="text-2xl font-bold mb-4">Manage Memberships and Trainers</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-2 px-4 bg-gray-200 text-left">ID</th>
              <th class="py-2 px-4 bg-gray-200 text-left">Name</th>
              <th class="py-2 px-4 bg-gray-200 text-left">Role</th>
              <th class="py-2 px-4 bg-gray-200 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data" :key="item.id">
              <td class="py-2 px-4 border-b">{{ item.id }}</td>
              <td class="py-2 px-4 border-b">{{ item.name }}</td>
              <td class="py-2 px-4 border-b">{{ item.role }}</td>
              <td class="py-2 px-4 border-b">
                <button @click="editItem(item)" class="bg-blue-500 text-white px-2 py-1 rounded mr-2">Edit</button>
                <button @click="deleteItem(item.id)" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
        <button @click="createItem" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Create New Entry</button>
      </div>
    </div>
  </AuthenticatedLayout>
  </template>
  
  <script>
  export default {
    data() {
      return {
        data: [
          { id: 1, name: 'John Doe', role: 'Member' },
          { id: 2, name: 'Jane Smith', role: 'Trainer' },
          { id: 3, name: 'Sam Johnson', role: 'Member' }
        ]
      };
    },
    methods: {
      createItem() {
        // Logic to create a new item
        const newItem = { id: this.data.length + 1, name: 'New User', role: 'Member' };
        this.data.push(newItem);
      },
      editItem(item) {
        // Logic to edit an item
        const index = this.data.findIndex(i => i.id === item.id);
        if (index !== -1) {
          this.data[index].name = prompt('Enter new name', item.name) || item.name;
          this.data[index].role = prompt('Enter new role', item.role) || item.role;
        }
      },
      deleteItem(id) {
        this.data = this.data.filter(item => item.id !== id);
      }
    }
  };
  </script>
  
  <style scoped>
  /* Scoped styles for this component */
  </style>
  