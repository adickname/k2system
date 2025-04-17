<script setup>
import { ref } from "vue";
import ProductDetails from "@/components/ProductDetails.vue";
import Accordion from "primevue/accordion";
import AccordionPanel from "primevue/accordionpanel";
import AccordionHeader from "primevue/accordionheader";
import AccordionContent from "primevue/accordioncontent";
import ImageBorder from "@/components/ImageBorder.vue";
import axios from "axios";
const products = ref();
const getProducts = async () => {
  try {
    const response = await axios.get(
      `${import.meta.env.VITE_BACKEND_URL}/api/products`
    );
    products.value = response.data;
    console.log(response.data);
  } catch (error) {}
};
getProducts();
</script>
<template>
  <div class="md:grid md:grid-cols-2 lg:grid-cols-4 lg:mx-8 animate-fall">
    <ImageBorder v-for="product in products">
      <img :src="product.image" alt="" />
      <p>{{ product.name }}</p>
      <p class="w-full">{{ product.cost }} zł</p>
    </ImageBorder>
    <!--Example View after click -->
    <!--     <ProductDetails>
      <template #image>
        <img loading="lazy" src="/public/assets/4020_edited.avif" />
      </template>
      <template #name>
        <p>Kopiarka Bizhub 367 Konica Minolta Mono</p>
      </template>
      <template #cost>
        <p>2999.00 zł</p>
      </template>
      <template #delivery>
        <Accordion>
          <AccordionPanel>
            <AccordionHeader>Dane wysyłki</AccordionHeader>
            <AccordionContent>
              <ul>
                <li>Odbiór osobisty</li>
                <li>Nasz własny transport (wybrane lokalizacje)</li>
                <li>
                  Ubezpieczona wysyłka paletowa kurier DPD ( cena 120zł netto)
                </li>
              </ul>
            </AccordionContent>
          </AccordionPanel></Accordion
        >
      </template>
      <template #product-info>
        <Accordion>
          <AccordionPanel>
            <AccordionHeader>Bizhub C258</AccordionHeader>
            <AccordionContent>
              <ul>
                <ul>
                  <li>
                    Wielofunkcyjne urządzenie do wydruku kolorowego w formacie
                    A3
                  </li>
                  <li>
                    Szybkość drukowania w kolorze nawet do 22 stron na minutę
                  </li>
                  <li>
                    Urządzenie Poleasingowe, po pełnym przeglądzie technicznym
                  </li>
                  <li>Wyposażone w komplet oryginalnych tonerów w cenie!!!</li>
                </ul>
              </ul>
            </AccordionContent>
          </AccordionPanel></Accordion
        >
        <Accordion>
          <AccordionPanel>
            <AccordionHeader>
              Najbardziej popularny model kserokopiarki w Europie, a to za
              sprawą bardzo taniej eksploatacji oraz bezawaryjnej
              pracy.</AccordionHeader
            >
            <AccordionContent>
              <p>
                Wydajność tonera: Druk czarny 28 000 stron; CMY 26 000 stron.
              </p>
              <p>
                Wydajność sekcji obrazowania: W czerni 90 000 stron/ 600 000
                stron (bęben/wywoływarka); CMY 55 000 stron/600 000 stron
                (bęben/wywoływarka).
              </p>
              <p>
                Pojemność papieru w kasetach: 500+500 oraz 150 podajnik boczny.
                (możliwość rozszerzenia).
              </p>
              <p>Nośniki od A6 do SRA3, banner 1,2 m.</p>
              <p>Grubość papieru: 52 – 300 g/m2.</p>
              <p>Rozdzielczość drukowania: 1800 x 600 dpi; 1200 x 1200 dpi.</p>
              <p>Rozdzielczość kopiowania: 600 x 600 dpi.</p>
              <p>Szybkość kopiowania/druku A4 (mono/kolor): Do 25.</p>
              <p>Rozdzielczość skanowania: Maks. 600 x 600 dpi.</p>
              <p>
                Tryby skanowania: Skanowanie do e-mail (Scan-to-Me), Skanowanie
                do SMB (Scan-to-Home), Skanowanie do FTP, Skanowanie do skrzynki
                użytkownika, Skanowanie do USB, Skanowanie do WebDAV, Skanowanie
                do DPWS, Skanowanie sieciowe TWAIN.
              </p>
            </AccordionContent>
          </AccordionPanel></Accordion
        >
        <Accordion>
          <AccordionPanel>
            <AccordionHeader>Standardowe wyposażenie:</AccordionHeader>
            <AccordionContent>
              <p>
                Zestaw pełnych oryginalnych tonerów + pojemnik na zużyty toner.
              </p>
              <p>
                DF-629 Podajnik dokumentów: Automatyczny podajnik z funkcją
                obracania dokumentów, pojemność 100 arkuszy.
              </p>
              <p>Podstawa na kołach (zamienna z PC210 oraz PC410).</p>
              <p>Czytelny dotykowy panel w języku Polskim.</p>
              <p>Dysk twardy 250GB.</p>
              <p>Kabel zasilający oraz kabel Lan.</p>
              <p>Instrukcja obsługi.</p>
              <h4>Dodatkowe wyposażenie:</h4>
              <p>FS534 finisher zszywający / FS534sd finisher do broszur.</p>
              <p>IC-416 Kontroler Fiery.</p>
              <p>PC-210: 2 x podajnik uniwersalny A5–A3, 2 x 500 arkuszy.</p>
              <p>
                PC-410: Kaseta dużej pojemności A4, 2,500 arkuszy, 52–256 g/m2.
              </p>
            </AccordionContent>
          </AccordionPanel></Accordion
        >
      </template>
    </ProductDetails> -->
  </div>
</template>
