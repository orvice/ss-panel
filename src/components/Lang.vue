<template>
    <div>
        <ul class="uk-navbar-nav">
            <li class="uk-active">
                <a href="#"> <span class="uk-margin-small-right" uk-icon="icon: world"></span> Language <span class="ion-ios-arrow-down"></span></a>
                <div uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                    <ul class="uk-nav uk-dropdown-nav">
                        <li v-for="(v,k) in langs"><a @click="setLang(k)">{{v}}</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import * as types from '../store/types'
    import {langs} from '../lang'
    export default {
        data () {
            return {
                lang: this.$store.state.lang, // get lang 預設值 `en`
                langs: langs,
            }
        },
        methods: {
            setLang(lang){
                console.log("set lang " + lang);
                sessionStorage.setItem('lang',lang);
                this.$store.commit(types.ChangeLocale, lang);
            }
        },
    }
</script>