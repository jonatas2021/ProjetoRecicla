<script>
</script>

<template>
    <div class="box-2">
        <div class="grafic-color-blue">
            <div class="block-cont-1 grid grid-cols-2 w-full">
                <div class="content-text flex items-center justify-center">
                    <div class="box-content w-3/4 break-all">
                        <h3 class="text-4xl mb-8 font-medium">Ponto de coleta (mapeamento)</h3>
                        <p class="mb-8">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                        <a href="" class="border border-solid border-newBlue text-center text-white bg-newBlue h-9 flex items-center justify-center w-29 gap-6">Localizar</a>
                        <div class="information-box grid grid-cols-2 grid-rows-2 items-start gap-x-6 items-center">
                            <div class="icon-left w-10 h-10"></div>
                            <div class="icon-right w-10 h-10"></div>
                            <div class="text-box-2">
                                <h5 class="mb-4 font-medium text-xl">Title Goes Here</h5>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            </div>
                            <div class="text-box-2">
                                <h5 class="mb-4 font-medium text-xl">Title Goes Here</h5>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-image flex justify-center items-center">
                    <div class="image-svg w-3/4 h-3/4"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.box-2{
    position: relative;
    top: -150px;
}
.content-image{
    width: 50vw;
    height: 100vh;
}
.icon-right{
    background-image: url('../pictures/Icon.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.icon-left{
    background-image: url('../pictures/Icon.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.image-svg{
    background-image: url('../pictures/Paper-map-rafiki.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.grafic-color-blue{
    width: 100vw;
    height: 100vh;
    /* background-color: rgba(0, 255, 255, 0.4) */
    background-image: url('../pictures/svg-2.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position-x: -340px;
    }
</style>