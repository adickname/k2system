<script setup>
import InputNumber from "primevue/inputnumber";
import axios from "axios";
import { computed, ref, watch, defineEmits } from "vue";
const props = defineProps(["count", "id"]);
const count = ref(props.count);
const product = ref();
const totalCost = computed(() => count.value * product.value.cost);
const emit = defineEmits(["count-change", "remove"]);
const getProduct = async () => {
  try {

    const response = await axios.get(
      `${import.meta.env.VITE_BACKEND_URL}/api/products/${props.id}`
    );

    product.value = response.data;
    const item = {
      id: props.id,
      count: count.value,
      cost: product.value.cost,
    };
    emit("count-change", JSON.stringify(item));
  } catch (error) {
    if (error.status == 404) {
      removeItem()
    }
  }

};
getProduct();

watch(count, (newValue, oldValue) => {
  const item = {
    count: newValue,
    cost: product.value.cost,
  };
  emit("count-change", JSON.stringify(item));
  let itemsInCart = JSON.parse(localStorage.getItem("cart"));
  itemsInCart.forEach((item) => {
    if (item.id == props.id) {
      item.count = count.value;
    }
  });
  localStorage.setItem("cart", JSON.stringify(itemsInCart));
});

const removeItem = () => {
  emit("remove");
};
</script>

<template>
  <div class="lg:mx-0 sm:mx-6 md:mx-8 flex flex-col sm:flex-row justify-between items-center sm:items-start"
    v-if="product">
    <img :src="product.image" class="sm:w-2/6 lg:w-3/5" alt="" />
    <div class="sm:ml-4 mt-4 sm:mt-0 text-center sm:text-left">
      <p class="font-medium text-lg">{{ product.name }}</p>
      <p class="text-xl font-semibold">{{ product.cost }}zł</p>
      <div class="flex items-center">
        <InputNumber v-model="count" inputId="minmax-buttons" mode="decimal" showButtons :min="0" :max="100" fluid
          class="mt-2" />
        <i class="pi pi-trash text-xl sm:text-2xl text-gray-600 px-2" @click="removeItem()"></i>
      </div>
      <p>Razem: {{ totalCost }} zł</p>
    </div>
  </div>
</template>
