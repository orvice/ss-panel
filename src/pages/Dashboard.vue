<template>

    <div class="uk-offcanvas-content">

        <Navbar class="uk-navbar-transparent"></Navbar>

        <div class="tm-sidebar-left uk-visible@m">

            <h3>Documentation</h3>

            <ul class="uk-nav uk-nav-default tm-nav" :class="{ 'uk-margin-top': index }" v-for="(pages, category, index) in navigation">
                <li class="uk-nav-header">{{category}}</li>
                <router-link tag="li" :to="p" :key="p" v-for="(p, label) in pages" exact><a>{{label}}</a></router-link>
            </ul>

        </div>

        <div class="tm-main uk-section uk-section-default">
            <div class="uk-container uk-container-small uk-position-relative">

                <div>
                    <div class="uk-alert uk-alert-danger" v-if="error">{{ error }}</div>
                    <div ref="container"></div>
                </div>

                <div class="tm-sidebar-right uk-visible@l">
                    <div uk-sticky="offset: 160">

                        <ul class="uk-nav uk-nav-default tm-nav uk-nav-parent-icon" uk-scrollspy-nav="closest: li; scroll: true; offset: 100">
                            <li v-for="(id, subject) in ids">
                                <a :href="'#'+id">{{ subject }}</a>
                            </li>
                            <li class="uk-nav-divider"></li>
                            <li v-if="component">
                                <a :href="'../assets/uikit/tests/'+component+'.html'" target="_blank">
                                    <span class="uk-margin-small-right" uk-icon="icon: push"></span>
                                    <span class="uk-text-middle">Open test</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/uikit/uikit/issues" target="_blank">
                                    <span class="uk-margin-small-right" uk-icon="icon: warning"></span>
                                    <span class="uk-text-middle">Report issue</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://gitter.im/uikit/uikit" target="_blank">
                                    <span class="uk-margin-small-right" uk-icon="icon: commenting"></span>
                                    <span class="uk-text-middle">Get help</span>
                                </a>
                            </li>
                            <li>
                                <a :href="'https://github.com/uikit/uikit-site/tree/develop/docs/pages/'+page+'.md'" target="_blank">
                                    <span class="uk-margin-small-right" uk-icon="icon: pencil"></span>
                                    <span class="uk-text-middle">Edit this page</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

        <div id="offcanvas" uk-offcanvas="mode: push; overlay: true">
            <div class="uk-offcanvas-bar">
                <div class="uk-panel">

                    <ul class="uk-nav uk-nav-default tm-nav">
                        <li class="uk-nav-header">General</li>
                        <li><a href="../index">Home</a></li>
                        <li><a href="../pro">Pro</a></li>
                        <li><a href="../changelog">Changelog</a></li>
                        <li><a href="../download">Download</a></li>
                    </ul>

                    <ul class="uk-nav uk-nav-default tm-nav uk-margin-top" v-for="(pages, category, index) in navigation">
                        <li class="uk-nav-header">{{category}}</li>
                        <li v-for="(p, label) in pages" exact><a :href="'./'+p">{{label}}</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    import Navbar from '../components/Navbar.vue'
    import Foot from '../components/Foot.vue'
    import axios from 'axios'
    export default {
        name: 'dashboard',
        components: {
            Navbar,
            Foot
        },
        data () {
            return {
                codes: []
            }
        },
        mounted: function () {
            axios.get("/api/codes")
                .then(response => {
                    this.codes = response.data.data
                })
                .catch(e => {
                    this.errors.push(e)
                })
        },
    }
</script>