<template>
    <div>
        <a>Language</a>
        <div uk-dropdown>
            <ul class="uk-nav uk-dropdown-nav">
                <li v-for="(v,k) in langs"><a @click="setLang(k)">{{v}}</a></li>
            </ul>
        </div>
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