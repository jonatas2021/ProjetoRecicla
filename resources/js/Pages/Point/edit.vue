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


        },
        errors: {
            type: Object,
            default: () => ({}),
        }

    })

    const createForm = useForm({

        name: dados.Points.name,
        complement: dados.Points.complement,
        latitude: dados.Points.latitude,
        longitude: dados.Points.longitude,
        status: dados.Points.status,
        link: ''
    })

    const update = (id) => {

        createForm.put(

            route('point.update', id)

        )

    }
    const aprovar = (id)=> {
        createForm.put(


            route('point.update', id)
        )

    }

</script>
<template>

    <Head title="Edit Point" />

    <AuthenticatedLayout>


        <template #header>
            <h2 class="font-semibold text-xl text-black leading-tight">Edit</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-amber overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-black">
                        Editing:


                            {{ Points.name }} <br>
                            {{ Points.complement }} <br>
                            {{ Points.latitude }} <br>
                            {{ Points.longitude }} <br>


                    </div>

                    <hr>
                    <div v-if="Adm != null">

                        <a href="#" @click.provent="aprovar(Points.id, v=1)">Aprovar</a>

                    </div>

                    {{ errors.name }}
                    {{ errors.complement }}
                    {{ errors.link }}
                    <div v-if="Adm == null">
                        <div class="p-6 text-black">

                            <form @submit.prevent="update(Points.id)">

                                <input type="text" v-model="createForm.name">
                                <input type="text" v-model="createForm.complement">
                                <input type="text" v-model="createForm.link">



                                <button>salvar</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>

</template>

