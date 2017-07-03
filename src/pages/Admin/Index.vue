<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span>  {{ $t("user-nav.admin-panel") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-4@xl">
                    <div class="uk-card uk-card-default uk-card-body">



                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import admin from '../../http/admin'
    export default {
        name: 'AdminPanel',
        components: {
        },
        data () {
            return {
                data: {},
            }
        },
        methods: {

        },
        mounted: function () {
        },
    }
</script>