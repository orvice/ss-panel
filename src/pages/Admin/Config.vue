<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("admin-nav.config") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-4@xl">

                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import rest from '../../http/rest'
    import admin from '../../http/admin'
    export default {
        name: 'Config',
        components: {
        },
        data () {
            return {
                cfgs: {},
            }
        },
        methods:{
          getCfgs(){
            admin.get('config')
                .then(response => {
                })
                .catch(e => {
                })
          },
        },
        mounted: function () {
            this.getCfgs();
        },
    }
</script>