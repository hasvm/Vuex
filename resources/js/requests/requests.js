import { fetchGet, fetchPost } from '../helpers/requests';

export default {
    getCollections()
    {
        return fetchGet('/collections/list');
    },
    getCollectionItems(collectionId)
    {
        return fetchGet(`/products/list/${collectionId}`);
    },
    placeOrder(data) {
        return fetchPost('/checkout/place-order', data);
    },
}