<template>

    <div class="uk-section-primary tm-section-texture" id="app">

        <Navbar class="uk-navbar-transparent"></Navbar>

        <div class="uk-section uk-section-small uk-flex uk-flex-middle uk-text-center"
             uk-height-viewport="offset-top: true; offset-bottom: true">
            <div class="uk-width-1-1">
                <div class="uk-container">
                    <div class="uk-overflow-auto">
                        <p class="uk-table uk-table-divider">
                            Code
                        </p>

                        <table class="uk-table uk-table-responsive uk-table-divider">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr v-for="code in codes">
                                <td>{{code.id}}</td>
                                <td><a href="#">{{code.code}}</a></td>
                            </tr>
                            </tbody>
                        </table>

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
    import axios from 'axios'
    export default {
        name: 'code',
        components: {
            Navbar,
            Foot
        },
        data () {
            return {
                codes: []
            }
        },
        mounted: function () {
            axios.get("/api/codes")
                .then(response => {
                    this.codes = response.data.data
                })
                .catch(e => {
                    this.errors.push(e)
                })
        },
    }
</script>