<script lang="js" setup>
import { Link } from '@inertiajs/vue3';
import { useUserInfo } from '../Composables/common-composable';

let menuItems = [
    {label: 'Vehiculos', to: 'vehiculos', children: [{label:'Nuevo', to: 'create'}, {label:'Listado', to:''}]},
    {label: 'Servicios', to: 'servicios', children: [{label:'Nuevo', to: 'create'}, {label:'Listado', to:''}]},
    {label: 'Proveedores', to: 'proveedores', children: [{label:'Nuevo', to: 'create'}, {label:'Listado', to:''}]}
    ];
    const {isAdmin} = useUserInfo()

menuItems.forEach( i => {
    i.children = i.children.filter( ix => {
        if(ix.label === 'Listado')
            return true

       return isAdmin.value && ix.label ==='Nuevo'
    })
})

console.log('enviando datos', menuItems)
</script>

<template>
    <section>
        <div class="navbar bg-info text-primary-content shadow-sm">
            <div class="navbar-start" v-if="!!$page.props.user">
                <div class="dropdown">
                    <div
                        tabindex="0"
                        role="button"
                        class="btn btn-ghost lg:hidden"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16"
                            />
                        </svg>
                    </div>
                    <ul
                        tabindex="0"
                        class="menu menu-sm dropdown-content bg-black rounded-box z-1 mt-3 w-52 p-2 shadow text-white"
                    >
                        <li v-for="menuItem in menuItems">
                            <details>
                                <summary>{{ menuItem.label }}</summary>
                                <ul class="bg-neutral">
                                    <li v-for="child in menuItem.children">
                                        <Link
                                            :href="`/${menuItem.to}/${child.to}`"
                                            >{{ child.label }}</Link
                                        >
                                    </li>
                                </ul>
                            </details>
                        </li>
                    </ul>
                </div>

                <span class="btn btn-ghost text-xl"
                    >PolliCulos |
                    <span class="font-bold text-black">{{
                        $page.props.user.current.name
                    }}</span></span
                >
            </div>

            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1">
                    <li v-for="menuItem in menuItems">
                        <details>
                            <summary>{{ menuItem.label }}</summary>
                            <ul class="bg-neutral">
                                <li v-for="child in menuItem.children">
                                    <Link
                                        :href="`/${menuItem.to}/${child.to}`"
                                        >{{ child.label }}</Link
                                    >
                                </li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>

            <div class="navbar-end">
                <div class="dropdown dropdown-end cursor-pointer">
                    <div
                        tabindex="0"
                        role="button"
                        class=" avatar avatar-placeholder  "
                    >
                            <div
                                class=" bg-neutral text-neutral-content w-12 rounded-full"
                            >
                                <span class="text-xl">
                                    {{ $page.props.user.current.name.slice(0,2).toUpperCase() }}
                                </span>
                            </div>
                    </div>
                    <ul
                        tabindex="0"
                        class="menu menu-sm dropdown-content bg-black rounded-box z-1 w-30 p-2 mt-1 shadow"
                    >
                        <li class="">
                            <h2
                                class="text-info font-bold"
                                v-if="!!$page.props.user.current.rol"
                            >
                                {{ $page.props.user.current.rol.nombre }}
                            </h2>
                        </li>
                        <li>
                            <a> Profile </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li class="text-error">
                            <Link href="/login/logout">Logout</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>
