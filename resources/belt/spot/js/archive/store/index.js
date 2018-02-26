import config from 'belt/core/js/configs/store/local';
import params from 'belt/core/js/paramables/store';

/**
 * Places
 */
export default {
    namespaced: true,
    modules: {
        config,
        params,
    },
    state: {
        data: {},
    },
    mutations: {
        config: (state, value) => state.config = value,
        data: (state, value) => state.data = value,
    },
    actions: {
        config: (context, value) => context.commit('config', value),
        construct: ({dispatch, commit}, options) => {
            dispatch('config/set', {morphType: 'places'});
            dispatch('params/set', {morphType: 'places', morphID: options.id});
        },
        data: (context, value) => context.commit('data', value),
        load: ({dispatch, commit}, place) => {
            commit('data', place.data());
            dispatch('config/set', {configKey: place.template});
            dispatch('config/load');
        },
    },
    getters: {
        config: state => state.config,
        data: state => state.data,
    }
};