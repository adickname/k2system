<script setup>
import ContactForm from "@/components/ContactForm.vue";
import GoogleMap from "@/components/GoogleMap.vue";
</script>
<template>
  <div class="flex flex-col justify-center">
    <ContactForm class="lg:w-[50%]"></ContactForm>
    <GoogleMap class="w-full"></GoogleMap>
  </div>
</template>
