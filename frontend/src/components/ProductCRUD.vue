<script setup>
import InputText from "primevue/inputtext";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import Message from "primevue/message";
import FileUpload from "primevue/fileupload";
import { ref, watch, reactive } from "vue";
import axios from "axios";
const props = defineProps(["cost", "description", "image", "id", "name"]);
const sendedCorrectly = ref(null);
const selectedImage = ref(props.image);
const local = reactive({ ...props });
watch(
  props,
  (newProps) => {
    Object.assign(local, newProps);
  },
  { deep: true }
);
const updateProduct = async () => {
  let imageRequest;
  if (local.image instanceof File === false) {
    imageRequest = local.image.replace(
      `${import.meta.env.VITE_BACKEND_URL}storage/`,
      ""
    );
  } else {
    imageRequest = local.image;
  }
  try {
    const formData = new FormData();
    formData.append("_method", "PUT");
    formData.append("name", local.name);
    formData.append("cost", local.cost);
    formData.append("description", local.description);
    formData.append("image", imageRequest);
    const response = await axios.post(
      `${import.meta.env.VITE_BACKEND_URL}/api/products/${local.id}`,
      formData,
      {
        headers: {
          "Content-Type": "multipart/form-data",
          Authorization: "Bearer " + sessionStorage.getItem("adminToken"),
        },
      }
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

const resetSendedCorrectly = () => {
  sendedCorrectly.value = null;
};

const onFileSelect = (event) => {
  local.image = event.files[0];
};

const removeFile = () => {
  selectedImage.value = null;
};

const deleteProduct = async () => {
  try {
    const response = await axios.delete(
      `${import.meta.env.VITE_BACKEND_URL}/api/products/${local.id}`,
      {
        headers: {
          Authorization: "Bearer " + sessionStorage.getItem("adminToken"),
        },
      }
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
    <p>Image</p>
    <img :src="local.image" alt="" />
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
    <div v-if="local.image">
      <p>Wybrane zdjęcie: {{ local.image.name }}</p>
      <Button @click="removeFile">Usuń zdjęcie</Button>
    </div>
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
