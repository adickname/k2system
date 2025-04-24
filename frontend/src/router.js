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
      path: "/products/:id",
      component: () => import("./pages/ProductDetails.vue"),
      name: "product-details",
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
    {
      path: "/admin",
      component: () => import("@/pages/Admin.vue"),
      name: "admin",
    },
  ],
  history: createWebHistory(),
});

export { router };
