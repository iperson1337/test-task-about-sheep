import { createApp } from 'vue';
import axios from "axios";
import App from './App.vue';
import router from './router';

const axiosInstance = axios.create({
  baseURL: process.env.VUE_APP_BACKEND_URL,
})

const app = createApp(App).use(router);
app.config.globalProperties.$axios = axiosInstance;
app.mount('#app');
