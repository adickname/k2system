import { createApp } from "vue";
import PrimeVue from "primevue/config";
import "primeflex/primeflex.css";
import Aura from "@primevue/themes/aura";
import "./main.css";
import "primeicons/primeicons.css";

import App from "./App.vue";
import { router } from "./router.js";

const app = createApp(App);

app
  .use(router)
  .use(PrimeVue, {
    theme: {
      preset: Aura,
      options: {
        prefix: "p",
        darkModeSelector: "system",
        cssLayer: false,
      },
    },
  })
  .mount("#app");
