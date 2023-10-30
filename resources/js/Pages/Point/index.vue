
<script setup>

    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";

    defineProps({

        Points:{

            type:Object,
            required: true
        }

    })

    const createForm = useForm({

        name: '',
        complement: '',
        longitude: '',
        latitude: '',

    })

    const add = () => {

        createForm.post(

            route('point.store'), {

                onFinish: () => {

               }
            }
        )
    }



</script>

<template>

    <Head title="Empresa" />

    <AuthenticatedLayout>


        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Point
            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        My Point
                    </div>

                    <hr>

                    <div class="p-6 text-gray-900 dark:text-gray-100" v-for="Point in Points">

                        {{ Point.id }} <br>
                        {{ Point.name }} <br>
                        {{ Point.complement }} <br>
                        {{ Point.latitude }} <br>
                        {{ Point.longitude }} <br>


                    </div>

                    <hr>

                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <form @submit.prevent="add">

                            <label>Name</label>
                            <input type="text" v-model="createForm.name">
                            <label>complement</label>
                            <input type="text" v-model="createForm.complement">
                            <label>latitude</label>
                            <input type="text" v-model="createForm.latitude">
                            <label>longitude</label>
                            <input type="text" v-model="createForm.longitude">

                            <button>Salvar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>

</template>
