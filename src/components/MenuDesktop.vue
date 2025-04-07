<script setup>
import Menu from "primevue/menu";
import { RouterLink } from "vue-router";
import { items } from "@/data/menu";
</script>

<template>
  <div class="flex max-w-screen">
    <img src="/public/assets/logo.png" alt="logo" />
    <Menu
      unstyled
      :model="items"
      :pt="{
        root: { class: 'flex justify-between w-full' },
        list: {
          class:
            'flex flex-row justify-around items-center w-full bg-[#03045e]',
        },
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
          v-if="item.route"
          :to="item.route"
          class="flex- text-[#48cae4] font-semibold bg-transparent flex items-center lg:justify-center cursor-pointer lg:w-40"
        >
          <span class="ml-2">{{ item.label }}</span>
        </router-link>
      </template>
    </Menu>
  </div>
</template>
