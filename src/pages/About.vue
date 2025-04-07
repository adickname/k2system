<script setup>
import LocationMarquee from "@/components/LocationMarquee.vue";
import VerifyLocation from "@/components/VerifyLocation.vue";
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
  <div class="flex justify-center">
    <p class="p-1 lg:p-4">Tutaj nas znajdziesz:</p>
  </div>
  <LocationMarquee></LocationMarquee>
  <div class="flex justify-center p-2 items-center">
    <VerifyLocation></VerifyLocation>
  </div>
  <div>
    <img
      src="/public/assets/about-image.avif"
      alt="about image"
      class="w-full"
    />
  </div>
  <div class="lg:flex">
    <div class="lg:w-1/2 p-4">
      <p class="text-lg font-semibold lg:text-left">Czym zajmuje się firma?</p>
      <p class="lg:text-left">
        Firma zajmuje się dystrybucją, serwisem oraz dzierżawą poleasingowych, a
        także nowych urządzeń biurowych. K2system jako bezpośredni importer
        urządzeń marki Konica Minolta, wyróżnia się najwyższą jakością oraz
        konkurencyjną ofertą na rynku. Obsługujemy firmy oraz instytucje
        Państwowe, spełniając indywidualne potrzeby każdego klienta. Dostarczamy
        urządzenia na terenie wielu krajów Unii Europejskiej nawiązując stałą
        współpracę z dystrybutorami oraz lokalnymi serwisami.
      </p>
    </div>
    <div class="flex lg:justify-center bg-white lg:w-1/2">
      <img src="/public/assets/kopiarkaA3.avif" />
    </div>
  </div>
  <!--conditional rendering-->
  <div v-if="!isMobile">
    <div class="lg:flex w-full">
      <div class="lg:flex lg:justify-center bg-white lg:w-1/2">
        <img src="/public/assets/kopiarkaA4.avif" />
      </div>
      <div class="lg:w-1/2 p-4">
        <p class="text-lg font-semibold lg:text-right">
          Dlaczego Konica Minolta?
        </p>
        <p class="lg:text-right">
          Specjalizujemy się w tym co dobre oraz sprawdzone, a Japońska
          niezawodność jest znana w wielu branżach. Urządzenia cechują się
          niskimi kosztami eksploatacji, co ma kluczowe znaczenie w dłuższym
          okresie użytkowania.
        </p>
      </div>
    </div>
  </div>
  <div v-else>
    <div class="lg:w-1/2 p-4">
      <p class="text-lg font-semibold lg:text-right">
        Dlaczego Konica Minolta?
      </p>
      <p class="lg:text-right">
        Specjalizujemy się w tym co dobre oraz sprawdzone, a Japońska
        niezawodność jest znana w wielu branżach. Urządzenia cechują się niskimi
        kosztami eksploatacji, co ma kluczowe znaczenie w dłuższym okresie
        użytkowania.
      </p>
    </div>
    <div class="lg:flex w-full">
      <div class="lg:flex lg:justify-center bg-white lg:w-1/2">
        <img src="/public/assets/kopiarkaA4.avif" />
      </div>
    </div>
  </div>
</template>
