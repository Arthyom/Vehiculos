<script lang="js" setup>
import { Link } from '@inertiajs/vue3';
import DefaultLayout from '../Common/Layouts/DefaultLayout.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import IndexTitle  from '../Common/Components/IndexTitle.vue'
import LinksTable from '../Common/Components/LinksTable.vue';
import { useDefaultCommon } from '../Common/Composables/common-composable';
import TableWrapper from '../Common/Components/TableWrapper.vue';

const {vehicleNoImage} = useDefaultCommon()
defineProps({allVehicles:Object , sessionState: Object})
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
                    <th>Placa</th>
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
                        <div class="items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle h-25 w-25">
                                    <template v-if="!!vehicle.imagenes">
                                        <template v-if="!vehicle.imagenes[0]">
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
                                                    vehicle.imagenes[0].Name ||
                                                    noImageUrl
                                                "
                                                alt="Avatar Tailwind CSS Component"
                                            />
                                        </template>
                                    </template>
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">
                                    {{ vehicle.Marca }}
                                    {{ vehicle.Modelo }} {{ vehicle.Anio }}
                                </div>
                                <div class="text-sm opacity-50">
                                    {{ vehicle.Alias }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-ghost badge-md">{{
                            vehicle.Placa
                        }}</span>
                    </td>

                    <td>
                        <span class="badge badge-ghost badge-md"
                            >{{ vehicle.Kilometraje }} km</span
                        >
                    </td>

                    <th>
                        <LinksTable to="vehiculos" :item="vehicle"></LinksTable>
                    </th>
                </tr>
            </tbody>
        </TableWrapper>
    </DefaultLayout>
</template>
