<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />
    <div class="nav w-screen absolute">
        <div class="flex items-center justify-start font-semibold gap-6 ml-28">
            <a href="/"
                class="dark:hover:text-gray-600 transition duration-1000 rounded-lg p-2 hover:bg-amber focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
            <a href=""
                class="dark:hover:text-gray-600 transition duration-1000 rounded-lg p-2 hover:bg-amber focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">About</a>
            <a href=""
                class="dark:hover:text-gray-600 transition duration-1000 rounded-lg p-2 hover:bg-amber focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Voltar</a>
        </div>
    </div>

    <div class="box-1 sm:position:relative right-0">
        <div class="grafic-color-yellow">
            <div class="card-box w-full grid grid-cols-2">
                <div class="card-text flex items-center justify-center">
                    <div class="text-box w-3/4 break-all">
                        <h2 class="text-6xl font-extrabold mb-8">Registro</h2>
                        <p class="break-words">Insira os detalhes da sua conta</p>
                        <div class="box-btn flex w-3/4 mt-16 gap-6">

                            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                {{ status }}
                            </div>

                            <form @submit.prevent="submit" class="w-4/5">
                                <div>
                                    <InputLabel for="name" value="Name" />

                                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                        autofocus autocomplete="name" />

                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="email" value="Email" />

                                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                                        required autocomplete="username" />

                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="password" value="Password" />

                                    <TextInput id="password" type="password" class="mt-1 block w-full"
                                        v-model="form.password" required autocomplete="new-password" />

                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="password_confirmation" value="Confirm Password" />

                                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                                        v-model="form.password_confirmation" required autocomplete="new-password" />

                                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                                </div>

                                <div class="block mt-4 grid grid-cols-2 w-full">
                                    <Link v-if="canResetPassword" :href="route('password.request')"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 flex justify-end rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Esqueceu sua senha?
                                    </Link>
                                </div>

                                <PrimaryButton class="flex items-center justify-center w-full h-10 mt-16"
                                    :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Register
                                </PrimaryButton>

                                <div class="flex items-center mt-8">

                                    <Link :href="route('login')"
                                        class="underline w-full text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Already registered?
                                    </Link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-image relative">
                    <div class="card-image-text">
                        <h1 class="text-7xl font-extrabold text-amber mb-3 indent-32">Reciclaí</h1>
                        <p class="text-amber indent-32">Login to access your account</p>
                    </div>
                    <div class="waste-management absolute bottom-0 right-0">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- <GuestLayout>

        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                    v-model="form.password_confirmation" required autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout> -->
</template>
<style>
.grafic-color-yellow {
    width: 100vw;
    height: 100vh;
    background-image: url('../../pictures/svg-1.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position-x: 300px;
}

.card-text {
    width: 50vw;
    height: 100vh;
}

.card-image {
    width: 50vw;
    height: 100vh;
}

.card-image-text {
    position: absolute;
    top: 22%;
}

.waste-management {
    /* background-color: red; */
    width: 90%;
    height: 60%;
    background-image: url('../../pictures/Waste management-cuate.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
</style>