<template>
    <div>
        <ul class="cabecera_tabs w-25 flex flex-row gap-4 cursor-pointer mt-5 text-xl">
            <li v-for="title in tabTitles" :key="title" :class=" {selected: title === selectedTitle}" @click="selectedTitle = title">
                {{ title }}
            </li>

        </ul>

        <slot />

    </div>
</template>


<script>
import { provide, ref } from 'vue';

    export default {

        setup( props, { slots }){

            const tabTitles = ref(slots.default().map((tab) => tab.props.title))
            const selectedTitle = ref(tabTitles.value[0])

            provide('selectedTitle',selectedTitle)
            return {

                selectedTitle,
                tabTitles,

            }

        },

    }

</script>

<style scoped>

    .cabecera_tabs {

        transition: 0.4s all ease-out;

    }
    .cabecera_tabs li.selected{

        border-bottom: 4px solid rgb(13, 148, 136);
        display: flex;

    }

</style>

