<template>
    <div class="bg-light">
        <nav class="bg-white navbar navbar-expand-lg navbar-light">
        <a class="mt-0 ml-4 justify-content-center navbar-brand font-weight-bold font-smaller" href="#">Where in the world?</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="mr-auto navbar-nav">
                <li class="nav-item active">
                    <router-link  to="/" class="nav-item nav-link">
                    <!-- Home -->
                    </router-link>
                </li>
                </ul>

            </div>
        </div></nav>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {}
</script>
