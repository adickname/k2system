<script setup>
import Accordion from "primevue/accordion";
import AccordionPanel from "primevue/accordionpanel";
import AccordionHeader from "primevue/accordionheader";
import AccordionContent from "primevue/accordioncontent";
const item = defineProps(['name', 'image', 'quantity', 'price'])
</script>
<template>
    <Accordion>
        <AccordionPanel>
            <AccordionHeader>{{ item.name }} <img :src="`${import.meta.env.VITE_BACKEND_URL}${item.image}`" alt=""
                    class="ml-4 mr-4 h-[100px]">
            </AccordionHeader>
            <AccordionContent>
                <p>ilosc {{ item.quantity }}</p>
                <p>cena {{ item.price }}</p>
            </AccordionContent>
        </AccordionPanel>
    </Accordion>
</template>