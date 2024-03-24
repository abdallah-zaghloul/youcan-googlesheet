import {default as mainAxios} from "axios";

/*
const customAxios = mainAxios.create({
    baseURL: location.origin,
    timeout: 6000,
    withCredentials: true,
    xsrfCookieName: 'XSRF-TOKEN',
    xsrfHeaderName: 'X-XSRF-TOKEN',
    Headers: {
        accept: 'application/json'
    }
});
*/

window.axios = mainAxios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
export default window.axios;
