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
import ImageBorder from "@/components/ImageBorder.vue";
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
const backendUrlLogin = `${import.meta.env.VITE_BACKEND_URL}/api/login`;
const backendUrlRegister = `${
  import.meta.env.VITE_BACKEND_URL
}/api/add-account`;
const backendUrlLogout = `${import.meta.env.VITE_BACKEND_URL}/api/logout`;
</script>

<template>
  <Login
    :backend-url-login="backendUrlLogin"
    :backend-url-register="backendUrlRegister"
    :backend-url-logout="backendUrlLogout"
    token-name="adminToken"
  ></Login>

  <div class="w-full">
    <p>Wszystkie produkty w sklepie:</p>
    <Button @click="getProducts()">Odśwież</Button>
  </div>
  <div>
    <ImageBorder class="w-[40%]">
      <AddProduct></AddProduct>
    </ImageBorder>
  </div>
  <InputText v-model="name"></InputText
  ><Button @click="filter()" label="Znajdź"></Button>
  <div v-for="product in products">
    <ImageBorder class="lg:w-[40%]">
      <ProductCRUD
        :name="product.name"
        :id="product.id"
        :cost="product.cost"
        :image="product.image"
        :description="product.description"
      ></ProductCRUD>
    </ImageBorder>
  </div>
</template>
