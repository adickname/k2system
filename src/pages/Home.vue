<script setup>
import OffertHome from "@/components/OffertHome.vue";
import ImageBorder from "@/components/ImageBorder.vue";
import { ref, onMounted, onUnmounted } from "vue";

const isMobile = ref(window.innerWidth < 800);
const checkWidth = () => {
  isMobile.value = window.innerWidth < 800;
};
onMounted(() => {
  window.addEventListener("resize", checkWidth);
});

onUnmounted(() => {
  window.removeEventListener("resize", checkWidth);
});
</script>
<template>
  <template v-if="isMobile">
    <div class="min-h-screen w-full flex flex-col items-center">
      <OffertHome> Sprzedaż detaliczna </OffertHome>
      <OffertHome> Dzierżawa kserokopiarek </OffertHome>
      <OffertHome> Serwis części Tonery </OffertHome>
      <OffertHome> Hurtownia współpraca z dystrybutorami </OffertHome>
      <h1>Drukarki i Kserokopiarki dla firm</h1>
      <ImageBorder>
        <p>Łatwa obsługa</p>
        <p>Niskie koszty eksploatacji</p>
        <p>Japońska niezawodność</p>
        <p>Szybka praca</p>
        <img class="p-2" src="/public/assets/ekran4020.avif" alt=""
      /></ImageBorder>
      <h2>Konica Minolta Bizhub</h2>
      <ImageBorder>
        <iframe
          class="w-full"
          src="https://www.youtube.com/embed/ux3_7U4Nb-U?si=Wn2kyXiZ_zSP7Po_&amp;controls=0"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen
        ></iframe>
      </ImageBorder>
      <h3>Jakie są twoje wymagania?</h3>
      <ImageBorder>
        <p>Urządzenia zapewniające wydruk w kolorze w formacie A4</p>
        <img src="/public/assets/C3350_edited.avif" alt="" />
      </ImageBorder>
      <ImageBorder>
        <p>
          Monochromatyczne urządzenia drukujące tylko w czarnym kolorze w
          formacie A4
        </p>
        <img src="/public/assets/4020_edited.avif" alt="" />
      </ImageBorder>
      <ImageBorder>
        <p>Urządzenia Mono lub kolor, drukujące w formacie A3</p>
        <img src="/public/assets/c250i_edited.avif" alt="" />
      </ImageBorder>
      <ImageBorder>
        <p>Dowolna konfiguracja o rozszerzone moduły</p>
        <img src="/public/assets/c750i_edited.avif" alt="" />
      </ImageBorder>
    </div>
  </template>

  <template v-else>
    <div
      class="!grid w-[70%] mx-auto grid-rows-[auto,auto,auto,auto] grid-cols-2"
    >
      <ImageBorder class="col-start-1">
        <h1 class="text-xl">Drukarki i Kserokopiarki dla firm</h1>
        <p>Łatwa obsługa</p>
        <p>Niskie koszty eksploatacji</p>
        <p>Japońska niezawodność</p>
        <p>Szybka praca</p>
        <img class="p-2" src="/public/assets/ekran4020.avif" alt="" />
      </ImageBorder>
      <ImageBorder class="col-start-2">
        <h2 class="text-xl">Konica Minolta Bizhub</h2>
        <iframe
          class="w-full h-full"
          src="https://www.youtube.com/embed/ux3_7U4Nb-U?si=Wn2kyXiZ_zSP7Po_&amp;controls=0"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen
        ></iframe>
      </ImageBorder>
      <h3 class="col-span-2 flex justify-center text-xl">
        Jakie są twoje wymagania?
      </h3>
      <ImageBorder>
        <p>Urządzenia zapewniające wydruk w kolorze w formacie A4</p>
        <img src="/public/assets/C3350_edited.avif" alt="" />
      </ImageBorder>
      <ImageBorder>
        <p>
          Monochromatyczne urządzenia drukujące tylko w czarnym kolorze w
          formacie A4
        </p>
        <img src="/public/assets/4020_edited.avif" alt=""
      /></ImageBorder>
      <ImageBorder>
        <p>Urządzenia Mono lub kolor, drukujące w formacie A3</p>
        <img src="/public/assets/c250i_edited.avif" alt=""
      /></ImageBorder>
      <ImageBorder>
        <p>Dowolna konfiguracja o rozszerzone moduły</p>
        <img src="/public/assets/c750i_edited.avif" alt=""
      /></ImageBorder>
    </div>
  </template>
</template>
