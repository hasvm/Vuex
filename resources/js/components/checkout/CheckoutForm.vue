<template>
    <!-- Checkout Form -->
    <form>
        <div>
            <h2 class="sr-only">Checkout</h2>
            <h2 class="text-lg font-medium text-gray-900">Contact information</h2>
            <div class="mt-4">
                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                <div class="mt-1">
                    <input v-model="form.email" type="email" id="email-address" name="email-address" autocomplete="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>
        </div>
        <div class="mt-10 border-t border-gray-200 pt-10">
            <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>
            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                <div>
                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                    <div class="mt-1">
                        <input v-model="form.firstName" type="text" id="first-name" name="first-name" autocomplete="given-name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                    <div class="mt-1">
                        <input v-model="form.lastName" type="text" id="last-name" name="last-name" autocomplete="family-name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <div class="mt-1">
                        <input v-model="form.address" type="text" name="address" id="address" autocomplete="street-address" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="apartment" class="block text-sm font-medium text-gray-700">Apartment, suite, etc.</label>
                    <div class="mt-1">
                        <input v-model="form.apartment" type="text" name="apartment" id="apartment" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <div class="mt-1">
                        <input v-model="form.city" type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <div class="mt-1">
                        <select v-model="form.country" id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </select>
                    </div>
                </div>
                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                    <div class="mt-1">
                        <input v-model="form.region" type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="postal-code" class="block text-sm font-medium text-gray-700">Postal code</label>
                    <div class="mt-1">
                        <input v-model="form.postalCode" type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <div class="mt-1">
                        <input v-model="form.phone" type="text" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    props: ['form'],
}
</script>