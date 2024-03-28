import {createRouter, createWebHistory} from "vue-router";
import Setting from "../components/Setting.vue";

const routes = [
    {
        name: "setting",
        path: "/",
        component: Setting,
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
