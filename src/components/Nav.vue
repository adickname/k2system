<script setup>
import MenuMobile from "./MenuMobile.vue";
import MenuDesktop from "./MenuDesktop.vue";
import { ref, onMounted, onUnmounted } from "vue";

const isMobile = ref(window.innerWidth < 800);
const checkWidth = () => {
  isMobile.value = window.innerWidth < 800;
};

onMounted(() => {
  window.addEventListener("resize", checkWidth);
});

onUnmounted(() => {
  window.removeEventListener("resize", checkWidth);
});
</script>

<template>
  <div class="">
    <MenuMobile v-if="isMobile" />
    <MenuDesktop v-else />
  </div>
</template>
