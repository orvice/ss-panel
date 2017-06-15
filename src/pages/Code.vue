<template>

    <div class="uk-section-primary tm-section-texture">

        <Navbar class="uk-navbar-transparent"></Navbar>

        <div class="uk-section uk-section-small uk-flex uk-flex-middle uk-text-center"
             uk-height-viewport="offset-top: true; offset-bottom: true">
            <div class="uk-width-1-1">
                <div class="uk-container">

                    <p class="uk-margin-medium uk-text-lead">
                       Code
                    </p>

                </div>
            </div>
        </div>

       <Foot></Foot>

    </div>

</template>

<script>
    import Navbar from '../components/Navbar.vue'
    import Foot from '../components/Foot.vue'
    export default {
        name: 'code',
        components: {
            Navbar,
            Foot
        }
    }
</script>