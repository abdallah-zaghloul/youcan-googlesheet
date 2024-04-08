import 'uno.css'
import '@/css/app.css';
import '@youcan/ui-core/tokens';
import '@youcan/ui-vue3/style';
// @ts-ignore
import App from '@/components/App.vue';
import {createApp} from 'vue';
// import api from "@/ts/api.ts";
// @ts-ignore
import router from "@/ts/router.ts";

createApp(App)
    .use(router)
    .mount('#app');
