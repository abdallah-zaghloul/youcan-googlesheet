import {ref} from "vue";
import axios from "./axios.js";

export default function api(method, url, params = null, config = null, key = 'data') {
    const data = ref({});
    const getData = async () => {
        let response = await axios[method](url, params, config);
        data.value = response.data
    }

    return {
        data,
        getData
    };
}
