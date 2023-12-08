<script>
</script>

<template>
    <div class="box-6">
        <div class="footer-box">
            <div class="content-footer-box w-full">
                <div class="footer w-screen flex justify-center items-center flex-col z-10">
                    <div class="moon w-1/2 h-1/2 max-w-screen-sm max-h-screen-sm ml-64"></div>
                    <a href="" class="ml-24 border border-solid border-newBlue rounded text-center text-white bg-newBlue h-9 flex items-center justify-center w-48 gap-6">Volta ao Início</a>
                </div>
                <div class="copyrite absolute bottom-72 ml-24">
                    <p>©2023 Yourcompany</p>
                </div>
                <div class="card-foot absolute w-full h-60">
                    <div class="text-footer absolute ml-24 flex gap-6 mt-5 z-20">
                        <a href="">home</a>
                        <a href="">About</a>
                        <a href="">Contact</a>
                    </div>
                    <div class="network z-20 flex justify-center items-center h-full">
                        <hr class="z-20 w-standard decoration-black mt-20 absolute">
                        <div class="network-icons flex gap-6 justify-end items-end h-full w-full mr-24 mb-10">
                            <div class="facebook bg-red-500 w-10 h-10 "></div>
                            <div class="linkedin bg-blue-500 w-10 h-10"></div>
                            <div class="twitter bg-green-500 w-10 h-10"></div>
                            <div class="youtube bg-yellow-500 w-10 h-10"></div>
                            <div class="instagram bg-orange-500 w-10 h-10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!--
        <div class="footer"></div>
        <div class="moon"></div>
    -->
</template>

<style>
/* .box-6{
    width: 100vw;
    height: 100vh;
} */
.footer{
    /* width: 100vw; */
    height: 110vh;
    position: relative;
    margin-bottom: 0;
    top: -100px;
    background-image: url('../pictures/Rectangle.svg');
    background-position-x: -340px;
    background-size: cover;
    background-repeat: no-repeat;
}
.moon{
    background-image: url('../pictures/Earth-and-Moon-cuate.svg');
    background-size: cover;
    background-repeat: no-repeat;
}
.card-foot{
    bottom: -0px;
    background-color: #E7ECFF;
}
hr{
    border-color: #CDD1D4;
    border-top-width: 2px;
}
.facebook{

}
</style>