<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Drawn_box1 from "../Components/svg-1.vue"
import Drawn_box2 from "../Components/svg-2.vue"
import Drawn_box3 from "../Components/svg-3.vue"
import Drawn_box4 from "../Components/svg-4.vue"
import Team from "../Components/Team.vue"
import Footer from "../Components/footer.vue"
// import Style from "../../css/style.css"

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="nav">
        <div v-if="canLogin" class="sm:position:relative sm:top-0 sm:right-0 p-6 text-right">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >Dashboard</Link
                        >
                
                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="font-semibold text-black-600 hover:text-black-900 dark:text-black-400 dark:hover:text-gray-600 transition duration-1000 rounded-lg p-2 hover:bg-amber focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >Log in</Link
                            >
                
                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="ml-4 font-semibold text-black-600 hover:text-black-900 dark:text-black-400 dark:hover:text-gray-500 transition duration-1000 rounded-lg p-2 hover:bg-amber focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >Register</Link
                            >
                        </template>
        </div>
    </div>
    <div class="main">
        <Drawn_box1></Drawn_box1>
        <Drawn_box2></Drawn_box2>
        <Drawn_box3></Drawn_box3>
        <Drawn_box4></Drawn_box4>
        <Team></Team>
        <Footer></Footer>
    </div>
    
</template>

<style>
*{
    margin: 0;
    padding: 0;
}
body, html {
  min-height: 100%;
}

.nav{
    position: absolute;
    z-index: 1;
    width: 100vw;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;

}
.main{
    position: relative;
}
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
