<script setup>

    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";

    const dados =  defineProps({


        company:{

            type:Object,
            required: true


        }



    })



    const createForm = useForm({

        name: dados.company.name,
        cnpj: dados.company.cnpj



    })


    const update = (id) => {

        createForm.put(

            route('company.update', id)


        )

    }

</script>



<template>

    <Head title="Editando empresa" />

    <AuthenticatedLayout>


        <template #header>


            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Editando</h2>



        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-amber overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-black">
                        Editando

                        <div>

                            <form @submit.prevent="update(company.id)">
                                <div class="grid grid-cols-2 gap-2">
                                    <label for="nome">Nome da empresa:</label>
                                    <input type="text" v-model="createForm.name">
                                    <label for="cnpj">CNPJ da empresa</label>
                                    <input type="text" v-model="createForm.cnpj">
                                </div>
                                <button class="bg-white p-4 w-1/6 rounded-2xl">salvar</button>

                            </form>



                        </div>


                    </div>

                </div>
            </div>
        </div>



    </AuthenticatedLayout>

</template>
