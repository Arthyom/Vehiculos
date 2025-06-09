<script lang="js" setup>
import { useForm } from 'vee-validate';
import DefaultLayout from '../Common/Layouts/DefaultLayout.vue';
import { Link, router, useForm as inertiaForm } from '@inertiajs/vue3';

import * as yup from 'yup'
import { reactive, ref } from 'vue';
import IndexTitle from '../Common/Components/IndexTitle.vue';
import { noImageUrl } from '../Common/Constants/Constants';
import FormLayOut from '../Common/Components/FormLayOut.vue';
import OkCancelComponent from '../Common/Components/OkCancelComponent.vue';
import ImageCarroucelComponent from '../Common/Components/ImageCarroucelComponent.vue';
import FormFiedlsComponent from '../Common/Components/FormFiedlsComponent.vue';
import CustomInputComponent from '../Common/Components/CustomInputComponent.vue';
import CustomTemplateForm from '../Common/Components/CustomTemplateForm.vue';


const props = defineProps({vehiculo: Object, asCreate: true, asShow: false})


const validationSchema = yup.object({
    Marca : yup.string().required().min(3),
    Modelo: yup.string().required().min(2),
    Anio: yup.number().required().integer().min(1950),
    Placa: yup.string().required().min(5),
    Alias: yup.string().required().min(8),
    Kilometraje: yup.number().integer().required().min(0),
    TipoNeumatico: yup.string().required().min(3),
    PrecionNeumatico: yup.number().required().min(1)
})

const {values,  defineField, meta } =useForm({
    validationSchema,
    initialValues: props.vehiculo
})


const state  = (state) => ({error: state.errors[0], label: state.path})


const [marca,marcaAttr] = defineField('Marca', {props: state})
const [modelo, modeloAttr] =defineField('Modelo', {props: state})
const [anio, anioAttr] =defineField('Anio',{props: state})
const [placa, placaAttr] =defineField('Placa',{props: state})
const [alias, aliasAttr] =defineField('Alias',{props: state})
const [kilometraje, kilometrajeAttr] =defineField('Kilometraje',{props: state})
const [tipo, tipoAttr] =defineField('TipoNeumatico',{props: state})
const [precion, precionAttr] =defineField('PrecionNeumatico',{props: state})

anioAttr.value.typeInput = 'number'
kilometrajeAttr.value.typeInput = 'number'
precionAttr.value.typeInput = 'number'

const fields = [
[marca,marcaAttr],
[modelo, modeloAttr],
[anio, anioAttr],
[placa, placaAttr],
[alias, aliasAttr],
[kilometraje, kilometrajeAttr],
[tipo, tipoAttr],
[precion, precionAttr]
]

const images = props.vehiculo.imagenes || []
const imagesToSend = ref([... images.map(i => i.Name)])
const filesToSend = ref([])


</script>

<template>

    <DefaultLayout>
        <CustomTemplateForm
            :asCreate = "asCreate"
            :asShow = "asShow"
            label="Vehiculo"
            link="vehiculos"
            :validationSchema = "validationSchema"
            :images="images"
            :imagesToSend = "imagesToSend"
            :filesToSend="filesToSend"
            :fields = "fields"
            :meta="meta"
            :initialValues="values"
            :formCols="2"
        >

        </CustomTemplateForm>
    </DefaultLayout>

</template>
