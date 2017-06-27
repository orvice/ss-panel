<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("user-nav.dashboard") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-4@xl">
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <span class="statistics-text">New Registrations</span><br />
                            <span class="statistics-number">
                                    14.164
                                    <span class="uk-label uk-label-success">
                                        8% <span class="ion-arrow-up-c"></span>
                                    </span>
                                </span>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <span class="statistics-text">Website Traffic</span><br />
                            <span class="statistics-number">
                                    123.238
                                    <span class="uk-label uk-label-danger">
                                        13% <span class="ion-arrow-down-c"></span>
                                    </span>
                                </span>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <span class="statistics-text">Total Invoices</span><br />
                            <span class="statistics-number">
                                    2.316
                                    <span class="uk-label uk-label-success">
                                        37% <span class="ion-arrow-up-c"></span>
                                    </span>
                                </span>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <span class="statistics-text">Total Income</span><br />
                            <span class="statistics-number">
                                    6.384€
                                    <span class="uk-label uk-label-success">
                                        26% <span class="ion-arrow-up-c"></span>
                                    </span>
                                </span>
                        </div>
                    </div>
                </div>
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@l">
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header">
                                Website Traffic
                            </div>
                            <div class="uk-card-body">
                                <canvas id="chart1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default">
                            <div class="uk-card-header">
                                Website Traffic
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