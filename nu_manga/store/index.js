import Vuex from 'vuex'
import actions from './action'
import createPersistedState from 'vuex-persistedstate'


const createStore = () => {
    return new Vuex.Store({
        state: function(){
            return {
                message: '',
                type: '',
                status: false,
            }
        },
        getters: {
            message: (state) => state.message,
            type: (state) => state.type,
            status: (state) => state.status
        },

        mutations: {
            setMessage(state, message){
                state.message = message
            },
            setType(state, type){
                state.type = type
            },
            setStatus(state, bool){
                state.status = bool
            },
        },

        actions: {
            showMessage({ commit }, { message, type, status}){
                commit("setMessage", message)
                commit("setType", type)
                commit("setStatus", status)
                setTimeout(() => {
                    commit("setStatus", !status)
                }, 1000)
            },
        },

        modules: {
            actions
        },
        // `createPersistedState()`でインスタンス作成。引数に設定を書く
        plugins: [createPersistedState(
            {
                key: 'inputs',
                paths: [
                    'actions.inputs',
                  ],
                storage: window.sessionStorage
            }
            
        )]
    })
}

export default createStore