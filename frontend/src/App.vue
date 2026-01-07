<script setup>
import { RouterView } from "vue-router";
import Nav from "./components/Nav.vue";
import Footer from "./components/Footer.vue";
import { onMounted } from "vue";
import axios from "axios";
import { useIsLoged } from "@/composables/useIsLoged.vue";
const { isLoged } = useIsLoged()
onMounted(async () => {
  axios.get(`${import.meta.env.VITE_BACKEND_URL}/sanctum/csrf-cookie`, { withCredentials: true }).then(async () => {
    const res = await axios.post(`${import.meta.env.VITE_BACKEND_URL}/api/users/is-loged`, {}, { withCredentials: true, withXSRFToken: true })
    if (res.data.isUser) {
      isLoged.value = true
    }
  })

})
</script>

<template>
  <div class="bg-[#023e8a] text-[#48cae4] min-h-screen max-w-screen w-screen flex flex-col">
    <Nav />
    <main class="flex-1">
      <RouterView> </RouterView>
    </main>
    <Footer class="w-full" />
  </div>
</template>
