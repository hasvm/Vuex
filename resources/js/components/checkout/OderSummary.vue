<template>
    <!-- Order summary -->
    <div class="mt-10 lg:mt-0">
        <h2 class="text-lg font-medium text-gray-900">Order summary</h2>
        <div class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm" v-if="total">
            <h3 class="sr-only">Items in your cart</h3>
            <ul role="list" class="divide-y divide-gray-200">
            <product v-for="product in cart" :key="product.ID" :product="product"></product>
            <dl class="space-y-6 border-t border-gray-200 py-6 px-4 sm:px-6">
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Subtotal</dt>
                    <dd class="text-sm font-medium text-gray-900"> {{ getSubTotal }}</dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Shipping</dt>
                    <dd class="text-sm font-medium text-gray-900"> {{ getShippingTotal }}</dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                    <dt class="text-base font-medium">Total</dt>
                    <dd class="text-base font-medium text-gray-900"> {{ getTotal }}</dd>
                </div>
            </dl>
            </ul>
            <div class="border-t border-gray-200 py-6 px-4 sm:px-6 flex items-center justify-around">
                <button @click="placeOrder" type="submit" class="btn btn-lg btn-outline-dark">Submit order</button>
            </div>
        </div>
        <div v-else class="mt-4 rounded-lg border border-gray-200 bg-white shadow-sm">
            <div class="empty-cart">
                <p>Your cart is empty!</p>
            </div>
        </div>
    </div>
</template>
<script>
import { mapGetters } from 'vuex';
import Product from './Product';

export default {
    components: {
        Product,
    },
    methods: {
        placeOrder()
        {
            this.$emit('placeOrder');
        },
    },
    computed: {
        ...mapGetters({
            cart: 'cart/cart',
            total: 'cart/total',
        }),
        shippingCost() {
            return 5;
        },
        getShippingTotal() {
            return '$' + (Math.round(this.shippingCost * 100) / 100).toFixed(2);
        },
        subTotal() {
            return this.cart.reduce((accumulator, currentValue) =>
            accumulator + (currentValue.Price * currentValue.quantity),0);
        },
        getSubTotal() {
            return '$' + (Math.round(this.subTotal).toFixed(2));
        },
        getTotal() {
            return '$' + (Math.round(this.subTotal + this.shippingCost).toFixed(2));
        },
    },
}
</script>