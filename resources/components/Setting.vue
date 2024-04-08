<script setup>
import api from "@/ts/api.ts";
import {ref, computed} from "vue";

const {refData: setting} = await api.call({method: 'get', url: 'setting'});

</script>

<template>
    <div>
        <div class="block-content" v-if="setting">
            <form action="/setting" method="post">
                <div class="is-grid grid-2">
                    <div class="form-group">
                        <label class="form-label">Google App Client ID</label>
                        <input type="text"
                               name="client_id"
                               placeholder="Client ID"
                               v-model="setting.client_id">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Google App Secret key</label>
                        <input type="text"
                               name="client_secret"
                               placeholder="Client Secret Key"
                               v-model="setting.client_secret">
                    </div>

                    <button type="submit" v-if="! setting.is_connected">Connect</button>
                </div>
            </form>
        </div>
    </div>
</template>
