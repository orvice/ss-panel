<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("user-nav.node-list") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-1@xl">
                    <div class="uk-card uk-card-default uk-card-body">
                        <ul uk-accordion>
                            <li v-for="node in nodes">
                                <h3 class="uk-accordion-title"><span class="uk-margin-small-right"
                                                                     uk-icon="icon: table"></span> {{node.name}}</h3>
                                <div class="uk-accordion-content">
                                    <p> {{$t("ss.server_addr")}}: <em>{{node.server}}</em></p>

                                    <p> {{$t("ss.traffic_rate")}}: <span
                                            class="uk-label uk-label-success">{{node.traffic_rate}}</span></p>
                                    <blockquote>{{node.info}}</blockquote>

                                    <div>
                                        <p> {{$t("ss.method")}}: <em>{{node.method}}</em></p>

                                        <div uk-grid
                                             class="uk-child-width-1-1@s uk-child-width-1-3@m uk-child-width-1-4@xl">
                                            <div class="uk-card uk-card-default uk-card-body">
                                                <VueQr :bgSrc='qrBg' :logoSrc="ssLogo" :text="node.ssQr" height="400"
                                                       width="400" colorDark="#000000" colorLight="#ffffff"
                                                       autoColor="true"></VueQr>
                                            </div>
                                            <div class="uk-card uk-card-default uk-card-body">
                                                <VueQr :bgSrc='qrBg' :logoSrc="ssrLogo" :text="node.ssrQr" height="400"
                                                       width="400" colorDark="#000000" colorLight="#ffffff"
                                                       autoColor="true"></VueQr>
                                            </div>
                                        </div>
                                    </div>

                                    <div v-if="node.v2ray_enable">
                                        <h5>-</h5>
                                        <p>
                                            <b>{{$t("ss.v2ray")}}</b>
                                        </p>
                                        <p>
                                            {{$t("ss.v2ray-port")}}: {{node.v2ray_port}}
                                        </p>
                                        <p>
                                            {{$t("ss.v2ray-protocol")}}: {{node.v2ray_protocol}}
                                        </p>
                                        <p>
                                            {{$t("ss.v2ray-uuid")}}:   {{$store.state.user.data.v2ray_uuid}}
                                        </p>
                                        <p>
                                            {{$t("ss.v2ray-alter-id")}}:  {{$store.state.user.data.v2ray_alter_id}}
                                        </p>
                                    </div>

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
    import VueQr from 'vue-qr'
    import rest from '../http/rest'

    export default {
        name: 'Node',
        components: {
            VueQr,
        },
        data() {
            return {
                qrBg: '/assets/img/snow.jpg',
                ssLogo: '/assets/img/ss.png',
                ssrLogo: '/assets/img/ssr.png',
                nodes: [],
            }
        },
        methods: {
            egg() {
                let d = new Date();
                let month = d.getMonth();
                console.log(d);
                console.log(month);
                if (month == 5) {
                    this.qrBg = '/assets/img/flag.png';
                }
            },

        },
        mounted: function () {
            rest.get(`nodes`)
                .then(response => {
                    this.nodes = response.data.data;
                })
                .catch(e => {
                    this.errors.push(e)
                });
            this.qrBg = '';
            this.egg();

        },
    }
</script>