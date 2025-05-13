<script lang="js" setup>
import { Link } from '@inertiajs/vue3';
import NavMenue from './NavMenue.vue';
</script>

<template>
    <NavMenue></NavMenue>

    <main class="w-full">

        <div class=" m-15">

            <div class="">
                <slot></slot>
            </div>
        </div>
    </main>



    <footer>
        this is a change to test the deployment feature
    </footer>
</template>
