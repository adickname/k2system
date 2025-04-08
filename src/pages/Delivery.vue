<script setup>
import ImageBorder from "@/components/ImageBorder.vue";
</script>
<template>
  <div
    class="!grid grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))] justify-center p-2"
  >
    <ImageBorder class="">
      <p>
        Dostawa na terenie wielu krajów Unii Europejskiej: Czechy, Słowacja,
        Austria, Niemcy, Włochy
      </p>
      <img src="/public/assets/ue.avif" class="p-2" alt="" />
    </ImageBorder>
    <ImageBorder class="">
      <p>Odbiór osobisty</p>
      <img src="/public/assets/c550i.avif" class="p-2" alt="" />
    </ImageBorder>
    <ImageBorder class="">
      <p>Nasz własny transport</p>
      <img src="/public/assets/transport.avif" class="p-2" alt="" />
    </ImageBorder>
    <ImageBorder class="">
      <p>Przesyłka kurierska paletowa</p>
      <img src="/public/assets/paleta_edited.avif" class="p-2" alt="" />
    </ImageBorder>
  </div>
</template>
