<template>

    <Head title="Ver Tarjeta" />

    <Layout>

    <div class="flex flex-row justify-stretch">

        <div class="container mx-auto overflow ">

            <h3 class="text-3xl mt-12 font-bold text-neutral-800"> {{ tarjeta.telefono }}</h3>

            <div class="w-auto flex flex-col justify-start mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3 xl:w-2/3 2xl:w-2/3">

                <div class="pr-20">

                    <p class="text-2xl mt-4 text-neutral-800 font-bold underline">Datos Usuario</p>

                    <p class="text-xl mt-4 text-teal-600">Nombre y Apellidos del usuario</p>

                    <p class="mt-1 text-2xl">{{ tarjeta.nombre }} {{ tarjeta.apellidos }}</p>

                    <p class="text-xl mt-4 text-teal-600">DNI</p>

                    <p class="mt-1 text-2xl">{{ tarjeta.dni }}</p>

                    <p class="text-xl mt-4 text-teal-600">Tipo Contrato</p>

                    <p class="mt-1 text-2xl"> {{ tarjeta.tipo_contrato }}</p>

                    <p class="text-xl mt-4 text-teal-600">Servicios Adicionales</p>

                    <p class="mt-1 text-2xl"> {{ tarjeta.servicios_adicionales }}</p>

                    <p class="text-xl mt-4 text-teal-600">Fecha Recogida</p>

                    <p class="mt-1 text-2xl"> {{ tarjeta.fecha_recogida }}</p>

                    <p class="text-xl mt-4 text-teal-600">Fecha Alta</p>

                    <p v-if="tarjeta.fecha_alta == null" class="mt-1 text-2xl"> No se ha puesto una fecha de alta</p>

                    <p v-else class="mt-1 text-2xl"> {{ tarjeta.fecha_alta }}</p>

                    <p class="text-xl mt-4 text-teal-600">Departamento</p>

                    <p class="mt-1 text-2xl"> {{ tarjeta.departamento }}</p>

                    <p class="text-xl mt-4 text-teal-600">Firma</p>

                    <img :src=" tarjeta.firma " />

                </div>

                <div class="pr-20">

                    <p class="text-2xl mt-4 font-bold text-neutral-800 underline">Datos Tarjeta</p>

                    <p class="text-xl mt-4 text-teal-600">ICC</p>

                    <p class="mt-1 text-2xl">{{ tarjeta.icc }}</p>

                    <p class="text-xl mt-4 text-teal-600">Extensión</p>

                    <p  class="mt-1 text-2xl">{{ tarjeta.extension }}</p>

                    <p class="text-xl mt-4 text-teal-600">PIN</p>

                    <p  class="mt-1 text-2xl">{{ tarjeta.pin }}</p>

                    <p class="text-xl mt-4 text-teal-600">PUK</p>

                    <p class="mt-1 text-2xl"> {{ tarjeta.puk }}</p>

                    <p class="text-xl mt-4 text-teal-600">Estado</p>

                    <p class="mt-1 text-2xl"> {{ tarjeta.estado }}</p>

                    <p class="text-xl mt-4 text-teal-600">Puesto</p>

                    <p class="mt-1 text-2xl"> {{ tarjeta.puesto }}</p>

                    <p class="text-xl mt-4 text-teal-600">Foto Tarjeta SIM</p>

                    <img :src=" tarjeta.foto_sim " />

                    <div class="mb-5 flex flex-row">

                        <Link :href="`/tarjeta/actualizar/${tarjeta.id}`" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 ease-out duration-300">Editar</Link>
                        <Link  @click="eliminar(tarjeta.id)" class="ml-4 p-2 bg-red-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ease-out duration-300">Borrar</Link>
                        <a title="Descargar Ficha en PDF" :href="`/tarjeta/pdf/${tarjeta.id}`" class="ml-4 p-2 bg-red-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ease-out duration-300"><i class="fa-solid fa-file-pdf" style="color: #ffffff;"></i></a>

                    </div>

                </div>
            </div>

        </div>

    </div>
    </Layout>

</template>

<script setup>

    import Layout from '../../../Layouts/Layout.vue';
    import { Link, Head,router} from '@inertiajs/vue3';

    const props = defineProps({

        tarjeta: Object,
        app_url: String


    })

    let eliminar = async function(id) {

        router.delete(`/tarjeta/eliminar/${id}`,{

        onBefore: () => confirm('¿Estás seguro de borrar esta tarjeta?')
});


}


</script>