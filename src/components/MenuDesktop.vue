<script setup>
import Menu from "primevue/menu";
import { RouterLink } from "vue-router";
import { items } from "@/data/menu";
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
          v-if="item.route !== 'cart'"
          :to="item.route"
          class="text-[#48cae4] font-semibold bg-transparent flex items-center lg:justify-center cursor-pointer lg:w-40"
        >
          <span class="ml-2" v-if="item.route !== 'cart'">{{
            item.label
          }}</span>
        </router-link>
      </template>
    </Menu>
    <i class="pi pi-shopping-cart px-4"></i>
  </div>
</template>
