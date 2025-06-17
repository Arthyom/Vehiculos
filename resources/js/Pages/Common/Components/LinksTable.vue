<template>
    <div class="flex flex-row gap-1 justify-center">
        <div class="sm:tooltip" data-tip="Ver">
            <Link
                class="btn btn-info btn-xs"
                :href="`/${to}/${props?.item?.id}`"
            >
                <font-awesome-icon icon="fa-solid fa-eye"></font-awesome-icon>
            </Link>
        </div>

        <div class="sm:tooltip" data-tip="Editar" v-if="isAdmin">
            <Link
                class="btn btn-warning btn-xs"
                :href="`/${to}/${props?.item?.id}/edit`"
            >
                <font-awesome-icon
                    icon="fa-solid fa-pencil"
                ></font-awesome-icon>
            </Link>
        </div>

        <div class="sm:tooltip" data-tip="Eliminar" v-if="isAdmin">
            <button
                class="btn btn-error btn-xs"
                @click="sendDelete"
            >
                <font-awesome-icon icon="fa-solid fa-trash"></font-awesome-icon>
            </button>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { Link, router } from "@inertiajs/vue3";
import { useUserInfo } from "../Composables/common-composable";
import { ref, watch, watchEffect } from "vue";

const props = defineProps({
    item: Object,
    to: String,
});

const { isAdmin } = useUserInfo();


const emit = defineEmits(['emitDelete' ])

const sendDelete = () =>{
    emit('emitDelete', true)
//     router.delete(`/${props.to}/${props.item.id}`,{
//         onBefore: (visit) =>{
//             console.log('bf', visit);
//             emit('emitDelete',true);
//         },

//         // onStart: (visit) =>{
//         //     console.log('st', visit)
//         //     emit('emitShow', true)
//         // },
//         // onSuccess: (page) =>{
//         //     console.log('sc', page)
//         //     emit('emitShow', false)
//         // },
//         onError:(errors) =>{
//             console.log('errs', errors);
//             emit('emitDelete', false);
//         },
//         onFinish: (visit) =>{
//             console.log('fd', visit);
//             emit('emitDelete', false);
//         }
//     })
// }
}


</script>
