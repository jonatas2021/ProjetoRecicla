<script setup>

    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";
    

    defineProps({

        Points:{

            type:Object,
            required: true
        }

    }) 


</script>

<template>

    <div v-for="Point in Points">


        {{ Point.name }}
        {{ Point.complement }}
        {{ Point.latitude}}
        {{ Point.longitude}}
        <br>


    </div>



</template>
