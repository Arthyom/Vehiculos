<script lang="js" setup>
import { object } from 'yup';

const props = defineProps({
    fields:     [{
        hasError:false,
        error: Object,
        titleValue: '',
        typeInput:'text',
        vModelValue:Object,
        vBindValue:object
    }]
})
</script>

<template>
    <div class="w-full h-[550px] rounded-xl">
        <fieldset class="fieldset rounded-box w-full p-4">
            <div class="grid grid-cols-2 gap-2 pt-25 text-lg">
                <template v-if="!!fields" >
                    <div v-for="field in props.fields">
                        <label class="label font-bold">{{ field.titleValue }}</label>
                        <input
                            :type="field.typeInput"
                            v-model="field.vModelValue"
                            v-bind="field.vBindValue"
                            class="input"
                        />
                        <span v-if="field.error" class="text-error text-sm">{{
                            field.error
                        }}</span>
                    </div>
                </template>
                <template v-else>
                    <span>No fields sent</span>
                </template>

            </div>
        </fieldset>
    </div>
</template>


<!-- <template>
    <div class="w-full h-[550px] rounded-xl">
        <fieldset class="fieldset rounded-box w-full p-4">
            <div class="grid grid-cols-2 gap-2 pt-25 text-lg">
                <div>
                    <label class="label font-bold">Marca</label>
                    <input
                        type="text"
                        v-model="marca"
                        v-bind="marcaAttr"
                        class="input"
                    />
                    <span v-if="errors.Marca" class="text-error text-sm">{{
                        errors.Marca
                    }}</span>
                </div>

                <div>
                    <label class="label font-bold">Modelo</label>
                    <input
                        type="text"
                        class="input"
                        v-model="modelo"
                        v-bind="modeloAttr"
                    />
                    <span v-if="errors.Modelo" class="text-error text-sm">{{
                        errors.Modelo
                    }}</span>
                </div>

                <div>
                    <label class="label font-bold">Año</label>
                    <input
                        type="number"
                        class="input"
                        placeholder="Name"
                        v-model="anio"
                        v-bind="anioAttr"
                    />
                    <span v-if="errors.Anio" class="text-error text-sm">{{
                        errors.Anio
                    }}</span>
                </div>

                <div>
                    <label class="label font-bold">Placa</label>
                    <input
                        type="text"
                        class="input"
                        v-model="placa"
                        v-bind="placaAttr"
                    />
                    <span v-if="errors.Placa" class="text-error text-sm">{{
                        errors.Placa
                    }}</span>
                </div>

                <div>
                    <label class="label font-bold">Alias</label>
                    <input
                        type="text"
                        class="input"
                        v-bind="aliasAttr"
                        v-model="alias"
                    />
                    <span v-if="errors.Alias" class="text-error text-sm">{{
                        errors.Alias
                    }}</span>
                </div>

                <div>
                    <label class="label font-bold">Kilometraje</label>
                    <input
                        type="number"
                        class="input"
                        v-bind="kilometrajeAttr"
                        v-model="kilometraje"
                    />
                    <span
                        v-if="errors.Kilometraje"
                        class="text-error text-sm"
                        >{{ errors.Kilometraje }}</span
                    >
                </div>

                <div>
                    <label class="label font-bold">Tipo de Llanta</label>
                    <input
                        type="text"
                        class="input"
                        v-model="tipo"
                        v-bind="tipoAttr"
                    />
                    <span
                        v-if="errors.TipoNeumatico"
                        class="text-error text-sm"
                        >{{ errors.TipoNeumatico }}</span
                    >
                </div>

                <div>
                    <label class="label font-bold">Precion de Llanta</label>
                    <input
                        type="number"
                        class="input"
                        v-model="precion"
                        v-bind="precionAttr"
                    />
                    <span
                        v-if="errors.PrecionNeumatico"
                        class="text-error text-sm"
                        >{{ errors.PrecionNeumatico }}</span
                    >
                </div>
            </div>
        </fieldset>
    </div>
</template> -->
