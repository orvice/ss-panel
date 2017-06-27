<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("user-nav.node-list") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-4@xl">
                    <div class="uk-card uk-card-default uk-card-body">
                        <ul uk-accordion>
                            <li v-for="node in nodes">
                                <h3 class="uk-accordion-title"><span class="uk-margin-small-right"
                                                                     uk-icon="icon: table"></span> {{node.name}}</h3>
                                <div class="uk-accordion-content">
                                    <p> {{$t("ss.server_addr")}}: <em>{{node.server}}</em></p>
                                    <p> {{$t("ss.method")}}: <em>{{node.method}}</em></p>
                                    <blockquote>{{node.info}}</blockquote>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import axios from 'axios'
    import VueQrcode from 'vue-qrcode'
    import rest from '../http/rest'
    export default {
        name: 'Node',
        components: {
            VueQrcode,
        },
        data () {
            return {
                nodes: []
            }
        },
        mounted: function () {
            rest.get(`nodes`)
                .then(response => {
                    this.nodes = response.data.data;
                })
                .catch(e => {
                    this.errors.push(e)
                })
        },
    }
</script>