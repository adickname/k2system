<script setup>
import ImageBorder from "@/components/ImageBorder.vue";
</script>
<template>
  <section>
    <div
      class="!grid grid-cols-[repeat(auto-fit,_minmax(250px,_1fr))] justify-center p-2 lg:animate-fall"
    >
      <ImageBorder class="animate-coming-left lg:animate-none">
        <p>
          Dostawa na terenie wielu krajów Unii Europejskiej: Czechy, Słowacja,
          Austria, Niemcy, Włochy
        </p>
        <img src="/public/assets/ue.avif" class="p-2" alt="" />
      </ImageBorder>
      <ImageBorder class="animate-coming-right lg:animate-none">
        <p>Odbiór osobisty</p>
        <img src="/public/assets/c550i.avif" class="p-2" alt="" />
      </ImageBorder>
      <ImageBorder class="animate-coming-left lg:animate-none">
        <p>Nasz własny transport</p>
        <img src="/public/assets/transport.avif" class="p-2" alt="" />
      </ImageBorder>
      <ImageBorder class="animate-coming-right lg:animate-none">
        <p>Przesyłka kurierska paletowa</p>
        <img src="/public/assets/paleta_edited.avif" class="p-2" alt="" />
      </ImageBorder>
    </div>
  </section>
</template>
