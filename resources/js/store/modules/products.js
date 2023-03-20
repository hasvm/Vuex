import requests from '../../requests/requests';

const state = {
    products: [],
};

const getters = {
    products(state) {
        return state.products;
    },
};

const actions = {
    getProducts({ commit }, collectionId) {
        requests.getCollectionItems(collectionId).then(response => {
            if(response.type === 'success') {
                commit('setProducts', response.products);
            }
        });
    },
};

const mutations = {
    setProducts(state, products) {
        state.products = products;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
};