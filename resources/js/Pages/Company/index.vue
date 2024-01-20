<script setup>

    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";
    import { ref } from 'vue'

    defineProps({


        company:{

            type:Object,
            required: true


        },

        errors: {
            type: Object,
            default: () => ({}),
        },


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

            useForm({}).delete(

                route('company.destroy', company),
            )

            setTimeout(()=>{
                modalOpen();
                validation.value = false
            },1000)
            validation.value = true

    }

    const edit = (company) =>{

        useForm({}).get(

            route('company.edit', company)


        )


    }

    const modal = ref(false)
    const validation = ref(false)
    const modalOpen = () => modal.value = !modal.value

</script>



<template>


    <Head title="Empresa" />

    <div v-if="modal" @click="modalOpen" class="absolute duration-1000 w-screen h-screen flex justify-center items-center bg-gray-700 bg-opacity-70">
        <div @click.stop class="w-2/5 h-3/5 bg-white rounded-xl z-10 relative flex justify-center items-center break-words">
            <div class="w-full h-full flex justify-center items-center flex-col break-words bg-gray-500 bg-opacity-30 rounded-lg">
                <div v-if="!validation" class="atencion h-2/4 w-2/4 mt-10 mb-10"></div>
                <div v-else class="checked h-2/4 w-2/4 mt-10 mb-10"></div>
                <h2 class="text-6xl font-bold">Tem certeza?</h2>
                <div class="h-3/4 w-3/4 break-words mt-8 text-xl grid grid-rows-2">
                    <div class="flex justify-center items-center">
                        <div class="h-full w-10/12">
                            <p>Ao clicar em Apagar você irá deletar sua empresa do cadastro, deseja realmente continuar com essa Ação?</p>
                        </div>
                    </div>
                    <div class="flex justify-center items-center gap-4">
                        <a href="#" @click.prevent="remove(company)" style="border: 1px solid #60a5fa;" class="bg-blue-400 p-3 w-2/6 rounded-lg text-center text-white duration-1000 hover:bg-blue-300 hover:p-4">Apagar</a>
                        <a href="#" @click.prevent="modalOpen" style="border: 1px solid rgb(75, 85, 99);" class="bg-gray-600 p-3 rounded-lg text-center text-white duration-1000 hover:bg-gray-500 hover:p-4">Cancelar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <AuthenticatedLayout>
        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Empresa
            </h2>
        </template>

        <div>
            {{errors.name}}
            {{errors.cnpj}}
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-amber dark:bg-amber overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black dark:text-black flex">
                        <!-- Minha Empresa -->
                        <div v-if="company != null" class="grid grid-cols-3 ">

                            <div class="grid grid-cols-2 w-full text-center text-xl">
                                {{ company.name }}
                                {{ company.cnpj }}
                            </div>
                            <div :msg="msg"></div>

                            <div class="grid grid-cols-2 gap-4 items-center">
                                <!-- testes -->
                                <!-- <a href="#" @click.provent="remove(company)" style="border: 1px solid white;" class="bg-white p-3 rounded-lg text-center duration-1000 hover:bg-gray-200">test</a> -->
                                <a href="#" @click.provent="modalOpen" style="border: 1px solid white;" class="bg-white p-3 rounded-lg text-center duration-1000 hover:bg-gray-200">Apagar</a>
                                <a href="#" @click.provent="edit(company)" style="border: 1px solid white;" class="bg-white p-3 rounded-lg text-center duration-1000 hover:bg-gray-200 hover:border-gray-200">Editar</a>
                            </div>

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
<style>
.atencion{
    background-image: url('../../pictures/attention.svg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
.checked{
    background-image: url('../../pictures/checked.svg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
</style>
