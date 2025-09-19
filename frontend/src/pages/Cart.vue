<script setup>
import axios from "axios";
import CartItem from "@/components/CartItem.vue";
import Button from "primevue/button";
import FloatLabel from "primevue/floatlabel";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Accordion from "primevue/accordion";
import AccordionPanel from "primevue/accordionpanel";
import AccordionHeader from "primevue/accordionheader";
import AccordionContent from "primevue/accordioncontent";
import ImageBorder from "@/components/ImageBorder.vue";
import { computed, ref } from "vue";

const cartItems = ref();
const getCart = () => {
  if (localStorage.getItem("cart")) {
    cartItems.value = JSON.parse(localStorage.getItem("cart"));
    cartItems.value.forEach((element) => {
      element.visible = true;
    });
  }
};
getCart();

const totalCost = ref(0);

const changeTotalCost = () => {
  setTimeout(() => {
    let cart = JSON.parse(localStorage.getItem("cart"));
    if (cart.length == 0) {
      totalCost.value = 0
    } else {
      totalCost.value = cart.reduce((acc, item) => {
        return acc + Number(item.cost) * Number(item.count);
      }, 0);
    }

  }, 200);
};

const countChange = () => {
  changeTotalCost();
};

const removeItemHandler = (id) => {
  cartItems.value.forEach((element) => {
    if (element.id === id) {
      element.visible = false;
      let cartStorage = JSON.parse(localStorage.getItem("cart"));
      cartStorage = cartStorage.filter((item) => item.id !== id);
      localStorage.setItem("cart", JSON.stringify(cartStorage));
    }
  });
  changeTotalCost()
};

const sendOrder = async () => {
  let cart = JSON.parse(localStorage.getItem("cart"));
  let order = cart.map(element => {
    return { product_id: element.id, quantity: element.count }
  })
  order = {
    items: order
  }
  const stripe = await axios.post('http://localhost:8000/api/create-checkout-session', order, { withCredentials: true, withXSRFToken: true })
  window.location.href = stripe.data.url
}

</script>
<template>
  <div class="lg:flex flex-col justify-center lg:w-[50%] mx-auto">
    <section class="p-2 animate-fall">
      <ImageBorder>
        <h1 class="text-center text-xl">Mój koszyk</h1>
        <article v-for="item in cartItems">
          <ImageBorder v-if="item.visible">
            <CartItem :id="item.id" :count="item.count" @count-change="countChange"
              @remove="removeItemHandler(item.id)"></CartItem>
          </ImageBorder>
        </article>
        <Accordion class="w-full pt-2">
          <AccordionPanel>
            <AccordionHeader>Wprowadź kod rabatowy</AccordionHeader>
            <AccordionContent>
              <FloatLabel variant="on">
                <InputText id="discount" type="text" />
                <label for="discount">np. RABAT50</label>
              </FloatLabel>
              <Button label="OK"></Button>
            </AccordionContent>
          </AccordionPanel>
        </Accordion>
        <Accordion class="w-full pb-2">
          <AccordionPanel>
            <AccordionHeader>Dodaj komentarz</AccordionHeader>
            <AccordionContent>
              <Textarea></Textarea>
            </AccordionContent>
          </AccordionPanel>
        </Accordion>
      </ImageBorder>
    </section>
    <section class="p-2 animate-fall">
      <ImageBorder>
        <h2 class="text-lg">Podsumowanie zamówienia</h2>
        <div class="flex flex-row w-full">
          <p class="w-1/2">Razem</p>
          <p class="w-1/2 text-right">{{ totalCost }} zł</p>
        </div>
        <div>
          <Button label="Zamówienie" @click="sendOrder" class="w-full"></Button>
        </div>
      </ImageBorder>
    </section>
  </div>
</template>
