import { defineStore } from 'pinia'
import { computed, ref } from 'vue'


export const useVehiclesStore = defineStore('vehiculosStore', ()=>{

    const hasBeenDeleted = ref(false);
    const hasDeleted = computed( () => hasBeenDeleted.value )

    const setDeleted = (val) =>{
        hasBeenDeleted.value = val
    }



    return {
        setDeleted,
        hasDeleted
    }

})
