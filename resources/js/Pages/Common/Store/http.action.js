import axios, { Axios } from "axios"
import { defineStore } from "pinia"
import { computed, ref } from "vue"
import { UseVehiclesConf } from "../Composables/config-fields-composable";
import { Link, router } from '@inertiajs/vue3';

export const useHttp = defineStore('httpActions', () =>{


    const resourceItem = ref();
    const resourceItems = ref([]);
    const resource = ref('')

    //const baseUrl = `http://localhost:8000`
    const baseUrl = `https://www.vehiculos.alfredowflsyopollo.us`


    const computedResource = computed( () => resourceItem.value)

    const getById =  async(id) =>{

        try {

            const response = await axios.get( `${baseUrl}/${resource.value}/${id}/showAsJson` )
            resourceItem.value= response.data
            return response.data

        } catch (error) {
            throw new Error("Exc");

        }

    }

    const setResource = (r) =>{
        resource.value = r
    }


    return{
        getById,
        setResource,

        computedResource
    }

})

