<script setup lang="ts">
import { defineComponent } from "vue";
import DefaultLayout from "../Common/Layouts/DefaultLayout.vue";
import IndexTitle from "../Common/Components/IndexTitle.vue";
import LinksTable from "../Common/Components/LinksTable.vue";
import { useDefaultCommon } from "../Common/Composables/common-composable";
import TableWrapper from "../Common/Components/TableWrapper.vue";

defineProps({ allProviders: Object });

const { providerNoImage } = useDefaultCommon();
</script>

<template>
    <DefaultLayout>
        <IndexTitle
            to="create"
            label="Proveedores"
            link="proveedores"
            :asIndex="true"
            :useButton="true"
        ></IndexTitle>

        <TableWrapper>
            <thead class="bg-black font-bold text-white text-center">
                <tr>
                    <th>#</th>
                    <th>Proveedor</th>
                    <th>Descripcion</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="(provider, i) in allProviders">
                    <td>
                        {{ i + 1 }}
                    </td>
                    <td>
                        <div class="items-center gap-3">
                            <div class="avatar">
                                <div
                                    class="mask mask-squircle h-25 w-25 bg-gray-200"
                                >
                                    <template v-if="!!provider">
                                        <img
                                            :src="
                                                provider.imagenes ||
                                                providerNoImage
                                            "
                                            alt="Avatar Tailwind CSS Component"
                                        />
                                    </template>
                                </div>
                            </div>
                            <div>
                                <div class="font-bold">
                                    {{ provider.Alias }}
                                </div>
                                <div class="text-sm opacity-50">
                                    {{ provider.Nombre }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-ghost badge-md">{{
                            provider.Descripcion
                        }}</span>
                    </td>

                    <td>
                        <span class="badge badge-ghost badge-md"
                            >{{ provider.Direccion }} km</span
                        >
                    </td>

                    <th>
                        <LinksTable
                            to="proveedores"
                            :item="provider"
                        ></LinksTable>
                    </th>
                </tr>
            </tbody>
        </TableWrapper> </DefaultLayout
    >
</template>
