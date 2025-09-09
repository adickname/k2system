<script setup>
import { onMounted, ref } from "vue";
import FloatLabel from "primevue/floatlabel";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Button from "primevue/button";
import Message from "primevue/message";
import { useIsLoged } from "@/composables/useIsLoged.vue";
import { useIsSendedCorrectly } from "@/composables/useIsSendedCorrectly.vue";
import { useLoginSystemFunctions } from "@/composables/useLoginSystemFunctions.vue";
const { isLoged } = useIsLoged()
const { sendedCorrectly } = useIsSendedCorrectly()
const { login, logout, register } = useLoginSystemFunctions()
const username = ref(null);
const password = ref(null);
const props = defineProps([
  "backendUrlLogin",
  "backendUrlRegister",
  "backendUrlLogout",
  "role",
]);

onMounted(() => {
  resetSendedCorrectly()
})

const resetSendedCorrectly = () => {
  sendedCorrectly.value = null;
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
    <Button label="Zaloguj" class="mx-4" @click="login(props.role, props.backendUrlLogin, username, password)"
      v-if="!isLoged"></Button>
    <Button label="Wyloguj" class="mx-4" @click="logout(props.backendUrlLogout)" v-else></Button>
    <Button label="Zarejestruj" @click="register(props.role, props.backendUrlRegister, username, password)"
      v-if="!isLoged"></Button>
    <Message severity="success" :life="2000" v-if="sendedCorrectly === true" @life-end="resetSendedCorrectly">Wysłano
      pomyślnie</Message>
    <Message severity="success" :life="2000" v-if="sendedCorrectly === false" @life-end="resetSendedCorrectly">Nie
      Wysłano pomyślnie</Message>
  </div>
</template>
