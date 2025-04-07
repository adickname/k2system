<script setup>
import { VueMarqueeSlider } from "vue3-marquee-slider";
import "/node_modules/vue3-marquee-slider/dist/style.css";
import { locations } from "@/data/locations";
</script>
<template>
  <vue-marquee-slider id="marquee-slider" :speed="65000" class="bg-blue-300">
    <p v-for="location in locations" :key="location" class="p-2 text-[#023e8a]">
      {{ location.toUpperCase() }}
    </p>
  </vue-marquee-slider>
</template>
