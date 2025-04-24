<script setup>
import axios from "axios";
import ImageBorder from "@/components/ImageBorder.vue";
import InputNumber from "primevue/inputnumber";
import Accordion from "primevue/accordion";
import AccordionPanel from "primevue/accordionpanel";
import AccordionHeader from "primevue/accordionheader";
import AccordionContent from "primevue/accordioncontent";
import Message from "primevue/message";
import { ref, watch } from "vue";
import { useRoute, useRouter } from "vue-router";
import Button from "primevue/button";

const product = ref(null);
const route = useRoute();
const getProduct = async () => {
  try {
    const response = await axios.get(
      `${import.meta.env.VITE_BACKEND_URL}/api/products/${route.params.id}`
    );
    if (response.status === 200) product.value = response.data;
  } catch (error) {}
};
const sendedCorrectly = ref();
const numberItems = ref(null);
getProduct();

const addToCart = () => {
  if (localStorage.getItem("cart")) {
    let didFoundInStorage = false;
    let itemsInCart = JSON.parse(localStorage.getItem("cart"));
    itemsInCart.forEach((element) => {
      if (element.id === route.params.id) {
        element.count = element.count + numberItems.value;
        didFoundInStorage = true;
      }
    });
    if (!didFoundInStorage) {
      const item = {
        id: route.params.id,
        count: numberItems.value,
        cost: product.value.cost,
      };
      itemsInCart.push(item);
    }
    localStorage.setItem("cart", JSON.stringify(itemsInCart));
    sendedCorrectly.value = true;
  } else {
    const item = [
      {
        id: route.params.id,
        count: numberItems.value,
        cost: product.value.cost,
      },
    ];
    if (numberItems.value > 0) {
      localStorage.setItem("cart", JSON.stringify(item));
    }
  }
};
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
        <Button label="Dodaj do koszyka" @click="addToCart()"></Button>
        <Message
          severity="success"
          :life="2000"
          v-if="sendedCorrectly === true"
          @life-end="resetSendedCorrectly"
        >
          Dodano do koszyka</Message
        >
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
          </AccordionPanel>
        </Accordion>
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
          </AccordionPanel>
        </Accordion>
      </div>
    </div>
  </div>
</template>
