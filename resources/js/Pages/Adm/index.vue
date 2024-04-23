<script setup>

    import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
    import { Head, useForm } from "@inertiajs/vue3";

    defineProps({

        Points:{

            type:Object,
            required: true
        },

    })

    const createForm = useForm({

        name: '',
        complement: '',
        longitude: '',
        latitude: '',

    })
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

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Point
            </h2>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-amber overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Point
                    </div>
                    

                    <hr class="bg-gray-900 h-1 hr">

                    <div class="p-6 text-gray-900" v-for="Point in Points">

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

                </div>
            </div>
        </div>

    </AuthenticatedLayout>

</template>
<style>
    .hr{
        /* all: initial; */
        border: none;
        background-color: black;
        height: 1px;
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
