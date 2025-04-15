<script setup>
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import Message from "primevue/message";
import { ref, watch, reactive } from "vue";
import axios from "axios";
const props = defineProps(["cost", "description", "image", "id", "name"]);
const sendedCorrectly = ref(null);
const local = reactive({ ...props });
watch(
  props,
  (newProps) => {
    Object.assign(local, newProps);
  },
  { deep: true }
);
const updateProduct = async () => {
  try {
    const response = await axios.put(
      `${import.meta.env.VITE_BACKEND_URL}/api/products/${local.id}`,
      {
        cost: local.cost,
        name: local.name,
        description: local.description,
        img: local.imagePath,
      },
      {
        headers: {
          "Content-Type": "application/json",
        },
      }
    );
    if (response.status === 201) {
      local.name = null;
      local.cost = null;
      local.imagePath = null;
      local.description = null;
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

const deleteProduct = async () => {
  try {
    const response = await axios.delete(
      `${import.meta.env.VITE_BACKEND_URL}/api/products/${local.id}`
    );
    if (response.status === 200) {
      sendedCorrectly.value = true;
    } else {
      sendedCorrectly.value = false;
    }
  } catch (error) {
    sendedCorrectly.value = false;
  }
};
</script>
<template>
  <div>
    <p>Name</p>
    <Textarea v-model="local.name" rows="5" cols="50" />
    <p>Image Path</p>
    <InputText v-model="local.imagePath"></InputText>
    <p>Cena</p>
    <InputText v-model="local.cost"></InputText>
    <p>Opis</p>
    <Textarea v-model="local.description" rows="5" cols="50" />
  </div>
  <div>
    <Button @click="deleteProduct()" class="mx-4">Usuń</Button>
    <Button @click="updateProduct()">Edytuj</Button>
  </div>
  <Message
    severity="success"
    :life="2000"
    v-if="sendedCorrectly === true"
    @life-end="resetSendedCorrectly"
    >Wykonano pomyślnie</Message
  >
  <Message
    severity="warn"
    :life="2000"
    @life-end="resetSendedCorrectly"
    v-else-if="sendedCorrectly === false"
    >Nie wykonano pomyślnie</Message
  >
</template>
