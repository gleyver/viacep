import { createApp } from 'vue';
import { createStore } from 'vuex';
import App from './App.vue';
import router from './router/index.js';
import cepStore from './store/cep';
import './assets/main.css';

const app = createApp(App);

app.use(createStore({
  modules: {
    cep: cepStore
  }
}));
app.use(router);

app.mount('#app'); 