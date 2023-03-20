import { createStore } from 'vuex'
import collections from './modules/collections';
import products from './modules/products';
import cart from './modules/cart';

//Create Store
const store =  new createStore({
    modules: {
        collections,
        products,
        cart,
    },
});

export default store;
