import 'uno.css'
import '@/css/app.css';
import '@youcan/ui-core/tokens';
import '@youcan/ui-vue3/style';
import App from '@/components/App.vue';
import {createApp} from 'vue';
import api from "@/ts/api.ts";
import router from "@/ts/router.ts";

//Just for debugging
// @ts-ignore
const getValue = (id: string) => JSON.parse(document.getElementById(id).value);
// @ts-ignore
const session = api.setSession(getValue('session'))
// @ts-ignore
const csrf = api.setCsrf(document.getElementById('csrf').value)

createApp(App)
    .use(router)
    .mount('#app');
