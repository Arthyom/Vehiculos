<script setup lang="ts">
import DefaultLayout from "../Common/Layouts/DefaultLayout.vue";
import IndexTitle from '../Common/Components/IndexTitle.vue';
import LinksTable from "../Common/Components/LinksTable.vue";
import { provide } from "vue";
import { useDefaultCommon } from "../Common/Composables/common-composable";


defineProps({ allServices: Array });

const {serviceNoImage, vehicleNoImage} = useDefaultCommon()

</script>

<template>
    <DefaultLayout>

        <IndexTitle
            to="create"
            label='Servicios'
            link="servicios"
            :asIndex="true"
            :useButton="true"
        ></IndexTitle>


        <div class="overflow-x-auto rounded-box border border-base-content/5">
            <table class="table table-zebra">
                <!-- head -->
                <thead class="bg-black font-bold text-white text-center">
                    <tr>
                        <th>#</th>
                        <th>P/S</th>
                        <th>Vehiculo</th>
                        <th>Proveedor</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr v-for="(service, i) in allServices">
                        <!-- <pre>
                            {{ service }}
                        </pre> -->
                        <td>
                            {{ i + 1 }}
                        </td>
                        <td>
                            <div class="flex flex-col  gap-2">

                                <div :class="['badge', service.Pagado ?'badge-success' : 'badge-error']" ></div>
                                <div :class="['badge', service.Subsidiado ?'badge-success' : 'badge-error']"></div>
                            </div>
                        </td>
                        <td >
                            <div class=" items-center gap-3">
                                <div class="avatar">
                                    <div class="mask bg-gray-300 mask-squircle h-25 w-25">
                                        <template v-if="service.vehiculo.imagenes.length > 0">
                                            <img
                                                @error="(e) => (e.target.src = vehicleNoImage)"
                                                :src="`files/${service.vehiculo.imagenes[0].Name}`"
                                                alt="Avatar Tailwind CSS Component"
                                            />
                                        </template>

                                        <template v-else>
                                            <img
                                                @error="(e) => (e.target.src = vehicleNoImage)"
                                                :src="serviceNoImage"
                                                alt="Avatar Tailwind CSS Component"
                                            />
                                        </template>
                                    </div>
                                </div>
                                <div >
                                    <div class="font-bold">
                                        {{ service.vehiculo.Marca }} {{ service.vehiculo.Modelo }} {{ service.vehiculo.Anio  }}
                                    </div>
                                    <div class="text-sm opacity-50">
                                        {{ service.vehiculo.Alias }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td >
                            <p class="font-bold">{{ service.proveedor.Nombre }}</p>
                            <p class="text-sm opacity-50">{{ service.proveedor.Alias }}</p>
                        </td>

                        <td >
                            <span class="text-sm opacity-70">{{
                                service.Descripcion
                            }}</span>
                        </td>

                        <td>
                            <span class="text-sm opacity-70"
                                >{{  new Date(service.Created_At).
                                toLocaleString('es-MX', {
                                    day: 'numeric',
                                    year: 'numeric',
                                    month:'long'
                                }) }} </span
                            >
                        </td>
                        <td>
                            <span class="badge badge-info">{{ service.Total }}</span>
                        </td>

                        <th>
                           <LinksTable to="servicios" :item="service"></LinksTable>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        </DefaultLayout>
</template>
