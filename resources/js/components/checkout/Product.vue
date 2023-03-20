<template>
    <li class="flex py-6 px-4 sm:px-6">
        <div class="flex-shrink-0">
            <img :src="product.Image" alt="T-Shirt in black." class="w-20 rounded-md">
        </div>
        <div class="ml-6 flex flex-1 flex-col">
            <div class="flex">
                <div class="min-w-0 flex-1">
                    <h4 class="text-sm">
                        <a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{ product.Name }}</a>
                    </h4>
                    <p class="mt-1 text-sm text-gray-500">{{ product.Color }}</p>
                </div>
            </div>
            <div class="flex flex-1 items-end justify-between pt-2">
                <p class="mt-1 text-sm font-medium text-gray-900">{{ getPrice }}</p>
                <div class="ml-4">
                    <label for="quantity" class="sr-only">Quantity</label>
                    <select
                     id="quantity" v-model="product.quantity" name="quantity" class="rounded-md border border-gray-300 text-left text-base font-medium text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                    <a class="btn btn-sm" @click="removeProduct(product)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </li>
</template>

<script>
export default {
    props:['product'],
    computed: {
        getPrice() {
            return '$' + (Math.round((this.product.Price * this.product.quantity) * 100) / 100).toFixed(2);
        }
    },
    methods: {
        removeProduct(product) {
            this.$store.dispatch('cart/removeProductFromCart', product);
        },
    },
}
</script>