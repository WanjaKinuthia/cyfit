// src/services/api.js

import axios from 'axios';

const apiClient = axios.create({
  baseURL: 'http://localhost:8000/api',
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
});

export default {
  getMembers() {
    return apiClient.get('/trainer/members');
  },
  getSessionMembers(sessionId) {
    return apiClient.get(`/trainer/session-members/${sessionId}`);
  },
  createWorkoutPlan(plan) {
    return apiClient.post('/trainer/workout-plans', plan);
  },
  updateWorkoutPlan(id, plan) {
    return apiClient.put(`/trainer/workout-plans/${id}`, plan);
  },
  deleteWorkoutPlan(id) {
    return apiClient.delete(`/trainer/workout-plans/${id}`);
  }
};
