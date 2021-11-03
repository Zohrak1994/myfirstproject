import VueRouter from 'vue-router';
import Vue from "vue";

Vue.use(VueRouter);

import request from "./views/Requests";
import AddCategory from "./views/AddCategory";
const routes = [
    {
        path: "/admin/requests" ,
        component: request
    },
    {
        path: "/admin/addcategory",
        component: AddCategory
    }
];

export default new VueRouter ({
    mode: "history",
    routes
    })




