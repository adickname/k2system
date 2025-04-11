<script setup>
import { ref, watch } from "vue";
import GoogleMap from "./GoogleMap.vue";
import { useRoute } from "vue-router";

const triggerAnimation = ref(false);

const route = useRoute();
watch(
  () => route.name,
  (newPath, oldPath) => {
    triggerAnimation.value = false;
    setTimeout(() => {
      triggerAnimation.value = true;
    }, 1);
  }
);
</script>

<template>
  <footer>
    <section :class="{ 'animate-coming-left': triggerAnimation }">
      <GoogleMap class="w-full h-[450px]"></GoogleMap>
    </section>
    <section :class="{ 'animate-coming-right': triggerAnimation }">
      <div class="bg-black p-2 w-full">
        <p class="text-center">Adres: Spółdzielcza 2, 43-400 Cieszyn</p>
        <p class="text-center">Nip: 5482751226</p>
        <p class="text-center">
          Email:
          <a href="mailto:Biuro@ksero-k2system.pl">Biuro@ksero-k2system.pl</a>
        </p>
        <p class="text-center">
          Telefon: <a href="+48500638676">+48 500 638 676</a>
        </p>
      </div>
    </section>
  </footer>
</template>
