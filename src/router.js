import { createWebHistory, createRouter } from "vue-router";

const router = createRouter({
  routes: [
    {
      path: "/",
      component: () => import("./pages/Home.vue"),
      name: "home",
    },
    {
      path: "/about",
      component: () => import("./pages/About.vue"),
      name: "about",
    },
    {
      path: "/delivery",
      component: () => import("./pages/Delivery.vue"),
      name: "delivery",
    },
    {
      path: "/services",
      component: () => import("./pages/Services.vue"),
      name: "services",
    },
    {
      path: "/products",
      component: () => import("./pages/Products.vue"),
      name: "products",
    },
    {
      path: "/contact",
      component: () => import("./pages/Contact.vue"),
      name: "contact",
    },
    {
      path: "/cart",
      component: () => import("./pages/Cart.vue"),
      name: "cart",
    },
  ],
  history: createWebHistory(),
});

export { router };
