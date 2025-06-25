import { defineStore } from "pinia";
import { computed, ref } from "vue";

export const useGeneralStore = defineStore('generalStore', () =>{

    const isLoading = ref(false);


    const showLoader = computed( () => isLoading.value)


    const setLoadingState = (state) => isLoading.value = state

    return{
        showLoader,

        setLoadingState
    }
})
