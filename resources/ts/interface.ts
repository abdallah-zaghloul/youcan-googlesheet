import {ref} from "vue/dist/vue";
import {AxiosDefaults, AxiosHeaderValue, AxiosResponse, HeadersDefaults} from "axios";

export interface Session {
    id: string,
    session_id: string,
    store_id: string,
    seller_id: string,
    access_token: string,
    refresh_token: string,
    expires_at: Date,
    created_at: Date,
    updated_at: Date
}

export interface Setting {
    id: string,
    client_id: string,
    store_id: string,
    seller_id: string,
    client_secret: string,
    access_token: string | null,
    is_connected: boolean,
    created_at: Date,
    updated_at: Date
}

export interface Call {
    status: boolean,
    statusCode: number,
    resBody: any,
    data: any,
    // @ts-ignore
    refData: ref<any>
    errors?: Error[],
    config?: Omit<AxiosDefaults, 'headers'> & {
        headers: HeadersDefaults & {
            [key: string]: AxiosHeaderValue
        },
    },
}

export interface Error {
    [key: string]: string[]
}
