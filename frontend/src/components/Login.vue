<script setup>
import { ref } from "vue";
import FloatLabel from "primevue/floatlabel";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Button from "primevue/button";
import Message from "primevue/message";
import axios from "axios";
const username = ref(null);
const password = ref(null);
const isLoged = ref(false);
const sendedCorrectly = ref(null);
const resetSendedCorrectly = () => {
  sendedCorrectly.value = null;
};
window.addEventListener("storage", () => {
  isLoged.value = !!sessionStorage.getItem("adminToken");
});
const login = async () => {
  const response = await axios.post(
    `${import.meta.env.VITE_BACKEND_URL}/api/login`,
    {
      username: username.value,
      password: password.value,
    }
  );
  if (response.status === 200) {
    const token = await response.data.token;
    sessionStorage.setItem("adminToken", token);
    sendedCorrectly.value = true;
    isLoged.value = true;
  } else {
    sendedCorrectly.value = false;
  }
};

const register = async () => {
  const response = await axios.post(
    `${import.meta.env.VITE_BACKEND_URL}/api/add-account`,
    {
      username: username.value,
      password: password.value,
    }
  );
  if (response.status === 200) {
    const token = await response.data.token;
    sessionStorage.setItem("adminToken", token);
    sendedCorrectly.value = true;
    isLoged.value = true;
  } else {
    sendedCorrectly.value = false;
  }
};

const logout = async () => {
  const response = await axios.post(
    `${import.meta.env.VITE_BACKEND_URL}/api/logout`,
    {},
    {
      headers: {
        Authorization: "Bearer " + sessionStorage.getItem("adminToken"),
      },
    }
  );
  if (response.status === 200) {
    sessionStorage.removeItem("adminToken");
    sendedCorrectly.value = true;
    isLoged.value = false;
  } else {
    sendedCorrectly.value = false;
  }
};
</script>
<template>
  <div class="lg:w-[20%]">
    <FloatLabel class="my-4 w-full">
      <InputText id="username" v-model="username" class="w-full" />
      <label for="username">Nazwa uzytkownika</label>
    </FloatLabel>
    <FloatLabel class="my-4 w-full">
      <Password
        id="password"
        v-model="password"
        :feedback="false"
        class="w-full"
      />
      <label for="password">Haslo</label>
    </FloatLabel>
    <Button
      label="Zaloguj"
      class="mx-4"
      @click="login()"
      v-if="!isLoged"
    ></Button>
    <Button label="Wyloguj" class="mx-4" @click="logout()" v-else></Button>
    <Button label="Zarejestruj" @click="register()"></Button>
    <Message
      severity="success"
      :life="2000"
      v-if="sendedCorrectly === true"
      @life-end="resetSendedCorrectly"
      >Wysłano pomyślnie</Message
    >
    <Message
      severity="success"
      :life="2000"
      v-if="sendedCorrectly === false"
      @life-end="resetSendedCorrectly"
      >Niw Wysłano pomyślnie</Message
    >
  </div>
</template>
