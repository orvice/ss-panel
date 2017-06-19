<template>

    <div>
        <div ref="container">
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
    </div>

</template>

<script>
    import axios from 'axios'
    export default {
        name: 'code',
        components: {},
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