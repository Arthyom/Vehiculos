<script lang="js" setup>
import { computed, onBeforeUpdate, onMounted,  onUpdated,  ref,  useTemplateRef, watch, watchEffect } from 'vue';

    const props =   defineProps({showDialog: false,  title: {default: 'Cargando'}, message: {default: 'Espere por favor'}})


    const dialog = useTemplateRef('dialog')

    watch( () => (props.showDialog), (show) =>{

        if(show)
            dialog.value.showModal()
        else
            dialog.value.close()
   })

</script>



<template>

        <dialog ref="dialog"   class="modal text-center" >
          <div class="modal-box w-[45%] xs:w-[15%]">
            <h3 class="text-lg font-bold">{{ title }}</h3>
            <p class="py-4">{{ message }}</p>
            <span class="loading loading-spinner  w-full"></span>
            <!-- <div class="modal-action">
              <form method="dialog">
                <button class="btn">Close</button>
              </form>
            </div> -->
          </div>
        </dialog>




</template>
