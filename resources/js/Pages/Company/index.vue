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
        cnpj: '',
        phone: '',
        dataC: ''

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

    <div v-if="modal" @click="modalOpen" class="absolute duration-1000 w-screen h-screen flex justify-center items-center bg-gray-700 bg-opacity-70 z-20">
        <div @click.stop class="w-2/5 h-3/5 bg-white rounded-xl z-10 relative flex justify-center items-center break-words">
            <div class="w-full h-full flex justify-center items-center flex-col break-words bg-gray-500 bg-opacity-30 rounded-lg z-10">
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
    <div>
        <div class="w-screen h-screen absolute backCompany"><div>
        <div class="w-screen h-screen absolute backCompany2"></div>

        

            </div>
            <AuthenticatedLayout class="relative z-10">
                <template #header>
        
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight pt-8">
                        Empresa
                    </h2>
                    <hr class="mt-8 border-none bg-black h-px">
                    <div class="grid grid-cols-4 w-3/4">
                        <h2>nome</h2>
                        <h2>cnpj</h2>
                        <h2>telefone</h2>
                        <h2>data</h2>
                    </div>
                </template>
        
                <div>
                    {{errors.name}}
                    {{errors.cnpj}}
                    {{errors.phone}}
                    {{errors.dataC}}
                </div>
        
                <div class="py-12 relative z-10">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="text-black dark:text-black flex">
                                <!-- Minha Empresa -->
                                <div v-if="company != null" class="grid grid-cols-3 h-36 items-center">
        
                                    <div class="grid grid-cols-4 gap-6 col-span-2 w-full text-center text-xl items-end mt-8">
                                        <h2>{{ company.name }}</h2>
                                        <h2>{{ company.cnpj }}</h2>
                                        <h2>{{ company.phone }}</h2>
                                        <h2>{{ company.dataC }}</h2>
                                    </div>
                                    <div class="flex justify-end">
                                        <div class="grid grid-cols-2 gap-4 items-end mt-8 ml-26">
                                            <!-- testes -->
                                            <!-- <a href="#" @click.provent="remove(company)" style="border: 1px solid white;" class="bg-white p-3 rounded-lg text-center duration-1000 hover:bg-gray-200">test</a> -->
                                            <a href="#" @click.provent="modalOpen" style="border: 1px solid white;" class="p-3 rounded-lg text-center duration-1000 hover:bg-gray-200 delete-1 mr-8"></a>
                                            <a href="#" @click.provent="edit(company)" style="border: 1px solid white;" class="p-3 rounded-lg text-center duration-1000 hover:bg-gray-200 hover:border-gray-200 edit-1 mr-8"></a>
                                        </div>
                                    </div>

                                    <div :msg="msg"></div>
        
        
                                </div>
                            </div>
        
                            <div v-if="company == null">
                                <form @submit.prevent="add">
        
                                    <input type="text" v-model="createForm.name">
                                    <input type="text" v-model="createForm.cnpj">
                                    <input type="text" v-model="createForm.phone">
                                    <input type="text" v-model="createForm.dataC">
        
                                    <button>Cadastrar</button>
        
                                </form>
                            </div>
                        </div>
        
                    </div>
        
        
        
                </div>
        
        
        
        
        
            </AuthenticatedLayout>
        </div>
    </div>


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
.backCompany{
    background-image: url('../../pictures/curved-svg.svg');
    background-size: contain;
    background-repeat: no-repeat;
    background-position-x: -300px;
    background-position-y: 80px;
}
.backCompany2{
    background-image: url('../../pictures/svg-1.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position-x: 470px;
    background-position-y: -60px;
}
.delete-1{
    background-image: url('../../pictures/delete.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.edit-1{
    background-image: url('../../pictures/edit.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
</style>
