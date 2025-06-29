<script setup lang="js">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useUserInfo } from '../Composables/common-composable';

const props = defineProps({
    label:'',
    link:'',
    to:'',
    useButton: true,

    asIndex: false,
    asCreate : false,
    asShow: false,
    asEdit : false,
    detailsTitle: String,
    aliasTitle: String

})

const title = ref()

if(props.asIndex)
    title.value = `Listado de ${props.label}`
else if(props.asCreate)
    title.value = `Crear Nuevo ${props.label}`
else if(props.asShow)
    title.value = `Detalles del ${props.label}`
else if(props.asEdit)
    title.value = `Editar ${props.label}`

const {isAdmin} = useUserInfo()
</script>

<template>
    <div
        class="flex flex-row card-title text-info text-3xl md:text-4xl  mb-1"
    >
        <div class="flex-none">
            {{ title }}
        </div>

        <div class="flex flex-1 justify-end">
            <span v-if="useButton && isAdmin" class="flex flex-col ">
                <Link
                    :href="`/${link}/${to}`"
                    class="btn btn-sm btn-circle btn-info text-white"
                >
                    <font-awesome-icon icon="fa-solid fa-plus-circle" />
                </Link>
            </span>
        </div>
    </div>
    <hr/>
    <template v-if="detailsTitle && aliasTitle">
        <div class="flex flex-col  py-2">
            <div class="card-title text-neutral text-xl">
                {{ detailsTitle }}
            </div>
            <div class="card-title font-normal text-lg">
                {{ aliasTitle }}
            </div>
        </div>
        <hr/>
    </template>
</template>
