import requests from '../../requests/requests';

const state = {
    collections: [],
};

const getters = {
    collections(state) {
        return state.collections;
    },
    collectionProduct(state) {
        return state.collections.find(elem => elem.name === 'Products');
    },
};

const actions = {
    getCollections({commit}) {
        return new Promise(resolve => {
            requests.getCollections().then(response => {
                if(response.type === 'success') {
                    commit('setCollections', response.collections);
                    resolve();
                }
            })
        });
    },
    collectionOrder(context) {
        return new Promise(resolve =>  {
             resolve(context.state.collections.find(elem => elem.name === 'Orders'));
        });
    },
    collectionOrderItem(context) {
       return new Promise(resolve =>  {
            resolve(context.state.collections.find(elem => elem.name === 'Order items'));
       });
    },
}

const mutations = {
    setCollections(state, collections) {
        state.collections = collections;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
};