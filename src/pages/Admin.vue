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
const username = ref(null);
const password = ref(null);
const message = ref("nma razie nic");
const products = ref();
const login = async () => {
  console.log(username.value, password.value);
  const response = await axios.post("http://localhost:8000/admin/login", {
    username: username.value,
    password: password.value,
  });
  const token = response.data.token;
  localStorage.setItem("adminToken", token);
  await getMessage();
};

const getProducts = async () => {
  try {
    const response = await axios.get("http://localhost:8000/api/products");
    products.value = response.data;
    console.log(response.data);
  } catch (error) {}
};
</script>

<template>
  <!--   <FloatLabel class="my-4 w-full">
    <InputText id="name" v-model="username" class="w-full" />
    <label for="name">Nazwa uzytkownika</label>
  </FloatLabel>
  <FloatLabel class="my-4 w-full">
    <Password id="userEmail" v-model="password" class="w-full" />
    <label for="userEmail">Haslo</label>
  </FloatLabel>
  <Button @click="login" label="Zaloguj się"></Button> -->

  <div class="w-full">
    <p>Wszystkie produkty w sklepie:</p>
    <Button @click="getProducts()">Odśwież</Button>
  </div>
  <div>
    <AddProduct></AddProduct>
  </div>
  <div v-for="product in products">
    <ProductCRUD
    :name="product.name"
      :id="product.id"
      :cost="product.cost"
      :image="product.img"
      :description="product.description"
    ></ProductCRUD>
  </div>
</template>
