<script setup>
import { ref } from "vue";
import Menu from "primevue/menu";
import Button from "primevue/button";
import { RouterLink } from "vue-router";
import { items } from "@/data/menu";
import { router } from "@/router";

const showMenu = ref(false);
const toggle = () => {
  showMenu.value = !showMenu.value;
};
const navigate = (itemName) => {
  toggle();
  router.push({ name: itemName });
};
</script>

<template>
  <div>
    <div class="flex items-center p-2 bg-[#03045e]">
      <Button
        v-if="!showMenu"
        icon="pi pi-align-justify"
        @click="toggle"
        title="open-menu"
      >
      </Button>
      <Button v-else icon="pi pi-times" @click="toggle" title="close-menu">
      </Button>
      <img src="/public/assets/logo.png" alt="logo" class="mx-2" />
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
          v-if="item.route !== 'cart'"
          @keydown.enter="navigate(item.name)"
          @keydown.space="navigate(item.name)"
          :to="{ name: item.name }"
          class="flex-1 bg-[#03045e] text-[#48cae4] flex items-center justify-center p-4 h-10 w-full"
          @click="toggle"
        >
          <span class="ml-2">{{ item.label }}</span>
        </router-link>
        <router-link
          v-else
          @keydown.enter="navigate(item.name)"
          @keydown.space="navigate(item.name)"
          @click="toggle"
          :to="{ name: item.name }"
          class="flex-1 bg-[#03045e] text-[#48cae4] flex items-center justify-center p-4 h-10 w-full"
        >
          <i class="pi pi-shopping-cart cursor-pointer px-2" title="cart"></i>
        </router-link>
      </template>
    </Menu>
  </div>
</template>
