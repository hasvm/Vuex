<template>
    <div class="mx-auto max-w-2xl px-4 pt-16 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="section-products">
		    <div class="container">
				<div class="row">
					<div v-for="product in products" :key="product.ID" class="col-md-6 col-lg-4 col-xl-3">
						<single-product :product="product"></single-product>
					</div>
				</div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import SingleProduct from './SingleProduct';

export default {
    name: 'Products',
    components: {
        SingleProduct,
    },
    methods: {
        ...mapActions('products', ['getProducts']),
    },
    computed: {
        ...mapGetters({
            products: 'products/products',
            collectionProduct: 'collections/collectionProduct',
        }),
    },
    beforeMount() {
        this.$store.dispatch('collections/getCollections').then(() =>
                this.getProducts(this.collectionProduct._ycode_id));
    },
}

</script>