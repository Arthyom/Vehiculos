<script setup lang="ts">
import DefaultLayout from "../Common/Layouts/DefaultLayout.vue";
import IndexTitle from "../Common/Components/IndexTitle.vue";
import LinksTable from "../Common/Components/LinksTable.vue";
import { provide } from "vue";
import { useDefaultCommon } from "../Common/Composables/common-composable";
import TableWrapper from "../Common/Components/TableWrapper.vue";
import { usePage } from "@inertiajs/vue3";
import PaginatorComponent from "../Common/Components/PaginatorComponent.vue";
import { VehiculosTiposServicio } from "../Constants/Constants";

defineProps({ allServices: Array });

const { serviceNoImage, vehicleNoImage } = useDefaultCommon();

const paginator = usePage().props.paginator;

const tipoServicioColor = (tipoServicio) =>{

    let color = 'badge-'
    switch (tipoServicio.Codigo) {
        case VehiculosTiposServicio.Mecanico:
        color += 'primary'
        break;

        case VehiculosTiposServicio.Electrico:
        color += 'info'
        break;

        case VehiculosTiposServicio.Estetico:
        color += 'warning'
        break;

        case VehiculosTiposServicio.Ludico:
        color += 'success'
        break;

        case VehiculosTiposServicio.Afinacion:
        color += 'error'
        break;

        case VehiculosTiposServicio.Verificacion:
        color += 'accent'
        break;

        case VehiculosTiposServicio.Llantas:
        color += 'secondary'
        break;

        case VehiculosTiposServicio.Piezas:
        color += 'neutral'
        break;

        default:
        color += 'color-base-300'
        break;
    }
    return color
}
</script>

<template>
    <DefaultLayout>
        <IndexTitle
            to="create"
            label="Servicios"
            link="servicios"
            :asIndex="true"
            :useButton="true"
        ></IndexTitle>

        <TableWrapper :paginator="paginator">
            <!-- head -->
            <thead class="bg-black font-bold text-white text-center">
                <tr>
                    <th>#</th>
                    <th class="hover:bg-info">
                        <span class="hover:cursor-pointer hover:underline">
                            P/S
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </span>
                    </th>
                    <th class="hover:bg-info">
                        <span class="hover:cursor-pointer hover:underline">
                            Vehiculo
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </span>
                    </th>
                    <th class="hover:bg-info">
                        <span class="hover:cursor-pointer hover:underline">
                            Proveedor
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </span>
                    </th>
                    <th class="hover:bg-info">
                        <span class="hover:cursor-pointer hover:underline">
                            Descripcion
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </span>
                    </th>
                    <th class="hover:bg-info">
                        <span class="hover:cursor-pointer hover:underline">
                            Fecha
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </span>
                    </th>
                    <th class="hover:bg-info">
                        <span class="hover:cursor-pointer hover:underline">
                            Total
                            <font-awesome-icon
                                icon="fas fa-sort"
                                size="xs"
                                class="ml-1"
                            />
                        </span>
                    </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="(service, i) in paginator.data">

                    <td>
                        {{ i + 1 }}
                    </td>

                    <td>
                        <div class="flex flex-row justify-center gap-2 0">
                            <div class="flex flex-col gap-2">
                                <div
                                    :class="[
                                        'badge',
                                        service.Pagado
                                            ? 'badge-success'
                                            : 'badge-error',
                                    ]"
                                ></div>
                                <div
                                    :class="[
                                        'badge',
                                        service.Subsidiado
                                            ? 'badge-success'
                                            : 'badge-error',
                                    ]"
                                ></div>
                            </div>
                        </div>
                    </td>

                    <td class="">
                        <div class=" hidden lg:flex flex-nowrap  items-center gap-2 ">
                            <div class="avatar  justify-end ">
                                <div
                                    class="mask bg-gray-300 mask-squircle h-25 w-25"
                                >
                                    <template
                                        v-if="
                                            service.vehiculo.imagenes.length > 0
                                        "
                                    >
                                        <img
                                            @error="
                                                (e) =>
                                                    (e.target.src =
                                                        vehicleNoImage)
                                            "
                                            :src="`files/${service.vehiculo.imagenes[0].Name}`"
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
                                            :src="serviceNoImage"
                                            alt="Avatar Tailwind CSS Component"
                                        />
                                    </template>
                                </div>
                            </div>

                            <div class="flex flex-col w-full  shrink-1 items-center  ">
                                <template v-if="service.tipo_servicio">
                                    <div class="badge my-2" :class="tipoServicioColor(service.tipo_servicio)">
                                        {{ service.tipo_servicio.Descripcion }}
                                    </div>
                                </template>
                                <template v-else>
                                    <div class="badge my-2 badge-neutral">
                                        No definido
                                    </div>
                                </template>
                                <div class="font-bold">
                                    {{ service.vehiculo.Marca }}
                                    {{ service.vehiculo.Modelo }}
                                    {{ service.vehiculo.Anio }}
                                </div>
                                <div class="text-sm opacity-50">
                                    {{ service.vehiculo.Alias }}
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col lg:hidden items-center gap-3 ">
                            <template v-if="service.tipo_servicio">
                                    <div class="badge my-2" :class="tipoServicioColor(service.tipo_servicio)">
                                        {{ service.tipo_servicio.Descripcion }}
                                    </div>
                                </template>
                                <template v-else>
                                    <div class="badge my-2 badge-neutral">
                                        No definido
                                    </div>
                                </template>
                            <div class="avatar">
                                <div
                                    class="mask bg-gray-300 mask-squircle h-25 w-25"
                                >
                                    <template
                                        v-if="
                                            service.vehiculo.imagenes.length > 0
                                        "
                                    >
                                        <img
                                            @error="
                                                (e) =>
                                                    (e.target.src =
                                                        vehicleNoImage)
                                            "
                                            :src="`files/${service.vehiculo.imagenes[0].Name}`"
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
                                            :src="serviceNoImage"
                                            alt="Avatar Tailwind CSS Component"
                                        />
                                    </template>
                                </div>
                            </div>

                            <div class="">
                                <div class="font-bold">
                                    {{ service.vehiculo.Marca }}
                                    {{ service.vehiculo.Modelo }}
                                    {{ service.vehiculo.Anio }}
                                </div>
                                <div class="text-sm opacity-50">
                                    {{ service.vehiculo.Alias }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td>
                        <p class="font-bold">{{ service.proveedor.Alias }}</p>
                    </td>

                    <td>
                        <span class="text-sm opacity-70">{{
                            service.Descripcion
                        }}</span>
                    </td>

                    <td>
                        <span class="text-sm opacity-70"
                            >{{
                                new Date(service.Created_At).toLocaleString(
                                    "es-MX",
                                    {
                                        dateStyle: "medium",
                                    }
                                )
                            }}
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-info">{{
                            vueNumberFormat(service.Total, { prefix: "$" })
                        }}</span>
                    </td>

                    <th>
                        <LinksTable to="servicios" :item="service"></LinksTable>
                    </th>
                </tr>
            </tbody>
        </TableWrapper>
    </DefaultLayout>
</template>
