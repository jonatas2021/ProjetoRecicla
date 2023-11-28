<script>
</script>

<template>
    <div class="box-1 sm:position:relative right-0">
        <div class="grafic-color-yellow">
            <div class="card-box w-full grid grid-cols-2">
                <div class="card-text">
                    <div class="text-box">
                        <h1>lorem ipsum</h1>
                        <p class="break-words">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem adipisci molestias iure, doloremque natus corporis officiis vel itaque corrupti. Dignissimos quia porro autem laboriosam aperiam rem pariatur facere iusto repellendus!</p>
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