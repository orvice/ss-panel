<template>

    <div class="uk-navbar-container tm-navbar-container" uk-sticky="media: 960">
        <div class="uk-container uk-container-expand">
            <nav class="uk-navbar">

                <div class="uk-navbar-left">

                    <router-link class="uk-navbar-item uk-logo" to="/">
                        <canvas class="uk-margin-small-right" width="28" height="34" uk-svg
                                :src="'./images/uikit-logo.svg'"></canvas>
                        {{title}}

                    </router-link>

                </div>

                <div class="uk-navbar-right">

                    <ul class="uk-navbar-nav uk-visible@m">
                        <router-link to="/" tag="li"><a>Home</a></router-link>
                        <router-link to="/code" tag="li"><a>Code</a></router-link>
                        <router-link to="/tos" tag="li"><a>Tos</a></router-link>
                    </ul>

                    <div class="uk-navbar-item uk-visible@m">
                        <router-link class="uk-button uk-button-default tm-button-default uk-icon" to="/download"
                                     activeClass="page-active">Download
                            <canvas uk-icon="icon: download" width="20" height="20"></canvas>
                        </router-link>
                    </div>

                    <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#offcanvas" uk-toggle></a>

                </div>

            </nav>
        </div>
    </div>

</template>
<script>
    import axios from 'axios'
    import config from '../res/config'
    export default {
        name: 'Navbar',
        data () {
            return {
                title: 'Panel',
                posts: []
            }
        },
        mounted: function () {
            console.log(config);
            this.title = config.app
        }
    }
</script>

<style lang="sass">
    // 1. Your custom variables and variable overwrites.
    $global-link-color: #DA7D02

    // 2. Import default variables and available mixins.
    @import "../assets/scss/variables-theme.scss"
    @import "../assets/scss/mixins-theme.scss"

    // 3. Your custom mixin overwrites.
    // @mixin hook-card() { color: #000 }

    // 4. Import UIkit.
    @import "../assets/scss/uikit-theme.scss"
</style>