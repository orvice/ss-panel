import Vue from 'vue'
import Vuex from 'vuex'
import * as types from './types'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        token: null,
        isLogin: false,
    },
    mutations: {
        [types.Login]: (state, token) => {
            sessionStorage.token = token;
            state.token = token;
            state.isLogin = true;
        },
    },
    modules: {},

})