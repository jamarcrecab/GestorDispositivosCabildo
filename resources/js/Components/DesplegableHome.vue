<template>
     <div class="flex flex-row justify-start overflow-auto gap-5 xl:justify-end">
            <Link href="/dispositivos/crear" type="submit"  title="Añadir Dispositivo" class="bg-teal-600 border border-transparent rounded-md font-semibold text-white mt-2 p-2 hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 
                                                                  focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300 
                                                                  xl:text-lg p-2 2xl:text-lg p-2"><i class="fa-solid fa-desktop fa-lg"></i></Link>
            <Link href="/registro" type="submit"  title="Añadir Usuario" class="bg-gray-600 border border-transparent rounded-md font-semibold text-white mt-2 p-2 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 
                                                                  focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300 
                                                                  xl:text-lg p-2 2xl:text-lg p-2"><i class="fa-solid fa-user-plus fa-lg"></i></Link>
            <Link href="/departamentos" type="submit" title="Añadir Departamento" class="bg-teal-600 border border-transparent rounded-md font-semibold text-white mt-2 p-2 hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 
                                                                  focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300 
                                                                  xl:text-lg p-2 2xl:text-lg p-2"><i class="fa-solid fa-users-line fa-xl"></i></Link>
            <Link href="/zonas" type="submit" title="Añadir Zona de Trabajo" class="bg-gray-600 border border-transparent rounded-md font-semibold text-white mt-2 p-2 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 
                                                                  focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300 
                                                                  xl:text-lg p-2 2xl:text-lg p-2"><i class="fa-solid fa-building fa-lg"></i></Link>
    </div>

</template>

<script setup>

    import { Link } from '@inertiajs/vue3';

</script>
