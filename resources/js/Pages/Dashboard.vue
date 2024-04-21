<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


    defineProps({

        can: Object,

    })



</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            <div v-if="can.isAdm" >
               <a :href="route('adm.index')">Adm</a>
               
           </div>
        </template>
        <iframe src="http://127.0.0.1:8000/map" height="80%" width="100%" frameborder="0" class="absolute"></iframe>
    </AuthenticatedLayout>
</template>
