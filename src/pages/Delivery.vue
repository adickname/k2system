<script setup>
import ImageBorder from "@/components/ImageBorder.vue";
</script>
<template>
  <div class="flex flex-col items-center">
    <ImageBorder class="w-4/5 lg:w-1/3">
      <p>
        Dostawa na terenie wielu krajów Unii Europejskiej: Czechy, Słowacja,
        Austria, Niemcy, Włochy
      </p>
      <img src="/public/assets/ue.avif" class="p-2" alt="" />
    </ImageBorder>
    <ImageBorder class="w-4/5 lg:w-1/3">
      <p>Odbiór osobisty</p>
      <img src="/public/assets/c550i.avif" class="p-2" alt="" />
    </ImageBorder>
    <ImageBorder class="w-4/5 lg:w-1/3">
      <p>Nasz własny transport</p>
      <img src="/public/assets/transport.avif" class="p-2" alt="" />
    </ImageBorder>
    <ImageBorder class="w-4/5 lg:w-1/3">
      <p>Przesyłka kurierska paletowa</p>
      <img src="/public/assets/paleta_edited.avif" class="p-2" alt="" />
    </ImageBorder>
  </div>
</template>
