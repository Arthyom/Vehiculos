<script lang="js" setup>
import { Link } from '@inertiajs/vue3';
import NavMenue from './NavMenue.vue';
</script>

<template>
    <NavMenue></NavMenue>

    <main class="w-full">

        <div class=" mx-4 my-12">

            <div class="">
                <slot></slot>
            </div>
        </div>
    </main>



    <footer>

    </footer>
</template>
