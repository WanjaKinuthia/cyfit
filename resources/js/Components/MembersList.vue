<template>
    <div>
      <h2>Members List</h2>
      <ul>
        <li v-for="member in members" :key="member.id">{{ member.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  
  import api from '../services/api';
  
  
  export default {
    data() {
      return {
        members: []
      };
    },
    created() {
      this.fetchMembers();
    },
    methods: {
      fetchMembers() {
        api.getMembers().then(response => {
          this.members = response.data;
        });
      }
    }
  };
  </script>
  