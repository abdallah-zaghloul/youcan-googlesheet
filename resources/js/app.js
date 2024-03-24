// import 'virtual:uno.css'
import 'uno.css'
import '../css/app.css';
import '@youcan/ui-core/tokens';
import '@youcan/ui-vue3/style';
// import {createApp} from 'vue';
import App from "../components/App.vue";
import {createApp} from 'vue/dist/vue.esm-bundler';
import Router from "./router.js";



createApp(App)
    .use(Router)
    .mount('#app');
