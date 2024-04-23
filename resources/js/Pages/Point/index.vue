
<script setup>

    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";

    defineProps({

        Points:{

            type:Object,
            required: true
        },

        errors: {
            type: Object,
            default: () => ({}),
        }

    })

    const createForm = useForm({

        name: '',
        complement: '',
        link: '',
        status: '',

    })

    const add = () => {

        createForm.post(

            route('point.store'), {
                onFinish: () => {}
            }
        )
    }

    const remove = (Point) => {
        const id = confirm('Vai apagar T_T');


        if(id != false){

            useForm({}).delete(

                route('point.destroy', Point),
            )


        }

    }

    const edit = (Point) =>{

        useForm({}).get(
            route('point.edit', Point)
        )

    }

</script>

<template>

    <Head title="Empresa" />

    <div class="w-screen absolute backCompany3"></div>
    <div class="w-screen absolute backCompany4"></div>


    <AuthenticatedLayout>

        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Point
            </h2>
            <hr class="mt-8 border-none bg-black h-px">
            <div class="grid grid-cols-6 w-7/12 pl-4">
                <h2>ID</h2>
                <h2>Nome</h2>
                <h2>Complemento</h2>
                <h2>Latitude</h2>
                <h2>Longetude</h2>
                <h2>Status</h2>
            </div>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black">
                        My Point
                    </div>

                    <hr>

                    <div class="p-6 text-black" v-for="Point in Points">

                        <div class="flex gap-14">
                            <h2>{{ Point.id }}</h2>
                            <h2>{{ Point.name }}</h2>
                            <h2>{{ Point.complement }}</h2>
                            <h2>{{ Point.latitude }}</h2>
                            <h2>{{ Point.longitude }}</h2>
                            <h2>{{ Point.status }}</h2>
                            <div class="flex justify-end w-full">
                                <a href="#" @click.provent="remove(Point.id)" style="margin: 5px;" class="delete-2 w-6 h-6"></a>
                                <a href="#" @click.provent="edit(Point.id)" style="margin: 5px;" class="edit-2 w-6 h-6"></a>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <div>
                        {{ errors.name }}
                        {{ errors.complement }}
                        {{ errors.link }}
                    </div>

                    <div class="p-6 text-black">

                        <form @submit.prevent="add" class="grid grid-cols-3 grid-rows-3">

                            <label>Name</label>
                            <label>complement</label>
                            <label>link</label>
                            <input type="text" v-model="createForm.name">
                            <input type="text" v-model="createForm.complement">
                            <input type="text" v-model="createForm.link">

                            <!-- <label>status</label>
                            <input type="text" v-model="createForm.status"> -->

                            <button class="col-span-3 mt-8">Salvar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>

</template>
<style>
.backCompany3{
    background-image: url('../../pictures/curved-svg.svg');
    background-size: contain;
    background-repeat: no-repeat;
    background-position-x: -800px;
    background-position-y: 80px;
    height: 100vw;
    z-index: -1;
}
.backCompany4{
    background-image: url('../../pictures/svg-1.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position-x: 600px;
    background-position-y: -200px;
    height: 100vw;
    z-index: -1;
}
.delete-2{
    background-image: url('../../pictures/delete.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.edit-2{
    background-image: url('../../pictures/edit.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
</style>