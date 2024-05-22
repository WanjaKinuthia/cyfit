// src/router/index.js

import Vue from 'vue';
import Router from 'vue-router';
import TrainerDashboard from '../Pages/TrainerDashboard.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/trainer',
      name: 'Home',
      component: TrainerDashboard
    },
    // Add other routes here
  ]
});
