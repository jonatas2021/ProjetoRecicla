<script>
</script>

<template>
    <div class="box-1 sm:position:relative right-0">
        <div class="grafic-color-yellow">
            <div class="card-box w-full grid grid-cols-2">
                <div class="card-text flex items-center justify-center">
                    <div class="text-box w-3/4 break-all">
                        <h2 class="text-6xl font-extrabold mb-24">Introdução</h2>
                        <p class="break-words">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                        <div class="box-btn grid grid-cols-2 w-3/4 mt-16 gap-6">
                            <a href="" class="border border-solid border-amber text-center bg-amber h-9 flex items-center justify-center transition duration-1000 rounded-sm focus:outline-red-500">Ponto de coleta</a>
                            <a href="" class="border-2 border-solid border-black text-center h-9 flex items-center justify-center transition duration-1000 rounded-sm focus:outline focus:outline-2 focus:outline-red-500">Sobre</a>
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
</template>

<style>
.grafic-color-yellow{
    width: 100vw;
    height: 100vh;
    background-image: url('../pictures/svg-1.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position-x: 300px;
}
.card-text{
    width: 50vw;
    height: 100vh;
}
.card-image{
    width: 50vw;
    height: 100vh;
}
.card-image-text{
    position: absolute;
    top: 22%;
}
.waste-management{
    /* background-color: red; */
    width: 90%;
    height: 60%;
    background-image: url('../pictures/Waste management-cuate.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
</style>