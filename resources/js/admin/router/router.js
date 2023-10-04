import {createRouter, createWebHistory} from "vue-router";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// dashboard

import dashboard from "../components/dashboard/dashboard.vue";

// category

import category from "../components/category/category.vue";

// product

import product from "../components/product/product.vue";

// directory ----- ----- ----- ----- ----- ----- ----- ----- -----

const ROOT_URL = "/admin";

// route ----- ----- ----- ----- ----- ----- ----- ----- -----

const routes = [

    // layout

    {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // dashboard

            {path: ROOT_URL + '/dashboard', name: 'dashboard', component: dashboard, meta: {title: 'dashboard'}},

            // category

            {path: ROOT_URL + '/categories', name: 'category', component: category, meta: {title: 'categories'}},

            // product

            {path: ROOT_URL + '/products', name: 'product', component: product, meta: {title: 'products'}},

        ],

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
