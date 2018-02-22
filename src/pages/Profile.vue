<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("user-nav.my-profile") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-body">
                        <p>{{$t('auth.email')}}: <em>{{user.data.email}}</em></p>
                        <p>{{$t('auth.username')}}: <em>{{user.data.user_name}}</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import rest from '../http/rest'
    export default {
        name: 'Profile',
        components: {},
        data () {
            return {
                user: []
            }
        },
        mounted: function () {
            this.user = this.$store.state.user;
            console.log(user);
        },
    }
</script>