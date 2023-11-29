<template>

    <div class="overflow-auto rounded-lg shadow mt-7">

        <div class="flex flex-row justify-items-start 2xl:justify-between xl: justify-between lg: justify-between">
            <div class="mt-2 ml-3 relative flex flex-row gap-3">
                <a href="/telefono/exportar" title="Exportar a Excel Teléfonos" class="bg-green-400 border border-transparent rounded-md font-semibold text-white mt-2 p-2 hover:bg-green-500 focus:bg-green-500 active:bg-gray-900 
                                    focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 ease-out duration-300                                 
                                    xl:text-lg p-2 2xl:text-lg p-2">
                                    <i class="fa-solid fa-phone fa-xl"></i>
                </a>
            </div>
    
            <div class="mt-2 relative flex flex-row justify-items-start 2xl:justify-end xl:justify-end lg:justify-end">
                <i class="relative fa fa-search text-gray-400 top-5 left-8"></i>
                <input type="text"  v-model="busquedaTelefonos" class="h-14 w-25 px-12 rounded-lg hover:cursor-pointer z-index-10" placeholder="Buscar Teléfono...">
            </div>
        </div>
        
            <table class="w-full mt-3 border-separate border-spacing-2">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Marca y Modelo</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">IMEI</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Usuario</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Teléfono</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Puesto</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Departamento</th>
                        <th class="w-auto p-3 text-lg font-semibold tracking-wide text-left text-white bg-teal-600">Administrar</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr v-for="telefono in telefonos.data" :key="telefono.id" class="bg-gray-100 border-b border-gray-200">
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{ telefono.marca }} {{ telefono.modelo }}
                        </td>
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{ telefono.numero_serie }}
                        </td>
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{ telefono.usuario_principal }}
                        </td>
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{ telefono.numero_telefono }}
                        </td>
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{ telefono.puesto}}
                        </td>
                        <td class="p-3 text-xl text-gray-700 whitespace-nowrap">
                            {{ telefono.departamento }}
                        </td>
                        <td class="flex justify-evenly p-3 text-xl text-gray-700 whitespace-nowrap">
                            <div class="flex flex-row gap-10">
                                <div class="w-2 transform hover:text-blue-500 hover:scale-110">
                                    <Link :href="`/telefono/mostrar/${telefono.id_dispositivo}`">
                                        <i class="fa-regular fa-eye"></i>
                                    </Link>
                                </div>

                                <div class="w-2 transform hover:text-green-500 hover:scale-110">
                                    <Link :href="`/telefono/actualizar/${telefono.id_dispositivo}`" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </Link>
                                </div>
                                <div class="w-2 transform hover:text-red-500 hover:scale-110">
                                <button type="buttton" data-toggle="modal" data-target="#modal" @click="eliminar(telefono.id_dispositivo)">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>

                <div class="fixed bottom-0 left-10 mb-16">
                    <Link
                    :is="link.url ? 'Link' : 'span'"
                    v-for="link in telefonos.links"
                    :key="link.id"
                    :href="link.url"
                    v-html="link.label"
                    class="text-black bg-white hover:bg-teal-600 focus:ring-4 border-0 border-b-2 border-teal-600 focus:ring-teal-500 font-medium rounded-lg px-5 py-2.5 mr-2 mb-2 dark:bg-white dark:hover:bg-white focus:outline-none dark:focus:ring-teal-500"
                    :class="{ 'text-gray-500': ! link.url, 'font-bold, text-teal-500' : link.active}"
                    />
                </div>
            </div>
</template>

<script setup>

    import { defineProps,ref,watch} from 'vue';
    import { Link, router } from '@inertiajs/vue3';

    defineProps({

    telefonos: Object,

    });

    //Variable busqueda y funcion busqueda en tiempo real
        
    let busquedaTelefonos = ref('');

    watch(busquedaTelefonos,(value) =>{

    router.get('/dispositivos',{ busquedaTelefonos: value},
    {
        preserveState: true,
        replace: true

    });

    },100);

    //Función para eliminar un dispositivo de la tabla dispositivos
    
    let eliminar = async function(id) {

    router.delete(`/telefono/eliminar/${id}`,{

    onBefore: () => confirm('¿Estás seguro de borrar esta telefono?')

    });

    }

</script>