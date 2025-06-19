<script lang="js" setup>


const props = defineProps({
    error:String,
    typeInput:'text',
    modelValue: String,
    label: String,
    isRequired: Boolean,
    isVisible: Boolean,
    additionalData: Array
})

const emit = defineEmits(['update:modelValue', 'blur']);

const changeCheckValue = (value) =>{
    const valor = value.srcElement.value
    if(valor == "0" || valor == 0)
        return emit('update:modelValue', "1")

        return emit('update:modelValue',"0")
}

const formatData = (val) =>{

    console.log('ssssss ', props.typeInput)
    if(props.typeInput == 'date'){

        const formatedDate =    new Date(val).toLocaleDateString('en-CA')
        console.log('forma date', formatedDate)
        return formatedDate
    }

    return val
}
</script>

<template>
    <div class="flex flex-col" v-if="typeInput === 'checkbox'">
        <template v-if="isVisible">
            <label class="ml-1 label font-bold block w-full"
                >{{ label }}
                <span class="text-error" v-if="isRequired">*</span>
            </label>
            <input
                :checked="Boolean(modelValue)"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                @blur="$emit('blur')"
                @change="changeCheckValue"
                :type="typeInput"
                class="radio radio-primary"
            />
            <span v-if="error" class="ml-1 text-error text-sm mt-1">{{
                error
            }}</span>
        </template>
    </div>

    <div class="flex flex-col" v-else-if="typeInput === 'select'">
        <template v-if="isVisible">
            <label class="ml-1 label font-bold block w-full"
                >{{ label }}
                <span class="text-error" v-if="isRequired">*</span>
            </label>
            <select
                class="select w-full"
                @input="$emit('update:modelValue', $event.target.value)"
                @blur="$emit('blur')"
                :value="modelValue"
            >
                <option selected>Seleccione uno</option>
                <option v-for="item in additionalData" :value="item.Id">
                        {{ item.label }}
                </option>
            </select>
            <span
                class="ml-1 label text-sm text-light text-error mt-1"
                v-if="error"
                >{{ error }}</span
            >
        </template>
    </div>


    <div class="flex flex-col  col-span-1 md:col-span-2 " v-else-if="typeInput === 'text-area'">
        <div v-if="isVisible">
            <label class="ml-1 label font-bold block w-full"
                >{{ label }}
                <span class="text-error" v-if="isRequired">*</span>
            </label>
            <textarea
                cols="4"
                rows="50"
                :value="formatData(modelValue)"
                @input="$emit('update:modelValue', $event.target.value)"
                @blur="$emit('blur')"
                :type="typeInput"
                class="input w-full border-info rounded-md h-18 "
            >
            </textarea>
            <span v-if="error" class="ml-1 text-error text-sm mt-1">{{
                error
            }}</span>
        </div>
    </div>

    <div class="flex flex-col" v-else>
        <template v-if="isVisible">
            <label class="ml-1 label font-bold block w-full"
                >{{ label }}
                <span class="text-error" v-if="isRequired">*</span>
            </label>
            <input
                :value="formatData(modelValue)"
                @input="$emit('update:modelValue', $event.target.value)"
                @blur="$emit('blur')"
                :type="typeInput"
                class="input w-full border-info rounded-md"
            />
            <span v-if="error" class="ml-1 text-error text-sm mt-1">{{
                error
            }}</span>
        </template>
    </div>


</template>
