<script setup>
import { ref } from "vue";
import ImageBorder from "@/components/ImageBorder.vue";
import axios from "axios";
import { useRouter } from "vue-router";
const router = useRouter();
const products = ref();
const getProducts = async () => {
  try {
    const response = await axios.get(
      `${import.meta.env.VITE_BACKEND_URL}/api/products`
    );
    products.value = response.data;
  } catch (error) {}
};
const moveToDetails = (id) => {
  router.push({ name: "product-details", params: { id: id } });
};

getProducts();
</script>
<template>
  <div class="md:grid md:grid-cols-2 lg:grid-cols-4 lg:mx-8 animate-fall">
    <ImageBorder v-for="product in products" @click="moveToDetails(product.id)">
      <img
        :src="product.image"
        alt=""
        loading="lazy"
        class="hover:scale-105 duration-300 ease-in-out transition-all"
      />
      <p>{{ product.name }}</p>
      <p class="w-full">{{ product.cost }} zł</p>
    </ImageBorder>
  </div>
</template>
