<template>
    <DefaultLayout>
        <CustomTemplateForm
            :asCreate="asCreate"
            :asShow="asShow"
            label="Servicio"
            link="servicios"
            :validationSchema="validationSchema"
            :images="images"
            :imagesToSend="imagesToSend"
            :filesToSend="filesToSend"
            :fields="fields"
            :meta="meta"
            :initialValues="values"
            :formCols="2"
        >
        </CustomTemplateForm>
    </DefaultLayout>

</template>

<script lang="js" setup>
import { ref, useTemplateRef } from 'vue';
import CustomTemplateForm from '../Common/Components/CustomTemplateForm.vue';
import DefaultLayout from '../Common/Layouts/DefaultLayout.vue';
import * as yup from 'yup';
import { useForm } from 'vee-validate';
import { UseVehiclesConf } from '../Common/Composables/config-fields-composable';
import { object } from 'yup';
import { useHttp } from '../Common/Store/http.action';

const props = defineProps({servicio: Object, tipoServicio:Object, vehicles: Object, providers: Object, asCreate: true, asShow: false})


const validationSchema = yup.object({

    Created_At: yup.date().required(),
    Vehiculo_Id: yup.number().required(),
    Proveedor_Id: yup.number().required(),
    Kilometraje: yup.number().required(),
    Descripcion: yup.string().min(10).max(20).required(),
    Total: yup.number().required(),
    Pagado: yup.boolean(),
    Subsidiado: yup.boolean(),
    Detalles: yup.string(),
    TipoServicio_Id: yup.number().required()
})

const {conf} = UseVehiclesConf()
const uh = useHttp()


const customFunction = async(e) =>{
    uh.setResource('vehiculos')
    const vehicle = await uh.getById(e.target.value)
    Kilometraje.value = vehicle.Kilometraje
}

const {values,  defineField, meta } =useForm({
    validationSchema,
    initialValues: props.servicio
})

const [Created_At,  Created_AtAttr] = defineField('Created_At',  {props: (state) => conf(state, 'date', 'Fecha')})


const [Vehiculo_Id, Vehiculo_IdAttr] = defineField('Vehiculo_Id', {props: (state) => conf(state,  'select', 'Vehiculo', props.vehicles, true, true, customFunction)})
const [Proveedor_Id,  Proveedor_IdAttr] = defineField('Proveedor_Id', {props: (state) => conf(state,  'select', 'Proveedor', props.providers)})
const [Kilometraje, KilometrajeAttr] = defineField('Kilometraje', {props: (state) => conf(state, 'number',null, [], true,true,null)})
const [Descripcion, DescripcionAttr] = defineField('Descripcion', {props: (state => conf(state))})
const [Total, TotalAttr] = defineField('Total', {props: (state) => conf( state, 'number')})
const [Pagado, PagadoAttr] = defineField('Pagado', {props: (state) => conf( state, 'checkbox',null,[],false)})
const [Subsidiado, SubsidiadoAttr] = defineField('Subsidiado', {props: (state) => conf(state, 'checkbox',null,[],false)})
const [Detalles, DetallesAttr] = defineField('Detalles', {props: (state => conf(state,'text-area',null,[],false))})
const [TipoServicio_Id, TipoServicio_IdAttr] = defineField('TipoServicio_Id', {props: (state) => conf(state,  'select', 'Tipo Servicio', props.tipoServicio)})



const fields = [
[Created_At,  Created_AtAttr],
[Vehiculo_Id, Vehiculo_IdAttr],
[Proveedor_Id,  Proveedor_IdAttr],
[TipoServicio_Id, TipoServicio_IdAttr],
[Kilometraje, KilometrajeAttr],
[Descripcion, DescripcionAttr],
[Total, TotalAttr],
[Detalles, DetallesAttr],
[Pagado, PagadoAttr],
[Subsidiado, SubsidiadoAttr],
]


const images = props.servicio?.nota ? [props.servicio?.nota] : []
const imagesToSend = ref([... (images?.map(i => i?.Name) || []) ])
const filesToSend = ref([])
</script>
