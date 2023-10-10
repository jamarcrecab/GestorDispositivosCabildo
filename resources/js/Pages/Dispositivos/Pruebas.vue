<template>


    <div class="">

        <form  @submit.prevent="submit" class="w-auto flex flex-col justify-start text-teal-600 mb-10 mt-7 bg-gray-50 shadow-md p-10 md:flex-row w-2/3 lg:w-2/3">
                <div class="pr-20">
                    <div class="mt-4">
                        <label for="SIM" class="text-lg mb-3">Foto Tarjeta SIM</label>
                        <input id="file" type="file" class="mt-1 block w-full" @change="subirImagen" autofocus />
                    </div>

                    <div class="mt-5">

                        <button type="submit" class="p-2 bg-teal-600 border border-transparent rounded-md font-semibold text-lg text-white hover:bg-teal-700 focus:bg-teal-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 ease-out duration-300">Crear</button>

                    </div>

        </div>
    </form>


    </div>


</template>

<script setup>
import { useForm } from '@inertiajs/vue3';




let form = useForm({
    foto: ''

});

let submit = () => {

form.post('/pruebas');

};

</script>