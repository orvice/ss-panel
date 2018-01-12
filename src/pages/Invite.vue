<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("user-nav.invite-friend") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-body">

                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary" @click="genCodes" v-if="canInvite">
                                {{$t("user-index.gen-invite-code")}}
                            </button>
                        </div>


                        <table class="uk-table uk-table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{$t("nav.invite-code")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="code in data.data">
                                <td>#{{code.id}}</td>
                                <td>{{code.code}}</td>
                            </tr>
                            </tbody>
                        </table>


                        <pagination :data="data" v-on:pagination-change-page="Results"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import rest from '../http/rest'
    import pagination from 'laravel-vue-pagination-uikit'
    export default {
        name: 'Invite',
        components: {
            pagination,
        },
        methods: {
            Results(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }

                rest.get(`inviteCodes?page=` + page)
                    .then(response => {
                        this.data = response.data;
                        this.logs = response.data.data;
                    })
                    .catch(e => {
                    })
            },
            genCodes(){
                rest.post(`inviteCodes`)
                    .then(response => {
                        UIkit.notification({
                            message: this.$t('base.success'),
                            status: 'primary',
                            pos: 'top-center',
                            timeout: 5000
                        });
                        this.Results();
                        this.canInvite = false;
                    })
                    .catch(e => {
                    })
            },
        },
        data () {
            return {
                data: {},
                canInvite: false,
            }
        },
        mounted: function () {
            this.Results();
            if(this.$store.state.user.data.invite_num > 0){
                this.canInvite = true;
            }
        },
    }
</script>