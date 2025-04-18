<script setup>
import Menu from "primevue/menu";
import { router } from "@/router";
import { RouterLink } from "vue-router";
import { items } from "@/data/menu";
const navigate = (itemName) => {
  router.push({ name: itemName });
};
</script>

<template>
  <div class="flex items-center justify-between max-w-screen bg-[#03045e]">
    <img src="/public/assets/logo.png" alt="logo" />
    <Menu
      unstyled
      :model="items"
      :pt="{
        root: { class: 'flex  w-full' },
        list: {
          class:
            'flex flex-row justify-around items-center px-2 w-full bg-[#03045e]',
        },
        end: { class: 'bg-transparent' },
        item: {
          class: `
    relative inline-block
    before:content-['']
    before:absolute
    before:left-0
    before:bottom-0
    before:h-[4px]
    before:w-0
    before:bg-white
    before:transition-all
    before:duration-300
    hover:before:w-full
  `,
        },
      }"
    >
      <template #item="{ item, props }">
        <router-link
          @keydown.enter="navigate(item.name)"
          @keydown.space="navigate(item.name)"
          v-if="item.route !== 'cart'"
          :to="{ name: item.name }"
          class="text-[#48cae4] font-semibold bg-transparent flex items-center lg:justify-center cursor-pointer lg:w-40"
        >
          <span class="ml-2" v-if="item.route !== 'cart'">{{
            item.label
          }}</span>
        </router-link>
        <router-link
          v-else
          :to="{ name: item.name }"
          @keydown.enter="navigate(item.name)"
          @keydown.space="navigate(item.name)"
        >
          <i class="pi pi-shopping-cart px-4" title="cart"></i>
        </router-link>
      </template>
    </Menu>
  </div>
</template>
