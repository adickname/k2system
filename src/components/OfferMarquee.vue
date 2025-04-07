<script setup>
import { VueMarqueeSlider } from "vue3-marquee-slider";
import "/node_modules/vue3-marquee-slider/dist/style.css";
</script>
<template>
  <vue-marquee-slider
    id="marquee-slider"
    :speed="20500"
    class="bg-blue-300 text-[#023e8a]"
  >
    <p>Instalacja</p>
    <p>Dystrybucja</p>
    <p>Sprzedaż hurtowa</p>
    <p>Serwis</p>
    <p>Tonery</p>
    <p>Części</p>
    <p>Logistyka</p>
    <p>Dzierżawa</p>
    <p>Instalacja</p>
    <p>Dystrybucja</p>
    <p>Sprzedaż hurtowa</p>
    <p>Serwis</p>
    <p>Tonery</p>
    <p>Części</p>
    <p>Logistyka</p>
    <p>Dzierżawa</p>
  </vue-marquee-slider>
</template>
