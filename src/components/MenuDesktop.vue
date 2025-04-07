<script setup>
import Menu from "primevue/menu";
import { RouterLink } from "vue-router";
import { items } from "@/data/menu";
</script>

<template>
  <div class="flex max-w-screen">
    <img src="/public/assets/logo.png" alt="logo" />
    <Menu
      :model="items"
      :pt="{
        root: { class: 'flex justify-between w-full' },
        list: {
          class:
            'flex flex-row justify-around items-center w-full bg-[#03045e]',
        },
      }"
    >
      <template #item="{ item, props }">
        <router-link
          v-if="item.route"
          :to="item.route"
          class="flex-1 text-[#48cae4] font-semibold bg-transparent flex items-center lg:justify-center cursor-pointer lg:w-40"
        >
          <span class="ml-2">{{ item.label }}</span>
        </router-link>
      </template>
    </Menu>
  </div>
</template>
