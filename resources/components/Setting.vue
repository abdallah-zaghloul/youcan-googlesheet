<script>
import api from "../js/api.js";
import {onMounted} from "vue";

export default {
    setup() {
        const {data: setting, getData: getSetting} = api('get', 'setting')
        onMounted(getSetting)
        return {
            setting
        }
    }
}

</script>

<template>
    <div>
        <h1>Setting</h1>
        <h2>{{setting}}</h2>
    </div>
</template>
