<script setup>
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import Message from "primevue/message";
import FileUpload from "primevue/fileupload";
import { ref } from "vue";
import axios from "axios";
const description = ref();
const name = ref();
const cost = ref();
const sendedCorrectly = ref(null);
const selectedImage = ref(null);
const addProduct = async () => {
  try {
    const formData = new FormData();
    formData.append("name", name.value);
    formData.append("cost", cost.value);
    formData.append("description", description.value);
    formData.append("image", selectedImage.value);
    const response = await axios.post(
      `${import.meta.env.VITE_BACKEND_URL}/api/products`,
      formData,
      {
        headers: {
          Authorization: "Bearer " + sessionStorage.getItem("adminToken"),
          "Content-Type": "multipart/form-data",
        },
      }
    );
    if (response.status === 201) {
      name.value = null;
      cost.value = null;
      selectedImage.value = null;
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

const onFileSelect = (event) => {
  selectedImage.value = event.files[0];
};

const removeFile = () => {
  selectedImage.value = null;
};
</script>
<template>
  <div class="">
    <p>Name</p>
    <Textarea v-model="name"></Textarea>
    <p>Image</p>
    <FileUpload
      :pt="{
        root: {
          class: 'justify-self-start',
          style: { justifyContent: 'flex-start' },
        },
      }"
      @select="onFileSelect"
      name="image"
      :customUpload="true"
      accept="image/*"
      mode="basic"
      auto
      chooseLabel="Wybierz zdjęcie"
    ></FileUpload>
    <div v-if="selectedImage">
      <p>Wybrane zdjęcie: {{ selectedImage.name }}</p>
      <Button @click="removeFile">Usuń zdjęcie</Button>
    </div>
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
