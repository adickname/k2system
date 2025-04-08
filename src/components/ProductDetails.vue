<script setup>
import ImageBorder from "./ImageBorder.vue";
import InputNumber from "primevue/inputnumber";
import { ref } from "vue";
const numberItems = ref(null);
</script>
<template>
  <div>
    <div class="flex flex-col w-full justify-center lg:flex-row">
      <ImageBorder class="lg:flex-1 lg:max-w-[30%]">
        <slot name="image"></slot>
      </ImageBorder>
      <div class="lg:flex-1 lg:max-w-[30%]">
        <slot name="name"></slot>
        <slot name="cost"></slot>
        <p>Sztuk *</p>
        <InputNumber
          v-model="numberItems"
          inputId="minmax-buttons"
          mode="decimal"
          showButtons
          min="1"
          fluid
        />
        <slot name="delivery"></slot>
      </div>
    </div>
    <div class="mx-auto lg:max-w-[60%]">
      <slot name="product-info"></slot>
    </div>
  </div>
</template>
