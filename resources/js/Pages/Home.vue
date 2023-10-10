<template>

    <Head title="Index"/>

    <Layout>

        <div v-show="mensajeenviado"></div>

            
            <DesplegableHome></DesplegableHome>
                <TabsWrapper>
                    <Tab title="Dispositivos">

                        <TablaDispositivos :dispositivos='dispositivos' :busquedaDispositivos="busquedaDispositivos"/>

                    </Tab>

                    <Tab title="Tarjetas">
                
                        <div>
                            <TablaTarjetas :tarjetas='tarjetas' :busquedaTarjetas="busquedaTarjetas" />
                        </div>

                    </Tab>

            </TabsWrapper>
        
                
    </Layout>
         

</template>

<script setup>


    //Módulos Importados

    import Layout from '../Layouts/Layout.vue';
    import { Head,usePage} from '@inertiajs/vue3';
    import { defineProps } from 'vue';
    import { useToastr } from '../toastr.js';
    import TablaDispositivos from '../Pages/Dispositivos/TablaDispositivos.vue';
    import TablaTarjetas from '../Pages/Dispositivos/TablaTarjetas.vue';
    import Tab from '../Components/Tab.vue';
    import TabsWrapper from '../Components/TabsWrapper.vue';
    import DesplegableHome from '@/Components/DesplegableHome.vue';

    
    //Constantes 
    const toastr = useToastr();

    const page = usePage();

    const mensaje = page.props.mensaje;

    //Funcion para generar las propiedades obtenidas del controlador

     defineProps({

        dispositivos: Object,
        tarjetas: Object,
    });

    if(mensaje){

       const mensajeenviado = toastr.success(mensaje);
    };

</script>
