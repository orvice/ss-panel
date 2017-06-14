<template>

    <div class="uk-section-primary tm-section-texture">

        <Navbar class="uk-navbar-transparent"></Navbar>

        <div class="uk-section uk-section-small uk-flex uk-flex-middle uk-text-center"
             uk-height-viewport="offset-top: true; offset-bottom: true">
            <div class="uk-width-1-1">
                <div class="uk-container">

                    <p>
                        <img :src="'./images/uikit-logo-large.svg'">
                    </p>

                    <p class="uk-margin-medium uk-text-lead">
                        A lightweight and modular front-end framework<br class="uk-visible@s">
                        for developing fast and powerful web interfaces.
                    </p>

                    <div class="uk-child-width-auto uk-grid-medium uk-flex-inline uk-flex-center" uk-grid>
                        <div>
                            <a class="uk-button uk-button-primary tm-button-primary uk-button-large tm-button-large uk-visible@s"
                               href="./docs">Get Started</a>
                            <a class="uk-button uk-button-primary tm-button-primary uk-hidden@s" href="./docs">Get Started</a>
                        </div>
                        <div>
                            <a class="uk-button uk-button-default tm-button-default uk-button-large tm-button-large uk-visible@s"
                               href="https://github.com/uikit/uikit">Github</a>
                            <a class="uk-button uk-button-default tm-button-default uk-hidden@s"
                               href="https://github.com/uikit/uikit">Github</a>
                        </div>
                    </div>

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
        name: 'app',
        components: {
            Navbar,
            Foot
        }
    }
</script>