<script setup>
import FloatLabel from "primevue/floatlabel";
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import { ref } from "vue";
const name = ref(null);
const userEmail = ref(null);
const topic = ref(null);
const message = ref(null);
</script>
<template>
  <div class="lg:mx-auto mx-4">
    <form>
      <FloatLabel class="my-4 w-full">
        <InputText id="name" v-model="name" class="w-full" />
        <label for="name">Imię</label>
      </FloatLabel>
      <FloatLabel class="my-4 w-full">
        <InputText id="userEmail" v-model="userEmail" class="w-full" />
        <label for="userEmail">E-mail</label>
      </FloatLabel>
      <FloatLabel class="my-4 w-full">
        <InputText id="topic" v-model="topic" class="w-full" />
        <label for="topic">Temat</label>
      </FloatLabel>
      <FloatLabel class="my-4 w-full">
        <Textarea id="message" v-model="message" class="w-full" />
        <label for="message">Wiadomość</label>
      </FloatLabel>
    </form>
  </div>
</template>
