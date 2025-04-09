<script setup>
import Button from "primevue/button";
import InputNumber from "primevue/inputnumber";
</script>

<template>
  <div class="w-full lg:w-[30%] bg-fuchsia-400 h-full">
    <div class="mx flex flex-row">
      <img src="/public/assets/c550i.avif" class="w-1/6" alt="" />
      <div>
        <p>Kopiarka Bizhub 367 Konica Minolta Mono</p>
        <p>2 424,00 zł</p>
        <InputNumber
          v-model="value2"
          inputId="minmax-buttons"
          mode="decimal"
          showButtons
          :min="0"
          :max="100"
          fluid
        />
      </div>
      <div class="flex flex-col justify-center">
        <i class="pi pi-trash"></i>
        <p>43984</p>
      </div>
    </div>
    <div>
      <div class="flex">
        <p>Suma częściowa</p>
        <p>Cena</p>
      </div>
      <div>
        <Button class="text-center" label="Wyświetl koszyk" />
      </div>
    </div>
  </div>
</template>
