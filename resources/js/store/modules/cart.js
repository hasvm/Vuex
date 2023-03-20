import requests from '../../requests/requests';

const state = {
    cart: [],
};

const getters = {
    cart(state) {
        return state.cart;
    },
    total(state) {
        return state.cart.length;
    },
};

const actions = {
    addProductToCart({commit}, product) {
        commit('addProduct', product);
    },
    removeProductFromCart({ commit }, product) {
        commit('removeProduct', product);
    },
    placeOrder({commit}, form) {
        let subTotal = state.cart.reduce((accumulator, currentValue) => accumulator += currentValue.Price * currentValue.quantity,0);
        let data = {
            order: state.cart,
            info: form,
            subTotal: subTotal,
        };
        requests.placeOrder(data).then(response => {
            if(response.type === 'success')
                commit('placeOrder');
        });
    },
};

const mutations = {
    addProduct(state, product) {
        state.cart.push(product);
    },
    removeProduct(state, product) {
        let index = state.cart.findIndex(elem => product.ID === elem.ID && product.quantity === elem.quantity);
        state.cart.splice(index, 1);
    },
    placeOrder(state) {
        state.cart = [];
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
};