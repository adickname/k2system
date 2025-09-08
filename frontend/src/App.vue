<script setup>
import { RouterView } from "vue-router";
import Nav from "./components/Nav.vue";
import Footer from "./components/Footer.vue";
import { onMounted } from "vue";
import axios from "axios";
onMounted(() => {
  axios.get('http://localhost:8000/sanctum/csrf-cookie', { withCredentials: true });
})
</script>

<template>
  <div class="bg-[#023e8a] text-[#48cae4] min-h-screen max-w-screen w-screen flex flex-col">
    <Nav />
    <main class="flex-1">
      <RouterView> </RouterView>
    </main>
    <Footer class="w-full" />
  </div>
</template>
