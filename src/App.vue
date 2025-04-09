<script setup>
import { RouterView } from "vue-router";
import Nav from "./components/Nav.vue";
import Footer from "./components/Footer.vue";
import CartPreview from "./components/CartPreview.vue";
</script>

<template>
  <div
    class="bg-[#023e8a] text-[#48cae4] min-h-screen max-w-screen w-screen flex flex-col"
  >
    <Nav />
    <div class="flex-1 flex">
      <main>
        <RouterView> </RouterView>
      </main>
      <aside>
        <CartPreview></CartPreview>
      </aside>
    </div>
    <Footer />
  </div>
</template>
