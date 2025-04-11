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
</script>
<template>
  <div class="lg:flex justify-center">
    <section>
      <h1>Mój koszyk</h1>
      <article>
        <CartItem></CartItem>
      </article>
      <Accordion>
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
      <Accordion>
        <AccordionPanel>
          <AccordionHeader>Dodaj komentarz</AccordionHeader>
          <AccordionContent>
            <Textarea></Textarea>
          </AccordionContent>
        </AccordionPanel>
      </Accordion>
    </section>
    <section class="lg:mx-4">
      <h2>Podsumowanie zamówienia</h2>
      <div class="flex flex-row">
        <p class="flex-1">Razem</p>
        <p class="flex-1">7382 zł</p>
      </div>
      <div>
        <Button label="Zamówienie" class="w-full"></Button>
      </div>
    </section>
  </div>
</template>
