<script setup>
import ImageBorder from "@/components/ImageBorder.vue";
import OfferMarquee from "@/components/OfferMarquee.vue";
</script>

<template>
  <h1>
    <p class="text-center">Tym się zajmujemy:</p>
  </h1>
  <OfferMarquee></OfferMarquee>
  <ImageBorder class="lg:w-[55%] mx-auto animate-fall">
    <img src="/public/assets/services.png" alt="usługi" />
  </ImageBorder>
</template>
