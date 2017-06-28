<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("user-nav.dashboard") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-3@m uk-child-width-1-4@xl">
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <span class="statistics-text">{{$t("ss.traffic_total")}}</span><br />
                            <span class="statistics-number">
                                    {{$store.state.user.traffic.total}}
                                </span>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <span class="statistics-text">{{$t("ss.traffic_used")}}</span><br />
                            <span class="statistics-number">
                                   {{$store.state.user.traffic.used}}
                                </span>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <span class="statistics-text">{{$t("ss.traffic_unused")}}</span><br />
                            <span class="statistics-number">
                                    {{$store.state.user.traffic.unused}}
                                </span>
                        </div>
                    </div>
                </div>
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@l">
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header">
                                {{$t("user-index.checkin")}}
                            </div>
                            <div class="uk-card-body">
                                <canvas id="chart1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header">
                               {{$t("user-index.connection-info")}}
                            </div>
                            <div class="uk-card-body">
                                <canvas id="chart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from 'axios'
    import rest from '../http/rest'
    export default {
        name: 'Dashboard',
        components: {
        },
        data () {
            return {
                data: []
            }
        },
        mounted: function () {

        },
    }
</script>