
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
  
  <script setup>
import { ref,onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
import axios from 'axios';

  onMounted(async()=>{
    await fetchusers();
  })
    const data = ref([ ]);

    const createItem = () => {
      const newItem = { id: data.value.length + 1, name: 'New User', role: 'Member' };
      data.value.push(newItem);
    };

    const editItem = (item) => {
      const index = data.value.findIndex(i => i.id === item.id);
      if (index !== -1) {
        const newName = prompt('Enter new name', item.name) || item.name;
        const newRole = prompt('Enter new role', item.role) || item.role;
        data.value[index] = { ...data.value[index], name: newName, role: newRole };
      }
    };

    const deleteItem = (id) => {
      data.value = data.value.filter(item => item.id !== id);
    };

    const fetchusers = async()=>{
      const dataFetched = await axios.get('http://cyfit.test:8000/api/users');
      data.value = dataFetched.data;

    }
   
  

</script>
 
  <style scoped>
  /* Scoped styles for this component */
  </style>
  