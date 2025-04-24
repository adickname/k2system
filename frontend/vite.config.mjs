import { fileURLToPath, URL } from "node:url";
import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import tailwindcss from "@tailwindcss/vite";

// https://vitejs.dev/config/
export default defineConfig({
  server: {
    watch: {
      usePolling: true, // Wymusza nasłuchiwanie zmian
    },
  },
  plugins: [vue(), tailwindcss()],
  resolve: {
    alias: {
      "@": fileURLToPath(new URL("./src", import.meta.url)),
    },
  },
  devOptions: {
    enabled: true, // Włącz generowanie w trybie deweloperskim
    type: "module", // Możesz wybrać 'module' lub 'script' w zależności od potrzeby
  },
});
