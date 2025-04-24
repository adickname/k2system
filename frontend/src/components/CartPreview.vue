<script setup>
import Button from "primevue/button";
import CartItem from "./CartItem.vue";
</script>

<template>
  <div class="w-full bg-fuchsia-400 h-screen">
    <CartItem> </CartItem>
    <div class="my-10">
      <div class="flex justify-around">
        <p>Suma częściowa</p>
        <p>Cena</p>
      </div>
      <div class="mx-auto w-1/2">
        <Button
          class="text-center w-full my-2"
          label="Wyświetl koszyk"
          :to="'cart'"
        />
      </div>
    </div>
  </div>
</template>
