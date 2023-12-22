<template>

    <Head title="Editar Máquina de Fichar"></Head>

    <Layout>

        <div class="container mx-auto">
            <h3 class="text-3xl mt-12 font-bold text-neutral-800">Editar {{props.tarjeta.telefono }}</h3>
        
            <form  @submit.prevent="submit" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3">
                <div class="pr-20">
                    <div class="mt-4">
                        <label for="nombre" class="text-lg mb-3">Nombre</label>
                        <input v-model="form.nombre" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.nombre" v-text="form.errors.nombre" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="apellidos" class="text-lg mb-3">Apellidos</label>
                        <input v-model="form.apellidos" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.apellidos" v-text="form.errors.apellidos" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="correo" class="text-lg mb-3">Correo</label>
                        <input v-model="form.correo" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.correo" v-text="form.errors.correo" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="dni" class="text-lg mb-3">DNI</label>
                        <input v-model="form.dni" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.dni" v-text="form.errors.dni" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="icc" class="text-lg mb-3">ICC</label>
                        <input v-model="form.icc" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.icc" v-text="form.errors.icc" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="telefono" class="text-lg mb-3">Teléfono</label>
                        <input v-model="form.telefono" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.telefono" v-text="form.errors.telefono" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="extension" class="text-lg mb-3">Extensión</label>
                        <input v-model="form.extension" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.extension" v-text="form.errors.extension" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="pin" class="text-lg mb-3">PIN</label>
                        <input v-model="form.pin" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.pin" v-text="form.errors.pin" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="puk" class="text-lg mb-3">PUK</label>
                        <input v-model="form.puk" type="number" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.puk" v-text="form.errors.puk" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="tipo_contrato" class="text-lg mb-3">Tipo Contrato</label>
                        <input v-model="form.tipo_contrato" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.tipo_contrato" v-text="form.errors.tipo_contrato" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                </div>

                <div class="pr-20">

                    <div class="mt-4">

                        <label for="servicios_adicionales" class="text-lg mb-3">Servicios Adicionales</label>
                        <input v-model="form.servicios_adicionales" type="text" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.servicios_adicionales" v-text="form.errors.servicios_adicionales" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="fecha_recogida" class="text-lg mb-3">Fecha Recogida</label>
                        <input v-model="form.fecha_recogida" type="date" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.fecha_recogida" v-text="form.errors.fecha_recogida" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">

                        <label for="fecha_alta" class="text-lg mb-3">Fecha Alta (Opcional)</label>
                        <input v-model="form.fecha_alta" type="date" class="block appearance-none w-35 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 md:w-80 sm:w-50 xl:w-80 2xl:w-80"/>

                        <div v-if="form.errors.fecha_alta" v-text="form.errors.fecha_alta" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-4">
                        <label class="text-lg mb-3">Estado</label>
                        <div class="d-flex flex-row w-25 mt-4">

                            <input class="form-check-input" v-model="form.estado" type="radio" value="Alta" id="Alta">
                            <label class="form-check-label ml-2" for="Alta">Alta</label>

                            <input class="form-check-input ml-4" v-model="form.estado" type="radio" value="Baja" id="Baja">
                            <label class="form-check-label ml-2" for="Baja">Baja</label>
                        </div>

                        <div v-if="form.errors.estado" v-text="form.errors.estado" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>

                    </div>

                    <div class="mt-4">
                        <label for="departamento" class="text-lg mb-3">Servicio/Departamento</label>
                        <select v-model="form.departamento" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 xl:w-80 2xl:w-80">
                            <option v-for="departamento in departamentos" :key="departamento.id">{{ departamento.nombre }}</option>
                        </select>

                        <div v-if="form.errors.departamento" v-text="form.errors.departamento" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        
                    </div>

                    <div class="mt-4">
                        <div class="mt-4">
                            <label for="puesto" class="text-lg mb-3">Puesto</label>
                            <select v-model="form.puesto" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:ring-teal-600 focus:outline-teal-600 focus:shadow-outline-teal-600 xl:w-80 2xl:w-80">
                                <option v-for="puesto in puestos" :key="puesto.id" :value="puesto.texto"> {{ puesto.texto }}</option>
                            </select>
                            <div v-if="form.errors.puesto" v-text="form.errors.puesto" class="block appearance-none w-full mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                        </div>
                    </div>

                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 p-5 rounded relative w-full md: w-1/3 lg:w-2/3 mt-4" role="alert">
                        <strong class="font-bold">¡Importante! </strong>
                        <span class="block sm:inline">Aunque salga el campo Foto Tarjeta SIM sin rellenar, no hace falta editarlo si previamente se subió la foto.</span>
                    </div>

                    <div class="mt-4">
                        <label for="SIM" class="text-lg mb-3">Foto Tarjeta SIM</label>
                        <br>
                        <input type="file" class="w-auto" @change="subidaImagen" />
                        <div v-if="form.errors.foto_sim" v-text="form.errors.foto_sim" class="block appearance-none w-35 mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded md:w-50 sm:w-50 xl:w-80 2xl:w-80  md:w-50 sm:w-50 xl:w-80 2xl:w-80" role="alert"></div>
                    </div>

                    <div class="mt-5">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Editar</button>

                    </div>


                </div>
            </form>
            
        </div>  

    </Layout>

        
</template>

<script setup>

    import { useForm,Head} from '@inertiajs/vue3';
    import { onMounted, ref } from 'vue';
    import  Layout  from '../../../Layouts/Layout.vue';

    let props = defineProps({

        tarjeta:Object,
    });

    const departamentos = ref([]);
    const imagenbase64 = ref('');

    const puestos = ref([

        {id:1, texto: 'Departamental'},
        {id:2, texto: 'Jefe Servicio'},
        {id:3, texto: 'Trabajador'},
        {id:4, texto: 'Cargo Político'},
        {id:5, texto: 'Cargo Confianza'},

    ]);


    const subidaImagen = (event) => {

        const imagen = event.target.files[0];

        if(imagen){

            const reader = new FileReader();

            reader.onload = () => {

                imagenbase64.value = reader.result;

            }

            reader.readAsDataURL(imagen);
        }

        form.foto_sim = imagenbase64;

    }

    const getDepartamentos = async () => {

    await axios.get('/api/departamentos').then(response => {

        departamentos.value = response.data;

    });
    };


    onMounted(() => {

        getDepartamentos();

    });
    

    let form = useForm({

    nombre:props.tarjeta.nombre,
    apellidos: props.tarjeta.apellidos,
    correo: props.tarjeta.correo,
    dni: props.tarjeta.dni,
    icc:props.tarjeta.icc,
    telefono:props.tarjeta.telefono,
    extension:props.tarjeta.extension,
    pin:props.tarjeta.pin,
    puk:props.tarjeta.puk,
    tipo_contrato:props.tarjeta.tipo_contrato,
    servicios_adicionales:props.tarjeta.servicios_adicionales,
    fecha_recogida:props.tarjeta.fecha_recogida,
    fecha_alta:props.tarjeta.fecha_alta,
    estado:props.tarjeta.estado,
    departamento:props.tarjeta.departamento,
    puesto: props.tarjeta.puesto,
    foto_sim:props.tarjeta.foto_sim,
    });


let submit= () => {

    form.post(`/tarjeta/actualizar/${props.tarjeta.id}`);

}

</script>
