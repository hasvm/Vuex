<template>
    <div class="single-product">
        <img :src="product.Image">
        <div class="row">
            <div class="col-sm-6">
				<div class="text-center">
					<h3 class="product-title">{{ product.Name }}</h3>
					<h4 class="product-price">{{ price }}</h4>
				</div>
            </div>
            <div class="col-sm-6">
                <div class="text-center">
                    <button class="btn btn-outline-dark" @click="addProductToCart(product)">Add to cart</button>
                </div>
		    </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'SingleProduct',
    props:['product'],
    computed: {
        price() {
            return '$' + (Math.round(this.product.Price * 100) / 100).toFixed(2);
        }
    },
    methods: {
        addProductToCart(product) {
            let data = {...product};
            data.quantity = 1;
            this.$store.dispatch('cart/addProductToCart', data);
        },
    },
}
</script>

<style>

img {
    margin: auto;
    text-align: center;
}

</style>