<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("user-nav.dashboard") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-1@xl">

                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import rest from '../http/rest'
    export default {
        name: 'Blank',
        components: {
        },
        data () {
            return {
                nodes: []
            }
        },
        mounted: function () {
        },
    }
</script>