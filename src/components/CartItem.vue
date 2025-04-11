<script setup>
import InputNumber from "primevue/inputnumber";
</script>

<template>
  <div
    class="lg:mx-0 sm:mx-6 md:mx-8 flex flex-col sm:flex-row justify-between items-center sm:items-start"
  >
    <img src="/public/assets/c550i.avif" class="sm:w-2/6 lg:w-auto" alt="" />
    <div class="sm:ml-4 mt-4 sm:mt-0 text-center sm:text-left">
      <p class="font-medium text-lg">Kopiarka Bizhub 367 Konica Minolta Mono</p>
      <p class="text-xl font-semibold">2 424,00 zł</p>
      <div class="flex items-center">
        <InputNumber
          v-model="value2"
          inputId="minmax-buttons"
          mode="decimal"
          showButtons
          :min="0"
          :max="100"
          fluid
          class="mt-2"
        />
        <i class="pi pi-trash text-xl sm:text-2xl text-gray-600 px-2"></i>
      </div>
    </div>
  </div>
</template>
