const state = {
    inputs: [],
    search: ''
};

const getters = {
    inputs: state => state.inputs,
    search: state => state.search

}

const mutations = {
    setinputs(state, inputs){
        state.inputs = inputs;
    },
    setsearch(state, search){
        state.search = search;
    }
};

const actions = {
    insertactions({ commit }, emoji){
        console.log(emoji);
        let inputs = [];
        // emoji.forEach(emo => {
        //     inputs.push(emo);
        //     state.inputs = inputs
        // });
        inputs = inputs += emoji;
        state.inputs = inputs;

        // console.log(state.inputs)


        commit("setinputs", inputs);

    }
};

export default {
    state,
    getters,
    mutations,
    actions
};