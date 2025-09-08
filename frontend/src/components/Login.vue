<script setup>
import { ref } from "vue";
import FloatLabel from "primevue/floatlabel";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Button from "primevue/button";
import Message from "primevue/message";
import axios from "axios";
import { useIsLoged } from "@/composables/useIsLoged.vue";
const { isLoged } = useIsLoged()
const username = ref(null);
const password = ref(null);
const props = defineProps([
  "backendUrlLogin",
  "backendUrlRegister",
  "backendUrlLogout",
  "role",
]);

const sendedCorrectly = ref(null);
const resetSendedCorrectly = () => {
  sendedCorrectly.value = null;
};

const login = async () => {
  let loginData = {
    ...(props.role == "admin"
      ? { username: username.value }
      : { email: username.value }),
    password: password.value,
  };
  const response = await axios.post(props.backendUrlLogin, loginData, {
    withCredentials: true, withXSRFToken: true
  });
  if (response.status === 200) {
    sendedCorrectly.value = true;
    isLoged.value = true;
  } else {
    sendedCorrectly.value = false;
  }
};

const register = async () => {
  let loginData = {
    ...(props.role == "admin"
      ? { username: username.value }
      : { email: username.value }),
    password: password.value,
  };
  const response = await axios.post(props.backendUrlRegister, loginData, { withCredentials: true, withXSRFToken: true });
  if (response.status === 201) {
    sendedCorrectly.value = true;
    isLoged.value = true;
  } else {
    sendedCorrectly.value = false;
  }
};

const logout = async () => {
  const response = await axios.post(
    props.backendUrlLogout, {},
    {
      withCredentials: true, withXSRFToken: true
    }
  );
  if (response.status === 200) {
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
      <Password id="password" v-model="password" :feedback="false" class="w-full" />
      <label for="password">Haslo</label>
    </FloatLabel>
    <Button label="Zaloguj" class="mx-4" @click="login()" v-if="!isLoged"></Button>
    <Button label="Wyloguj" class="mx-4" @click="logout()" v-else></Button>
    <Button label="Zarejestruj" @click="register()" v-if="!isLoged"></Button>
    <Message severity="success" :life="2000" v-if="sendedCorrectly === true" @life-end="resetSendedCorrectly">Wysłano
      pomyślnie</Message>
    <Message severity="success" :life="2000" v-if="sendedCorrectly === false" @life-end="resetSendedCorrectly">Nie
      Wysłano pomyślnie</Message>
  </div>
</template>
