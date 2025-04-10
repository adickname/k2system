import { ref } from "vue";

export const items = ref([
  {
    label: "Home",
    route: "/",
  },
  {
    label: "O nas",
    route: "about",
  },
  {
    label: "Dostawa",
    route: "delivery",
  },
  {
    label: "Usługi",
    route: "services",
  },
  {
    label: "Sklep",
    route: "products",
  },
  {
    label: "Kontakt",
    route: "contact",
  },
  {
    route: "cart",
  },
]);
