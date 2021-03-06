import { createRouter, createWebHistory } from 'vue-router';
import AppLayout from "../layouts/AppLayout";

const routes = [
  {
    path: '/',
    name: 'app',
    component: AppLayout,
    children: [
      {
        path: '/',
        name: 'welcome',
        component: () => import(/* webpackChunkName: "about" */ '../views/Welcome.vue'),
      },
      {
        path: '/stats',
        name: 'stats',
        component: () => import(/* webpackChunkName: "about" */ '../views/Stats.vue'),
      },
    ]
  },

];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
