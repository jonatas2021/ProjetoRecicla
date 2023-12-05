<script setup>

    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";

    const dados =  defineProps({

        Points:{

            type:Object,
            required: true
        },
        
        Adm: {

            type:Object,
            require: true


        }

    })

    const createForm = useForm({

        name: dados.Points.name,
        complement: dados.Points.complement,
        latitude: dados.Points.latitude,
        longitude: dados.Points.longitude,
        status: dados.Points.status,

    })

    const update = (id) => {

        createForm.put(

            route('point.update', id)

        )

    }
    const aprovar = (id)=> {
        createForm.put(


            route('point.aprovar', id)
        )

    }

</script>
<template>

    <Head title="Edit Point" />

    <AuthenticatedLayout>


        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edit</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Editing:


                            {{ Points.id }} <br>
                            {{ Points.name }} <br>
                            {{ Points.complement }} <br>
                            {{ Points.latitude }} <br>
                            {{ Points.longitude }} <br>


                    </div>

                    <hr>
                    <div v-if="Adm != null">

                        <a href="#" @click.provent="aprovar(Points.id)">Aprovar</a>

                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <form @submit.prevent="update(Points.id)">

                            <input type="text" v-model="createForm.name">
                            <input type="text" v-model="createForm.complement">
                            <input type="text" v-model="createForm.latitude">
                            <input type="text" v-model="createForm.longitude">
                            <button>salvar</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>

</template>

