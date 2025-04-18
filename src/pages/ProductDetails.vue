<script setup>
import axios from "axios";
import ImageBorder from "@/components/ImageBorder.vue";
import InputNumber from "primevue/inputnumber";
import Accordion from "primevue/accordion";
import AccordionPanel from "primevue/accordionpanel";
import AccordionHeader from "primevue/accordionheader";
import AccordionContent from "primevue/accordioncontent";
import { ref, watch } from "vue";
import { useRoute } from "vue-router";
const product = ref(null);
const route = useRoute();
const getProduct = async () => {
  const response = await axios.get(
    `${import.meta.env.VITE_BACKEND_URL}/api/products/${route.params.id}`
  );
  product.value = response.data;
};

const numberItems = ref(null);
getProduct();
</script>
<template>
  <div>
    <div
      class="flex flex-col w-full justify-center lg:flex-row animate-coming-right"
    >
      <ImageBorder class="lg:flex-1 lg:max-w-[30%]">
        <img :src="product.image" alt="" />
      </ImageBorder>
      <div class="lg:flex-1 lg:max-w-[30%]">
        <div>{{ product.name }}</div>
        <div>{{ product.cost }}</div>
        <p>Sztuk *</p>
        <InputNumber
          v-model="numberItems"
          inputId="minmax-buttons"
          mode="decimal"
          showButtons
          min="1"
          fluid
        />
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
      </div>
    </div>
    <div class="mx-auto lg:max-w-[60%] animate-coming-left">
      <div>
        <Accordion>
          <AccordionPanel>
            <AccordionHeader>Opis</AccordionHeader>
            <AccordionContent class="w-full whitespace-pre-wrap">
              <div class="max-w-full">{{ product.description }}</div>
            </AccordionContent>
          </AccordionPanel></Accordion
        >
      </div>
    </div>
  </div>
</template>
