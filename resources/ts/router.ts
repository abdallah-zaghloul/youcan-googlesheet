import {createRouter, createWebHistory} from 'vue-router';
import Setting from '@/components/Setting.vue';

const routes = [
    {
        name: 'setting',
        path: '/',
        component: Setting,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

/*
router.beforeEach((to,from,next) => {
    // @ts-ignore
    document.title = to.meta.title;
    next();
})
*/

export default router;


