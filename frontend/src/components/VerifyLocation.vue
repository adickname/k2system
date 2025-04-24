<script setup>
import AutoComplete from "primevue/autocomplete";
import Button from "primevue/button";
import Message from "primevue/message";
import { ref } from "vue";
import { locations as locationData } from "@/data/locations";
const value = ref();
const locations = ref(locationData);
const isInLocation = ref(null);
const search = (event) => {
  const query = event.query.trim().toLowerCase();
  if (query) {
    locations.value = locationData.filter((location) =>
      location.toLowerCase().includes(query)
    );
  } else {
    locations.value = [];
  }
};

const resetIsInLocation = () => {
  isInLocation.value = null;
};

const check = () => {
  if (locations.value.includes(value.value.toLowerCase())) {
    isInLocation.value = true;
  } else {
    console.log(false);
    isInLocation.value = false;
  }
};
</script>
<template>
  <div class="flex flex-col lg:flex-row items-center">
    <p class="text-blue-300 px-4">
      Wpisz w formularzu nazwę swojej miejscowości i sprawdź czy znajdziesz nas
      u siebie
    </p>
    <div class="card flex justify-center">
      <AutoComplete
        placeholder="miejscowosc"
        v-model="value"
        :suggestions="locations"
        @complete="search"
      />
      <Button @click="check" class="mx-1">Sprawdź</Button>
    </div>
    <Message
      severity="success"
      :life="2000"
      v-if="isInLocation === true"
      @life-end="resetIsInLocation"
      >Znajdujemy się w twojej lokalizacji</Message
    >
    <Message
      severity="warn"
      :life="2000"
      @life-end="resetIsInLocation"
      v-else-if="isInLocation === false"
      >Niestety nie znajdujemy się w twojej lokalizacji</Message
    >
  </div>
</template>
