<script setup>
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import Message from "primevue/message";
import { ref } from "vue";
import axios from "axios";
const description = ref();
const name = ref();
const cost = ref();
const imagePath = ref();
const sendedCorrectly = ref(null);
const addProduct = async () => {
  try {
    const response = await axios.post(
      `${import.meta.env.VITE_BACKEND_URL}/api/products`,
      {
        cost: cost.value,
        name: name.value,
        description: description.value,
        img: imagePath.value,
      },
      {
        headers: {
          "Content-Type": "application/json",
        },
      }
    );
    if (response.status === 201) {
      name.value = null;
      cost.value = null;
      imagePath.value = null;
      description.value = null;
      sendedCorrectly.value = true;
    } else {
      sendedCorrectly.value = false;
    }
  } catch (error) {
    sendedCorrectly.value = false;
  }
};
const resetSendedCorrectly = () => {
  sendedCorrectly.value = null;
};
</script>
<template>
  <div>
    <p>Name</p>
    <Textarea v-model="name"></Textarea>
    <p>Image Path</p>
    <InputText v-model="imagePath"></InputText>
    <p>Cena</p>
    <InputText v-model="cost"></InputText>
    <p>Opis</p>
    <Textarea v-model="description" rows="5" cols="50" />
  </div>
  <div>
    <Button @click="addProduct()">Dodaj</Button>
  </div>
  <Message
    severity="success"
    :life="2000"
    v-if="sendedCorrectly === true"
    @life-end="resetSendedCorrectly"
    >Wysłano pomyślnie</Message
  >
  <Message
    severity="warn"
    :life="2000"
    @life-end="resetSendedCorrectly"
    v-else-if="sendedCorrectly === false"
    >Nie wysłano pomyślnie</Message
  >
</template>
