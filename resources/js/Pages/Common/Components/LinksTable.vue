<template>

<div class="sm:tooltip" data-tip="Ver">

<Link
    class="btn btn-info btn-xs"
    :href="`/${to}/${props?.item?.id}`"
>
    <font-awesome-icon
        icon="fa-solid fa-eye"
    ></font-awesome-icon>
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
    <Link
        class="btn btn-error btn-xs"
        :href="`/${to}/${props?.item?.id}/edit`"
    >
        <font-awesome-icon
            icon="fa-solid fa-trash"
        ></font-awesome-icon>
    </Link>
</div>

</template>


<script lang="ts" setup>
import { Link } from '@inertiajs/vue3';
import { useUserInfo } from '../Composables/common-composable';


const props = defineProps({
    item: Object,
    to: String
})

const {isAdmin} = useUserInfo()
</script>
