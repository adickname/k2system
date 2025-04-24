<script setup>
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import FloatLabel from "primevue/floatlabel";
import Button from "primevue/button";
import CartItem from "@/components/CartItem.vue";
import axios from "axios";
import { ref } from "vue";
import ProductCRUD from "@/components/ProductCRUD.vue";
import AddProduct from "@/components/AddProduct.vue";
import Login from "@/components/Login.vue";
const username = ref(null);
const password = ref(null);
const message = ref("nma razie nic");
const products = ref();
const name = ref();
const getProducts = async () => {
  try {
    const response = await axios.get(
      `${import.meta.env.VITE_BACKEND_URL}/api/products`
    );
    products.value = response.data;
  } catch (error) {}
};

const filter = () => {
  products.value = products.value.filter((element) =>
    element.name.includes(name.value)
  );
};
</script>

<template>
  <Login></Login>

  <div class="w-full">
    <p>Wszystkie produkty w sklepie:</p>
    <Button @click="getProducts()">Odśwież</Button>
  </div>
  <div>
    <AddProduct></AddProduct>
  </div>
  <InputText v-model="name"></InputText
  ><Button @click="filter()" label="Znajdź"></Button>
  <div v-for="product in products">
    <ProductCRUD
      :name="product.name"
      :id="product.id"
      :cost="product.cost"
      :image="product.image"
      :description="product.description"
    ></ProductCRUD>
  </div>
</template>
