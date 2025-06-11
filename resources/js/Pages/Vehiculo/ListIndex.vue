<script lang="js" setup>
import { Link } from '@inertiajs/vue3';
import DefaultLayout from '../Common/Layouts/DefaultLayout.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import IndexTitle  from '../Common/Components/IndexTitle.vue'
import LinksTable from '../Common/Components/LinksTable.vue';
import { useDefaultCommon, useUserInfo } from '../Common/Composables/common-composable';
import TableWrapper from '../Common/Components/TableWrapper.vue';

const {vehicleNoImage} = useDefaultCommon()
defineProps({allVehicles:Object , sessionState: Object})
const {isAdmin} = useUserInfo()
</script>

<template>
    <DefaultLayout>
        <IndexTitle
            to="create"
            label="Vehiculos"
            link="vehiculos"
            :asIndex="true"
            :useButton="true"
        ></IndexTitle>

        <TableWrapper>
            <thead class="bg-black font-bold text-white justify-center">
                <tr class="text-center">
                    <th>#</th>
                    <th>Vehiculo</th>
                    <th v-if="isAdmin">Placa</th>
                    <th>Kilometrake</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="justify-center">
                <tr v-for="(vehicle, i) in allVehicles" class="text-center">
                    <td>
                        {{ i + 1 }}
                    </td>
                    <td>
                        <div class="flex">
                            <div class="flex grow   items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle h-25 w-25">
                                        <template v-if="!!vehicle.imagenes">
                                            <template
                                                v-if="!vehicle.imagenes[0]"
                                            >
                                                <img
                                                    :src="vehicleNoImage"
                                                    alt="Avatar Tailwind CSS Component"
                                                />
                                            </template>
                                            <template v-else>
                                                <img
                                                    @error="
                                                        (e) =>
                                                            (e.target.src =
                                                                vehicleNoImage)
                                                    "
                                                    :src="
                                                        vehicle.imagenes[0]
                                                            .Name || noImageUrl
                                                    "
                                                    alt="Avatar Tailwind CSS Component"
                                                />
                                            </template>
                                        </template>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-center  w-full">
                                    <div class="  font-bold">
                                        {{ vehicle.Marca }}
                                        {{ vehicle.Modelo }}
                                        {{ vehicle.Anio }}
                                    </div>
                                    <div class="text-sm opacity-50">
                                        {{ vehicle.Alias }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td v-if="isAdmin">
                        {{ vehicle.Placa }}
                    </td>

                    <td>{{ vueNumberFormat(vehicle.Kilometraje) }} KM</td>

                    <th>
                        <LinksTable to="vehiculos" :item="vehicle"></LinksTable>
                    </th>
                </tr>
            </tbody>
        </TableWrapper>
    </DefaultLayout>
</template>
