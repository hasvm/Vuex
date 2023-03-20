<template>
    <div>
        <div class="mx-auto max-w-2xl px-4 pt-16 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                <checkout-form :form="form"></checkout-form>
                <order-summary @placeOrder="placeOrder"></order-summary>
            </div>
        </div>
    </div>
</template>

<script>
import CheckoutForm from './CheckoutForm';
import OrderSummary from './OderSummary';

export default {
    name: 'Checkout',
    components: {
        CheckoutForm,
        OrderSummary,
    },
    data() {
        return {
            form: {
                email: '',
                firstName: '',
                lastName: '',
                address: '',
                apartment: '',
                city: '',
                country: '',
                region: '',
                postalCode: '',
                phone: '',
                orderId: '',
                orderItemId: '',
            }
        }
    },
    methods: {
        placeOrder() {
            this.$store.dispatch('collections/collectionOrder').then(x => {
                this.form.orderId = x._ycode_id;
                this.$store.dispatch('collections/collectionOrderItem').then(x => {
                    this.form.orderItemId =  x._ycode_id;
                    this.$store.dispatch('cart/placeOrder', this.form);
            })
        });
        },
    },
}
</script>
