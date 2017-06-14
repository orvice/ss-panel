<template>
    <div id="app">
        <Nav></Nav>
        <div  class="wrapper">
            <div class="page-header clear-filter" filter-color="orange">
                <div class="page-header-image" data-parallax="true" style="background-image: url('/assets/now/img/header.jpg');">
                </div>
                <div class="container">
                    <div class="content-center">
                        <h1 class="title text-center">Components Documentation</h1>
                        <h3 class="category">v1.0.0</h3>
                        <h4 class="description text-center">We are constantly doing updates for you. Please check the online documentation.</h4>
                        <a href="http://demos.creative-tim.com/now-ui-kit/documentation/tutorial-components.html?ref=nuk-free-doc" class="btn btn-primary btn-lg btn-round">View Documentation</a>
                    </div>
                </div>
            </div>
            <Foot></Foot>
        </div>
    </div>
</template>
<script>
    import Nav from './Nav.vue'
    import Foot from './Foot.vue'
    export default {
        name: 'app',
        components: {
            Nav,
            Foot
        }
    }
</script>