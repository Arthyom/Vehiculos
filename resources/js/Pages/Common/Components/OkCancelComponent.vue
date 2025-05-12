
<script lang="js" setup>
const props = defineProps({ resource: '',  asShow: false, isValid: true})
const emiter = defineEmits('sendForm')
import { Link, router } from '@inertiajs/vue3';

</script>

<template>
     <div class="grid grid-cols-2 gap-3 pt-3">
            <div>
                <button
                    @click="emiter('sendForm')"
                    class="btn btn-info btn-block text-white"
                    :disabled="!isValid || asShow"
                >
                    Guardar
                </button>
            </div>

            <div>
                <Link
                    :href="`/${props.resource}/`"
                    class="btn btn-error btn-block text-white"
                >
                    Cancelar
                </Link>
            </div>
        </div>
</template>
