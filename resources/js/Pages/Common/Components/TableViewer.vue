<script lang="js" setup>

defineProps({items: Array})

</script>


<template>
<template v-if="items.length > 0">
    <slot></slot>
</template>

<template v-else>
    <p class="text-center mt-20">No Items</p>
</template>
</template>
