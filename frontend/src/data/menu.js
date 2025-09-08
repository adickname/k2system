import { ref } from "vue";

export const items = ref([
  {
    label: "Home",
    route: "/",
    name: "home",
  },
  {
    label: "O nas",
    route: "about",
    name: "about",
  },
  {
    label: "Dostawa",
    route: "delivery",
    name: "delivery",
  },
  {
    label: "Usługi",
    route: "services",
    name: "services",
  },
  {
    label: "Sklep",
    route: "products",
    name: "products",
  },
  {
    label: "Kontakt",
    route: "contact",
    name: "contact",
  },
  {
    label: "Zaloguj",
    route: "login",
    name: "login",
  },

  {
    route: "cart",
    name: "cart",
  },
]);
