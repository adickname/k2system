<script setup>
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
</script>
<template>
  <div class="lg:flex flex-col justify-center lg:w-[50%] mx-auto">
    <section class="p-2 animate-fall">
      <ImageBorder>
        <h1 class="text-center text-xl">Mój koszyk</h1>
        <article>
          <ImageBorder>
            <CartItem></CartItem>
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
          <p class="w-1/2 text-right">7382 zł</p>
        </div>
        <div>
          <Button label="Zamówienie" class="w-full"></Button>
        </div>
      </ImageBorder>
    </section>
  </div>
</template>
