<script setup lang="js">
import { ref } from 'vue';
import CustomTemplateForm from '../Common/Components/CustomTemplateForm.vue';
import * as yup from 'yup';
import { useForm } from 'vee-validate';
import DefaultLayout from '../Common/Layouts/DefaultLayout.vue';
import { useUserInfo } from '../Common/Composables/common-composable';
import { UseVehiclesConf } from '../Common/Composables/config-fields-composable';

const props = defineProps({proveedor: Object, asCreate: true, asShow: false})

const validationSchema = yup.object({
    Alias: yup.string().required().min(5),
    Nombre: yup.string().required().min(5),
    Descripcion: yup.string().required().min(10),
    Direccion: yup.string().required().min(10)
})
const state  = (state) => ({error: state.errors[0], label: state.path})

const {defineField, meta, values}  = useForm({
    validationSchema,
    initialValues: props.proveedor
})

const {isAdmin} = useUserInfo()

const {conf} = UseVehiclesConf()

const [alias, aliasAttr] = defineField('Alias' , {props: (state)=>conf(state)})
const [nombre, nombreAttr] = defineField('Nombre', {props: (state)=>conf(state)})
const [descripcion, descripcionAttr ] = defineField('Descripcion', {props: (state)=>conf(state, 'text-area')})
const [direccion, direccionAttr] = defineField('Direccion', {props: (state)=>conf(state, 'text-area')})

const images = props.proveedor.imagenes || []
const imagesToSend = ref([... images.map(i => i.Name)])
const filesToSend = ref([])

const fields = [
    [alias, aliasAttr],
    [nombre,nombreAttr],
    [descripcion, descripcionAttr],
    [direccion, direccionAttr]
]

</script>


<template>
    <DefaultLayout>
        <CustomTemplateForm
            :asCreate = "asCreate"
            :asShow = "asShow"
            label="Proveedor"
            link="proveedores"
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


