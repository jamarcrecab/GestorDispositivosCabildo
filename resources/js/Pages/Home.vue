<template>

    <Head title="Index"/>

    <Layout>

        <div v-show="mensajeenviado"></div>

            
            <DesplegableHome></DesplegableHome>
                <TabsWrapper>
                    <Tab title="Ordenadores">

                        <TablaOrdenadores :ordenadores='ordenadores' :busquedaOrdenadores="busquedaOrdenadores"/>
                        
                    </Tab>

                    <Tab title="Impresoras">
                
                        <div>
                            <TablaImpresoras :impresoras='impresoras' :busquedaImpresoras="busquedaImpresoras" />
                        </div>

                    </Tab>

                    <Tab title="Teléfonos">
                
                        <div>
                            <TablaTelefonos :telefonos='telefonos' :busquedaTelefonos="busquedaTelefonos" />
                        </div>

                    </Tab>

                    <Tab title="Tarjetas">
                
                        <div>
                            <TablaTarjetas :tarjetas='tarjetas' :busquedaTarjetas="busquedaTarjetas" />
                        </div>

                    </Tab>

                    <Tab title="Grabadoras">
                
                        <div>
                            <TablaGrabadoras :grabadoras='grabadoras' :busquedaGrabadoras="busquedaGrabadoras" />
                        </div>

                    </Tab>

                    <Tab title="Máquinas Fichar">
                
                        <div>
                            <TablaMaquinasFichar :maquinasfichar='maquinasfichar' :busquedaMaquinasFichar="busquedaMaquinasFichar" />
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


    import TablaOrdenadores from '../Pages/Dispositivos/Tablas/TablaOrdenadores.vue';
    import TablaTelefonos from '../Pages/Dispositivos/Tablas/TablaTelefonos.vue';
    import TablaGrabadoras from '../Pages/Dispositivos/Tablas/TablaGrabadoras.vue';
    import TablaMaquinasFichar from '../Pages/Dispositivos/Tablas/TablaMaquinasFichar.vue';
    import TablaImpresoras from '../Pages/Dispositivos/Tablas/TablaImpresoras.vue';
    import TablaTarjetas from '../Pages/Dispositivos/Tablas/TablaTarjetas.vue';
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
        ordenadores: Object,
        impresoras: Object,
        telefonos: Object,
        grabadoras: Object,
        maquinasfichar: Object
    });

    if(mensaje){

        const mensajeenviado = toastr.success(mensaje);
    };

</script>
