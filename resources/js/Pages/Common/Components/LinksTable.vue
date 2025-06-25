<script lang="ts" setup>
import { Link, router } from "@inertiajs/vue3";
import { useVehiclesStore } from "../../Vehiculo/store/vehiculos.store";
import { useUserInfo } from "../Composables/common-composable";


const props = defineProps({
    item: Object,
    to: String,
});

const { isAdmin } = useUserInfo();
const vs = useVehiclesStore()


const emit = defineEmits(['emitDelete'])

const sendDelete = () => {
    emit('emitDelete', true)
        router.delete(`/${props.to}/${props.item.id}`,{
            onBefore: (visit) =>{
                vs.setDeleted(true)
            },

            // onStart: (visit) =>{
            //     console.log('st', visit)
            //     emit('emitShow', true)
            // },
            // onSuccess: (page) =>{
            //     console.log('sc', page)
            //     emit('emitShow', false)
            // },
            onError:(errors) =>{
                vs.setDeleted(false)
            },
            onFinish: (visit) =>{
                vs.setDeleted(false)
            }
        })
    }
</script>



<template>
    <div class="flex flex-row gap-1 justify-center">
        <slot></slot>
        <div class="sm:tooltip" data-tip="Ver">
            <Link class="btn btn-info btn-xs" :href="`/${to}/${props?.item?.id}`">
            <font-awesome-icon icon="fa-solid fa-eye"></font-awesome-icon>
            </Link>
        </div>

        <div class="sm:tooltip" data-tip="Editar" v-if="isAdmin">
            <Link class="btn btn-warning btn-xs" :href="`/${to}/${props?.item?.id}/edit`">
            <font-awesome-icon icon="fa-solid fa-pencil"></font-awesome-icon>
            </Link>
        </div>

        <div class="sm:tooltip" data-tip="Eliminar" v-if="isAdmin">
            <button class="btn btn-error btn-xs" @click="sendDelete">
                <font-awesome-icon icon="fa-solid fa-trash"></font-awesome-icon>
            </button>
        </div>
    </div>
</template>
