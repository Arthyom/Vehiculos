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
        <h1>this is an example <span>with auto deploy</span> </h1>
    </footer>
</template>
