<script setup>
import { RouterView } from "vue-router";
import Nav from "./components/Nav.vue";
import Footer from "./components/Footer.vue";
</script>

<template>
  <div
    class="bg-[#023e8a] text-[#48cae4] min-h-screen max-w-screen w-screen flex flex-col"
  >
    <Nav />
    <main>
      <div class="flex-1">
        <RouterView> </RouterView>
      </div>
    </main>
    <Footer class="w-full" />
  </div>
</template>
