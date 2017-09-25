import config from 'belt/core/js/configs/store/local';
import params from 'belt/core/js/paramables/store';

/**
 * Events
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
            dispatch('config/set', {morphType: 'events'});
            dispatch('params/set', {morphType: 'events', morphID: options.id});
        },
        data: (context, value) => context.commit('data', value),
        load: ({dispatch, commit}, event) => {
            commit('data', event.data());
            dispatch('config/set', {configKey: event.template});
            dispatch('config/load');
        },
    },
    getters: {
        config: state => state.config,
        data: state => state.data,
    }
};