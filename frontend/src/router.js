import { createWebHistory, createRouter } from "vue-router";
import axios from "axios";

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
      beforeEnter: async (to, from, next) => {
        try {
          await axios.head(
            `${import.meta.env.VITE_BACKEND_URL}/api/products/${to.params.id}`
          );
          next();
        } catch (err) {
          if (err.response?.status === 404) {
            next({ name: "404-product" });
          } else {
            next(false);
          }
        }
      },
    },
    {
      path: "/konto-uzytkownika",
      component: () => import("./pages/UserAccount.vue"),
      name: "user",
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
    {
      path: "/login",
      component: () => import("./pages/UserLogin.vue"),
      name: "login",
    },
    {
      path: "/404-product",
      component: () => import("@/pages/404Page.vue"),
      name: "404-product",
    },
    {
      path: "/:notFound",
      component: () => import("@/pages/404Page.vue"),
      name: "404",
    },
  ],
  history: createWebHistory(),
});

export { router };
