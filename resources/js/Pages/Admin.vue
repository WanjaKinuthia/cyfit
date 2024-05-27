
<template>
  <AuthenticatedLayout>
    <div class="container mx-auto p-4">
      <!-- Header for adding or editing users and trainers -->
      <h2  v-if="!editting" class="text-2xl font-bold text-red-600 mb-9 ml-40">Add Users and Trainers</h2>
      <h2  v-else class="text-2xl font-bold text-red-600 mb-9 ml-40">Edit Users and Trainers</h2>
      
      <div class="overflow-x-auto">
      <div v-if="showform==false" >
          <!-- Button to show the form for creating a new entry -->
        <button @click="showform = true" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Create New Entry</button>
        <!-- Table displaying the list of users and trainers -->
        <table class="min-w-full bg-white">
          <thead>
            <tr>
              <th class="py-2 px-4 bg-gray-200 text-left">ID</th>
              <th class="py-2 px-4 bg-gray-200 text-left">Name</th>
              <th class="py-2 px-4 bg-gray-200 text-left">Email</th>
              <th class="py-2 px-4 bg-gray-200 text-left">Role</th>
              <th class="py-2 px-4 bg-gray-200 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data" :key="item.id">
              <td class="py-2 px-4 border-b">{{ item.id }}</td>
              <td class="py-2 px-4 border-b">{{ item.name }}</td>
              <td class="py-2 px-4 border-b">{{ item.email }}</td>
              <td class="py-2 px-4 border-b">{{ item.role ? item.role.name : '' }}</td>
              <td class="py-2 px-4 border-b">
                <button @click="editItem(item)" class="bg-blue-500 text-white px-2 py-1 rounded mr-4">Edit</button>
                <button @click="deleteItem(item.id)" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

<div v-else>
    <!-- Form for creating or editing an entry -->
 
<form @submit.prevent=" editting ? edituser():  createItem()" class="max-w-sm mx-auto">
  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name</label>
    <input v-model="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
  </div>
  <div class="mb-5">
    <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
    <input  v-model="email" type="Email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
  <div class="mb-5">
    <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a role</label>
  <select v-model="role_id" id="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option v-for="role in roles" :key="role.id" :value="role.id" >{{role.name}}</option>
  
      </select>

  </div>
  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-4">Submit</button>
  <button  @click="hideform" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-red-800">Cancel</button>

</form>
</div>
</div>


    </div>
  </AuthenticatedLayout>
  </template>
  
  <script setup>
import { ref,onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
import axios from 'axios';

// Fetch users and roles when the component is mounted
  onMounted(async()=>{
    await fetchusers();

    await fetchroles();
  })
  // Variables and states
    const data = ref([ ]);

    const roles = ref([ ]);
    const name = ref('');
    const email = ref('');
    const role_id = ref(null);
    const showform = ref(false) 
    const editting  = ref(false)
    const userid = ref(null)



// Method to create a new user
    const createItem = async () => {
      try{
        const dataFetched = await axios.post('http://cyfit.test:8000/api/users',{name:name.value, email:email.value, role_id:role_id.value});
      const newItem = { id: data.value.length + 1, name: name.value, role: roles.value.find(role => role.id == role_id.value).name };
      data.value.push(newItem);
      alert('user has been created successfully')
      showform.value = false
      
      }
      catch(error){
        alert('could not add user')

      }

      
    };
    // Method to set up editing a user

    const editItem = (item) => {
      // Find the index of the item to be edited in the data array using its id
      const index = data.value.findIndex(i => i.id === item.id);
      // Check if the item exists in the array
      if (index !== -1) {
         // Set the form fields with the item's current values
        name.value = item.name
        email.value = item.email
        role_id.value = item.role_id
         // Set the editing state to true and store the item's id
        editting.value = true
        userid.value = item.id
          // Show the form for editing
        showform.value = true       
      }
    };
// Method to hide the form and reset states
    const hideform = () => {
      name.value = null
        email.value = null
        role_id.value = null
        editting.value = false
         showform.value = false
         userid.value = null
    }

    const deleteItem = async (id) => {
      try{
        const dataFetched = await axios.delete('http://cyfit.test:8000/api/users/' +id);
        this.fetchusers();
        //data.value = data.value.filter(item => item.id !== id);
      
      alert('user has been deleted successfully')
      
      
      }
      catch(error){
        alert('user deleted successfully')

     }
      //data.value = data.value.filter(item => item.id !== id);
    };

    const fetchusers = async()=>{
      const dataFetched = await axios.get('http://cyfit.test:8000/api/users');
      data.value = dataFetched.data;

    }

    const fetchroles = async()=>{
      const dataFetched = await axios.get('http://cyfit.test:8000/api/roles');
      roles.value = dataFetched.data;

    }

    const edituser = async () => {
      try{
        const dataFetched = await axios.put('http://cyfit.test:8000/api/users/'+userid.value,{name:name.value, email:email.value, role_id:role_id.value});
      const newItem = { id: userid.value, name: name.value, role: roles.value.find(role => role.id == role_id.value).name };
      data.value = data.value.filter(user => user.id != userid.value)
      data.value.push(newItem);
      alert('user has been updated successfully')
      showform.value = false
      
      }
      catch(error){
        alert('could not update user')

      }
    }

    
   
  

</script>
 
  <style scoped>
  /* Scoped styles for this component */
  </style>
  