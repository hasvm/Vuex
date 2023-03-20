import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(),
    base: '/',
    routes: [
        {path: '/', name: 'Home', component: require('../components/Home.vue').default},
        {path: '/products', name: 'Products', component: require('../components/products/ProductsList.vue').default},
        {path: '/checkout', name: 'Checkout', component: require('../components/checkout/Checkout.vue').default},
    ],
});

export default router;