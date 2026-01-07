<script setup>
import { useRoute } from "vue-router";
const route = useRoute();
const correct = route.query.correct;
</script>
<template>
    <p>{{ correct === "true" ? "Płatność zakończona pomyślnie" : "Płatność nie powiodła się" }}</p>
</template>