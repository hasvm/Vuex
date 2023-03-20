require('./bootstrap');

import { createApp } from 'vue';
import Vuex from 'vuex';

import Home from './components/Home';
import store from './store';
import router from './router/index';

const app = createApp({});

app.use(Vuex);

app.use(store);

app.use(router);

app.component('home', Home);

app.mount('#app');
