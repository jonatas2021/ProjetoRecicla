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
                        <a href="" class="dark:hover:text-gray-600 transition duration-1000 rounded-lg p-2 hover:bg-amber focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        <a href="" class="dark:hover:text-gray-600 transition duration-1000 rounded-lg p-2 hover:bg-amber focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">About</a>
                        <a href="" class="dark:hover:text-gray-600 transition duration-1000 rounded-lg p-2 hover:bg-amber focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Contact</a>
                    </div>
                    <div class="network z-20 flex justify-center items-center h-full">
                        <hr class="z-20 w-standard decoration-black mt-20 absolute">
                        <div class="network-icons flex gap-6 justify-end items-end h-full w-full mr-24 mb-10">
                            <a href="" class="facebook w-10 h-10 "></a>
                            <a href="" class="linkedin w-10 h-10"></a>
                            <a href="" class="twitter w-10 h-10"></a>
                            <a href="" class="youtube w-10 h-10"></a>
                            <a href="" class="instagram w-10 h-10"></a>
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
    width: 100vw;
    height: 110vh;
    position: relative;
    margin-bottom: 0;
    top: -100px;
    background-image: url('../pictures/Rectangle.svg');
    background-position-x: -200px;
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
    background-image: url('../pictures/facebook-icon.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.linkedin{
    background-image: url('../pictures/linkedin-icon.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.twitter{
    background-image: url('../pictures/twitter-icon.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.youtube{
    background-image: url('../pictures/youtube-icon.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
.instagram{
    background-image: url('../pictures/Instagram-icon.svg');
    background-size: 100% 100%;
    background-repeat: no-repeat;
}
</style>