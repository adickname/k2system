<script setup>
import axios from 'axios';
import { computed, onMounted, ref, watch, watchEffect } from 'vue';
import UserLogin from './UserLogin.vue';
import { useIsLoged } from "@/composables/useIsLoged.vue";
import ImageBorder from '@/components/ImageBorder.vue';
import OrderItem from '@/components/OrderItem.vue';
const { isLoged } = useIsLoged()
const orders = ref([])
const width = ref()
const ordersToShow = ref([])
let isExpandAdded = false
watchEffect(() => {
    if (isLoged.value) {
        if (orders.value.length > 0) {
            if (!isExpandAdded) {
                orders.value = orders.value.map(e => ({
                    ...e,
                    rowToDisplay: 1
                }))
                isExpandAdded = !isExpandAdded
            }
            const amount = (width.value / 250 - 1)
            ordersToShow.value = (orders.value.map(e => ({
                ...e,
                order_items: e.order_items.slice(0, amount * e.rowToDisplay)
            })))
        }
    } else {
        ordersToShow.value = []
    }


})
watch(isLoged.value, (newValue, oldValue) => {
    getOrders()
})

const getOrders = async () => {
    const response = await axios.post(
        'http://localhost:8000/api/users/orders', {},
        {
            withCredentials: true, withXSRFToken: true
        }
    );
    orders.value = response.data.response
}
const showMore = (index) => {
    orders.value[index].rowToDisplay += 1
}
const showLess = (index) => {
    orders.value[index].rowToDisplay -= 1
}
onMounted(() => {
    width.value = window.innerWidth
    addEventListener('resize', () => {
        width.value = window.innerWidth
    })
    if (isLoged) {
        getOrders()
    }

})
</script>

<template>
    <UserLogin />
    <p>Twoje zamówienia:</p>

    <div>
        <ImageBorder v-for="(order, index) in ordersToShow" class="flex-row w-[fit-content] items-start flex-wrap">

            <div class="flex justify-between w-full">
                <div class="flex flex-col">
                    <p>cena {{ order.amount / 100 }} {{ order.currency }}</p>
                    <p>status {{ order.payment_status }}</p>
                </div>
                <div v-if="order.rowToDisplay >= 2">
                    <button @click="showLess(index)">Show less</button>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 justify-between">
                <OrderItem v-for="(item, index) in order.order_items" :name="item.product.name"
                    :image="item.product.image" :quantity="item.quantity" :price="item.product_price" />
            </div>
            <div v-if="order.order_items.length < orders[index].order_items.length" @click="showMore(index)">+{{
                (orders[index].order_items.length - order.order_items.length) }}
            </div>
        </ImageBorder>

    </div>
</template>
