<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

</script>
<template>

    <Head title="Ponto Coleta" />

    <AuthenticatedLayout>


        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Ponto Coleta
            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Meu Ponto de Coleta
                    </div>

                    <div>
                        <form @submit.prevent="add">

                            <label>Nome</label>
                            <input type="text" v-model="createForm.name">
                            <br>
                            <label>Componente</label>
                            <input type="text" v-model="createForm.componente">
                            <br>
                            <label>Longitude</label>
                            <input type="text" v-model="createForm.longitude">
                            <br>
                            <label>Latitude</label>
                            <input type="text" v-model="createForm.latitude">
                            <br><hr>
                            <button>Cadastrar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>

</template>
