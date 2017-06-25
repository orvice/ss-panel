<template>

    <div>
        <div ref="container">
            <div class="uk-width-1-1">
                <div class="uk-container">
                    <div class="uk-overflow-auto">
                        <h1 class="uk-table uk-table-divider">
                            {{ $t("user-nav.node-list") }}
                        </h1>

                        <div class="table-responsive">
                            <ul uk-accordion >
                                <li v-for="node in nodes" >
                                    <h3 class="uk-accordion-title"><span class="uk-margin-small-right"
                                                                         uk-icon="icon: table"></span> {{node.name}}</h3>
                                    <div class="uk-accordion-content">
                                        <p> {{$t("ss.server_addr")}}: <em>{{node.server}}</em>   </p>
                                        <p> {{$t("ss.method")}}: <em>{{node.method}}</em>   </p>
                                        <blockquote>{{node.info}}</blockquote>
                                    </div>
                                </li>

                            </ul>
                        </div>

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