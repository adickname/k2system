<script setup>
import Login from "@/components/Login.vue";
const backendUrlLogin = `${import.meta.env.VITE_BACKEND_URL}/api/users/login`;
const backendUrlRegister = `${import.meta.env.VITE_BACKEND_URL
  }/api/users/create`;

const backendUrlLogout = `${import.meta.env.VITE_BACKEND_URL}/api/users/logout`;
</script>
<template>
  <Login :backend-url-login="backendUrlLogin" :backend-url-logout="backendUrlLogout"
    :backend-url-register="backendUrlRegister" role="user"></Login>
</template>
