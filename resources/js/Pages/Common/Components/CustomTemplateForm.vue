<script lang="js" setup>
import { useForm } from 'vee-validate';
import DefaultLayout from '../Layouts/DefaultLayout.vue';
import IndexTitle from './IndexTitle.vue';
import OkCancelComponent from './OkCancelComponent.vue';
import ImageCarroucelComponent from './ImageCarroucelComponent.vue';
import CustomInputComponent from './CustomInputComponent.vue';
import { Link, router } from '@inertiajs/vue3';
import CustomLoader from './CustomLoader.vue';
import { ref } from 'vue';


const props = defineProps(
    {
        formCols: Number,
        asCreate: true,
        asShow: false,
        link:String,
        label:String,

        initialValues: Object,
        validationSchema: Object,

        images: Array,
        imagesToSend: Array,
        filesToSend: Array,

        fields: Array,
        meta:Object,


    }
)

const {handleSubmit} = useForm( {
    initialValues: props.initialValues
} )

const captureImages = (images,files)=>{

    props.imagesToSend.value = images
    props.filesToSend.value = files
}

const showDialog = ref(false)

const handleSubForm =  () =>{
showDialog.value = true
const valsToSend = Object.assign({_method: props.asCreate ? 'post':'patch'}, props.initialValues)
valsToSend.Imagen = props.filesToSend.value

console.log('iagenes a enviar', valsToSend);

if(props.asCreate){

    router.post( `/${props.link}`,  valsToSend , {
        forceFormData: true,
        onSuccess: () => showDialog.value  = false,
        onError: () => {showDialog.value = false; alert('Error')}
    })
}
else
    router.post(`/${props.link}/${props.initialValues.id}`,
            valsToSend,
            {
                forceFormData: true,
                onSuccess: () => showDialog.value  = false,
                onError: () => {showDialog.value = false; alert('Error')}
            }
        )

}
</script>

<template>

        <CustomLoader :showDialog="showDialog"></CustomLoader>

        <IndexTitle
            :useButton="false"
            :label="label"
            :link="link"
            :asShow="asShow"
            :asEdit="!asCreate"
            :asCreate="asCreate"
            :asIndex="false"
        ></IndexTitle>


        <div class="grid grid-cols-2 border rounded-2xl">
            <div class="w-full h-[550px] rounded-xl">
                <fieldset class="fieldset rounded-box w-full p-4">
                    <div
                        :class="[
                            'text-lg',
                            'pt-25',
                            'gap-2',
                            'grid',
                            `grid-cols-${props.formCols}`,
                        ]"
                    >
                        <CustomInputComponent
                            v-for="field in fields"
                            v-model="field[0].value"
                            v-bind="field[1].value"
                        />
                    </div>
                </fieldset>
            </div>

            <div class="rounded-xl">
                <ImageCarroucelComponent
                    @emitImages="captureImages"
                    :images="images"
                    :imagesToSend="imagesToSend"
                    :filesToSend="filesToSend"
                ></ImageCarroucelComponent>
            </div>
        </div>

        <OkCancelComponent
            @sendForm="handleSubForm"
            :isValid="meta.valid"
            :resource="link"
            :asShow="props.asShow"
        ></OkCancelComponent>
</template>
