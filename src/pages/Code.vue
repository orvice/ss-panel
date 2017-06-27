<template>
    <div class="container">
        <div class="content-center">
            <h1 class="title text-center"> {{ $t("nav.invite-code") }}</h1>

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

</template>

<script>
    import http from '../http/base'
    export default {
        name: 'code',
        components: {},
        data () {
            return {
                codes: []
            }
        },
        mounted: function () {
            http.get("codes")
                .then(response => {
                    this.codes = response.data.data
                })
                .catch(e => {
                    this.errors.push(e)
                })
        },
    }
</script>