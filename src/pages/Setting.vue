<template>

    <div class="content-padder content-background">
        <div class="uk-section-small uk-section-default header">
            <div class="uk-container uk-container-large">
                <h3><span class="ion-speedometer"></span> {{ $t("base.setting") }} </h3>
            </div>
        </div>
        <div class="uk-section-small">
            <div class="uk-container uk-container-large">
                <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@m uk-child-width-1-4@xl">
                    <div class="uk-card uk-card-default uk-card-body">

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-text">{{$t("ss.password")}}</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-horizontal-text" type="text"
                                       v-model="password">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-select">{{$t("ss.method")}}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" id="form-horizontal-select">
                                    <option v-for="m in methods" :value="m">{{m}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-select">{{$t("ss.obfs-protocol")}}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" id="form-horizontal-select">
                                    <option v-for="m in protocol" :value="m">{{m}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-horizontal-select">{{$t("ss.obfs-plugin")}}</label>
                            <div class="uk-form-controls">
                                <select class="uk-select" id="form-horizontal-select">
                                    <option v-for="m in obfs" :value="m">{{m}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary" @click="update">
                                {{$t("base.update")}}
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import rest from '../http/rest'
    import http from '../http/base'
    export default {
        name: 'Setting',
        components: {},
        data () {
            return {
                data: {},
                methods: {},
                protocol: {},
                obfs: {},

                // From
                password: this.$store.state.user.data.passwd,
            }
        },
        methods: {
            initData(){
                http.get('config/ss')
                    .then(response => {
                        const data = response.data.data;
                        this.methods = data.methods;
                        this.protocol = data.protocol;
                        this.obfs = data.obfs;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            },
            update(){
                console.log("update");
            },
        },
        mounted: function () {
            this.initData();
        },
    }
</script>