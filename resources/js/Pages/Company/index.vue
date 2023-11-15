<script setup>

    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";

    defineProps({


        company:{

            type:Object,
            required: true


        }
 

    })

    const createForm = useForm({

        name: '',
        cnpj: ''



    })

    const add = () => {


        createForm.post(

            route('company.store'), {


                onFinish: () => {

                }


            }


        )


    }

    const remove = (company) => {
        const id = confirm('Vai apagar T_T');

        if(id != false){

            useForm({}).delete(
    
                route('company.destroy', company),
            )


        }

    }

    const edit = (company) =>{

        useForm({}).get(

            route('company.edit', company)


        )


    }




</script>



<template>


    <Head title="Empresa" />

    <AuthenticatedLayout>


        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Empresa
            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Minha Empresa
                        <div v-if="company != null">

                            {{ company.name }}
                            {{ company.cnpj }}

                            <a href="#" @click.provent="remove(company)" style="border: 1px solid black;"  >Apagar</a>
                            
                            <a href="#" @click.provent="edit(company)" style="border: 1px solid black;">Editar</a>

                        </div>
                    </div>

                    <div v-if="company == null">
                        <form @submit.prevent="add">

                            <input type="text" v-model="createForm.name">
                            <input type="text" v-model="createForm.cnpj">
                            <button>Cadastrar</button>

                        </form>
                    </div>
                </div>

            </div>



        </div>





    </AuthenticatedLayout>





</template>
