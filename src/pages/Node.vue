<template>

    <div>
        <div ref="container">
            <div class="uk-width-1-1">
                <div class="uk-container">
                    <div class="uk-overflow-auto">
                        <p class="uk-table uk-table-divider">
                            {{ $t("nav.invite-code") }}
                        </p>

                        <table class="uk-table uk-table-responsive uk-table-divider">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ $t("nav.invite-code") }}</th>
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
    import VueQr from 'vue-qr'
    export default {
        name: 'Node',
        components: {
            VueQr,
        },
        data () {
            return {
                codes: []
            }
        },
        mounted: function () {
        },
    }
</script>