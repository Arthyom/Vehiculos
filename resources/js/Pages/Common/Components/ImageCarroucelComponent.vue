<script lang="js" setup>
import { computed } from 'vue'
import { useDefaultCommon } from '../Composables/common-composable'
import { noImageUrl } from '../Constants/Constants'
import { router, usePage } from '@inertiajs/vue3'

const emiter = defineEmits('emitImages')

const props = defineProps({
     images :Object,
     filesToSend : Object,
     imagesToSend: Object,
     indicator: String
})

const {vehicleNoImage, serviceNoImage, providerNoImage} = useDefaultCommon()

const errorImage = (e) =>{
    const splitedPath = window.location.pathname.split('/')
    const resource = splitedPath[1]

    console.log('sdsd', resource)
    let noImage = ''

    switch (resource) {
        case 'vehiculos':
            noImage = vehicleNoImage.value
            break;

        case 'servicios':
            noImage = serviceNoImage.value
            break;

        case 'proveedores':
            noImage = providerNoImage.value
            break;

        default:
            noImage = vehicleNoImage.value
            break;
    }

    return e.target.src =  noImage
}
const filesPath = computed( () => {
    if(usePage().component.includes('Servicio'))
        return '/files/'

        return ''
})

const isFromServicio = computed( () => {
    console.log('sxxx ',usePage().component.includes('Servicio'))
    if(usePage().component.includes('Servicio'))
        return true

        return false
})



const onFileInputChange = (event) =>{

for (const image of event.target.files) {
    if(filesPath.value !== ''){
        if(isFromServicio.value){

            props.imagesToSend.pop()
            props.filesToSend.pop()

            props.imagesToSend.push(  window.URL.createObjectURL(image) )
            props.filesToSend.push( image )

            emiter('emitImages', props.imagesToSend, props.filesToSend)

            return
        }
    }
    props.imagesToSend.push( window.URL.createObjectURL(image))
    props.filesToSend.push(image)
}

emiter('emitImages', props.imagesToSend, props.filesToSend)



}

</script>

<template>
    <div class="w-full">
        <div class="m-2">
            <div class="carousel w-full">
                <template v-if="imagesToSend.length > 0">
                    <template v-for="(image, i) in imagesToSend">
                        <div
                            v-if="!image.includes('blob')"
                            :id="`item${i}${indicator}`"
                            class=" carousel-item w-full bg-info"
                        >
                            <img
                                @error="errorImage"
                                class="w-full max-h-[340px] rounded-lg p-2"
                                :src="`${filesPath}${image}`"
                            />
                        </div>
                        <div
                            v-else
                            :id="`item${i}${indicator}`"
                            class="carousel-item w-full   "
                        >
                            <img
                                @error="errorImage"
                                class="w-full  max-h-[340px]"
                                :src="`${image}`"
                            />
                        </div>
                    </template>
                </template>
                <template v-else>
                    <div class="carousel-item w-full">
                        <img
                            class=" w-full border rounded-2xl bg-info max-h-[340px]"
                            :src="vehicleNoImage"
                        />
                    </div>
                </template>
            </div>
            <div
                class="flex flex-wrap w-full justify-center gap-2 py-2"
                v-if="imagesToSend.length > 0"
            >
                <a
                    class="btn btn-xs"
                    :href="`#item${i}${indicator}`"
                    v-for="(image, i) in imagesToSend"
                    >{{ i + 1 }}</a
                >
            </div>
            <div class="flex w-full justify-center gap-2 py-2" v-else>
                <a class="btn btn-xs">No Images</a>
            </div>
        </div>

        <div class="w-full ">
            <!-- component -->
            <div class="w-full h-full p-2 ">
                <div
                    class="mt-2  h-[60px] relative  rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center"
                >
                    <div class="absolute">
                        <div class="flex flex-col  items-center">
                            <i
                                class="fa fa-folder-open fa-4x text-blue-700"
                            ></i>
                            <font-awesome-icon icon="fa-solid fa-folder-open" />
                            <span class="block text-gray-400 font-normal"
                                >Agregar Archivos</span
                            >
                        </div>
                    </div>

                    <input
                        type="file"
                        class="h-full w-full  opacity-0"
                        multiple
                        @change="onFileInputChange"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
