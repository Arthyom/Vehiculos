<script setup lang="js">

import { Link, router } from "@inertiajs/vue3";
import { useGeneralStore } from "../Store/general.store";
import { ref } from "vue";


const props = defineProps({
    paginator:Object
})

const gs = useGeneralStore()


const goTo = (index) =>{
    const paginatorPP = props.paginator.per_page
    const goToPageUrl = `${props.paginator.path}?page=${index}&per_page=${paginatorPP}`;
    runServOp(goToPageUrl)
}

const changePerPage = (event) =>{
    const pp = event.target.value
    const currentPage = props.paginator.current_page
    const goToPageUrl = `${props.paginator.path}?page=${currentPage}&per_page=${pp}`;
    runServOp(goToPageUrl)
}


const runServOp = (goToPageUrl) =>{
    router.get(goToPageUrl, {},{
        onBefore: () =>{
            gs.setLoadingState(true);
        },

        onError: () =>{
            gs.setLoadingState(false);
        },

        onFinish: () =>{
            gs.setLoadingState(false);
        }
    })
}
</script>

<template>
    <div class="flex  ">
        <div class="flex join mb-4 gap-2 ">
            <template
                v-for="(item, i) in Array.from({ length: paginator.last_page })"
            >
                <button
                    @click="goTo(i + 1)"
                    class="join-item btn"
                    :class="{ 'btn-info': i === paginator.current_page - 1 }"
                >
                    {{ i + 1 }}
                </button>
            </template>
        </div>

        <div class="flex flex-1 justify-end ">
            <select @change="changePerPage" class=" select select-info ">
                <option disabled selected>Por pagina</option>
                <option :selected="props.paginator.per_page == 2" value="2">2</option>
                <option :selected="props.paginator.per_page == 3" value="3">3</option>
                <option :selected="props.paginator.per_page == 5" value="5">5</option>
                <option :selected="props.paginator.per_page == 6" value="6">6</option>
            </select>
        </div>
    </div>
</template>
