import {AxiosRequestConfig, AxiosResponse, default as baseAxios} from 'axios';
import {Call, Session} from "@/ts/interface.ts";
import {ref} from "vue";

export default class api {

    //Just for debugging
    public static setSession(session: Session) {
        localStorage.setItem('session', JSON.stringify(session));
        return session
    }

    //Just for debugging
    public static setCsrf(csrf: string) {
        localStorage.setItem('csrf', csrf);
        return csrf
    }
    //Just for debugging
    public static getCsrf() {
        return localStorage.getItem('csrf');
    }
    //Just for debugging
    public static getSession(): Session | null {
        const session: string | null = localStorage.getItem('session');
        return session ? JSON.parse(session) : null;
    }

    public static getConfig(): AxiosRequestConfig {
        return {
            withCredentials: true,
            headers: {
                'x-api-key': this.getSession()?.store_id,
                'Content-Type': 'application/json',
                'X-XSRF-TOKEN': this.getCsrf(),
            }
        };
    }

    public static axios() {
        return baseAxios.create(this.getConfig());
    }


    public static async call(
        {method, url, key, params, initialRefValue, onFailure}: {
            method: string,
            url: string,
            key?: string,
            initialRefValue?: any,
            params?: any,
            onFailure?: (reason?: any) => any,
        }
    ): Promise<Call> {
        const refData = ref(initialRefValue);
        const getResponse = async () => await this.getResponse({method, url, params, onFailure});
        const {data: resBody, status: statusCode} = await getResponse();
        refData.value = key ? resBody.data?.[key] : resBody?.data;

        return {
            statusCode,
            resBody,
            refData,
            status: resBody?.status,
            data: resBody?.data,
            errors: resBody?.errors,
            config: this.axios().defaults,
        };
    }

    public static async getResponse(
        {method, url, params, onFailure}: {
            method: string,
            url: string,
            params?: any,
            onFailure?: (reason?: any) => any,
        }
    ): Promise<AxiosResponse> {
        // @ts-ignore
        const response = ['get', 'head', 'delete', 'options'].includes(method) ? this.axios()[method](url, {params}) : this.axios()[method](url, params);
        return response.catch((reason: any) => onFailure ? onFailure(reason) : null)
    }
}
