<script setup>
import { RouterView } from "vue-router";
import Nav from "./components/Nav.vue";
</script>

<template>
  <div class="bg-[#023e8a] text-[#48cae4] min-h-screen max-w-screen w-screen">
    <Nav />
    <RouterView> </RouterView>
  </div>
</template>
