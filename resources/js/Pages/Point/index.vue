
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
                        {{ Point.status }} <br>

                        <a href="#" @click.provent="remove(Point.id)" style="margin: 5px;border: 1px solid black;">DEL</a>
                        <a href="#" @click.provent="edit(Point.id)" style="margin: 5px;border: 1px solid black;">EDIT</a>

                    </div>

                    <hr>
                    <div>
                        {{ errors.name }}
                        {{ errors.complement }}
                        {{ errors.link }}
                    </div>

                    <div class="p-6 text-gray-900 dark:text-gray-100">

                        <form @submit.prevent="add">

                            <label>Name</label>
                            <input type="text" v-model="createForm.name">
                            <label>complement</label>
                            <input type="text" v-model="createForm.complement">
                            <label>link</label>
                            <input type="text" v-model="createForm.link">

                            <!-- <label>status</label>
                            <input type="text" v-model="createForm.status"> -->

                            <button>Salvar</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>

</template>
