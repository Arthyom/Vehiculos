<script lang="js" setup>

const props = defineProps({ resource: '',  asShow: false})

</script>

<template>
   <div class="grid grid-cols-2 border rounded-2xl">
            <div class="w-full h-[550px] rounded-xl">
                <slot name="formFields"></slot>
            </div>

            <div class="w-full h-full  rounded-xl">
                <slot name="formImages" ></slot>
            </div>
        </div>
</template>
