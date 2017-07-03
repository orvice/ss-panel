import Vue from 'vue'
import Vuex from 'vuex'
import * as types from './types'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        token: null,
        isLogin: false,
        id: 0,
        lang: 'en',
        user: {
            data: {
                email: '',
            }
        },
    },
    mutations: {
        [types.Login]: (state, user) => {
            sessionStorage.token = user.token;
            sessionStorage.id = user.id;
            state.token = user.token;
            state.isLogin = true;
            state.id = user.id;
        },
        [types.ChangeLocale]: (state, locale) => {
            state.lang = locale;
            Vue.config.lang = state.lang;
        },
        [types.StoreUser]: (state, user) => {
            state.user = user;
        },
    },
    modules: {},

})