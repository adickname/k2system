<script setup>
import { ref } from "vue";
import Menu from "primevue/menu";
import Button from "primevue/button";
import { RouterLink } from "vue-router";
import { items } from "@/data/menu";

const showMenu = ref(false);
const toggle = () => {
  showMenu.value = !showMenu.value;
};
</script>

<template>
  <div>
    <div class="flex justify-between items-center p-2 bg-[#03045e]">
      <Button v-if="!showMenu" icon="pi pi-align-justify" @click="toggle">
      </Button>
      <Button v-else icon="pi pi-times" @click="toggle"> </Button>
      <img src="/public/assets/logo.png" alt="logo" class="mx-2" />
      <i class="pi pi-shopping-cart cursor-pointer px-2"></i>
    </div>
    <Menu
      v-if="showMenu"
      :model="items"
      :pt="{
        root: { class: 'flex justify-between p-4' },
        list: { class: 'w-full' },
      }"
    >
      <template #item="{ item, props }">
        <router-link
          v-if="item.route"
          :to="item.route"
          class="flex-1 bg-[#03045e] text-[#48cae4] flex items-center justify-center p-4 h-10 w-full"
          @click="toggle"
        >
          <span class="ml-2">{{ item.label }}</span>
        </router-link>
      </template>
    </Menu>
  </div>
</template>
