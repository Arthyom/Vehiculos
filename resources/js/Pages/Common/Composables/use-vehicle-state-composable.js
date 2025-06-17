import { computed, ref, watch } from "vue"

export const useVehicleState = () =>{

    const isDeleted = ref(false)

    const vehicleIsDeleted = computed( () =>  isDeleted.value)

    const setVehicleState = (state) =>{
        isDeleted.value = state
    }




    return {
        vehicleIsDeleted,
        setVehicleState
    }
}
