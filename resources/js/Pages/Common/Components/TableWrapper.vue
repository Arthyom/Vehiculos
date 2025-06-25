<script lang="js" setup>
import { useGeneralStore } from '../Store/general.store';
import CustomLoader from './CustomLoader.vue';
import PaginatorComponent from './PaginatorComponent.vue';

const props = defineProps({paginator: Object})
const gs = useGeneralStore();

</script>

<template>

    <CustomLoader :showDialog="gs.showLoader"></CustomLoader>

    <template v-if="!!paginator">
        <PaginatorComponent :paginator="paginator"></PaginatorComponent>
    </template>

    <div
        class="overflow-x-auto rounded-box border border-base-content/2 shadow-sm"
    >
        <table class="table table-auto 2xl:table-fixed table-zebra bg-white">
            <slot></slot>
        </table>
    </div>


</template>
