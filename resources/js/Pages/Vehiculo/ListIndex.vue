<script lang="js" setup>
import { Link, router } from '@inertiajs/vue3';
import DefaultLayout from '../Common/Layouts/DefaultLayout.vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import IndexTitle from '../Common/Components/IndexTitle.vue'

import LinksTable from '../Common/Components/LinksTable.vue';
import { useDefaultCommon, useUserInfo } from '../Common/Composables/common-composable';
import TableWrapper from '../Common/Components/TableWrapper.vue';
import TableViewer from '../Common/Components/TableViewer.vue';

const { vehicleNoImage } = useDefaultCommon()

defineProps({ allVehicles: Object, sessionState: Object , paginator: Object})
const { isAdmin } = useUserInfo()

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
        <TableViewer :items="paginator.data">

            <TableWrapper :paginator="paginator">
                <thead class="bg-black font-bold text-white justify-center">
                    <tr class="text-center">
                        <th>#</th>
                        <th class="hover:bg-info hover:cursor-pointer hover:underline">Vehiculo
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </th>
                        <th v-if="isAdmin" class="hover:bg-info hover:cursor-pointer hover:underline">Placa
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </th>
                        <th class="hover:bg-info hover:cursor-pointer hover:underline">Kilometrake
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="justify-center">
                    <tr v-for="(vehicle, i) in paginator.data" class="text-center">
                        <td>
                            {{ i + 1 }}
                        </td>
                        <td>
                                <div
                                    class="flex flex-col xl:flex-row w-full items-center gap-2 "
                                >
                                    <div class="avatar ">
                                        <div
                                            class="mask mask-squircle h-25 w-25"
                                        >
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
                                                                .Name ||
                                                            noImageUrl
                                                        "
                                                        alt="Avatar Tailwind CSS Component"
                                                    />
                                                </template>
                                            </template>
                                        </div>
                                    </div>

                                    <div
                                        class="flex flex-col items-center xl:items-start w-full"
                                    >
                                        <div class="font-bold">
                                            {{ vehicle.Marca }}
                                            {{ vehicle.Modelo }}
                                            {{ vehicle.Anio }}
                                        </div>
                                        <div class="text-sm opacity-50">
                                            {{ vehicle.Alias }}
                                        </div>
                                    </div>
                                </div>
                        </td>
                        <td v-if="isAdmin">
                            {{ vehicle.Placa }}
                        </td>

                        <td>{{ vueNumberFormat(vehicle.Kilometraje) }} KM</td>

                        <th>
                            <LinksTable to="vehiculos" :item="vehicle">
                                <div class="sm:tooltip" data-tip="Servicios">
                                    <Link
                                        class="btn btn-primary btn-xs"
                                        :href="`/servicios/vehiculo/${vehicle.id}`"
                                    >
                                        <font-awesome-icon
                                            icon="fa-solid fa-tools"
                                        ></font-awesome-icon>
                                    </Link>
                                </div>
                            </LinksTable>
                        </th>
                    </tr>
                </tbody>
            </TableWrapper>
        </TableViewer>
    </DefaultLayout>
</template>
