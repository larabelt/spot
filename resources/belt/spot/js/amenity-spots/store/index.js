import Form from 'belt/spot/js/amenity-spots/form';
import Table from 'belt/spot/js/amenity-spots/table';

export default {
    namespaced: true,
    state: {
        data: {},
        entity_id: '',
        entity_type: '',
    },
    mutations: {
        data: (state, value) => state.data = value,
        entity_id: (state, value) => state.entity_id = value,
        entity_type: (state, value) => state.entity_type = value,
    },
    actions: {
        attach: ({dispatch, commit, state}, request) => {
            let form = new Form({entity_type: state.entity_type, entity_id: state.entity_id});
            form.setData({id: request.id, value: request.value});
            return new Promise((resolve, reject) => {
                form.store()
                    .then(response => {
                        dispatch('load');
                        resolve(response);
                    })
                    .catch(error => {
                        reject(error);
                    })
            });
        },
        detach: ({dispatch, commit, state}, request) => {
            let form = new Form({entity_type: state.entity_type, entity_id: state.entity_id});
            return new Promise((resolve, reject) => {
                form.destroy(request.id)
                    .then(response => {
                        dispatch('load');
                        resolve(response);
                    })
                    .catch(error => {
                        reject(error);
                    })
            });
        },
        data: (context, value) => context.commit('data', value),
        load: (context) => {
            context.commit('data', {});
            let table = new Table({entity_type: context.state.entity_type, entity_id: context.state.entity_id});
            return new Promise((resolve, reject) => {
                table.index()
                    .then(response => {
                        context.commit('data', response);
                        resolve(response);
                    })
                    .catch(error => {
                        reject(error);
                    })
            });
        },
        set: (context, options) => {
            if (options.entity_type) {
                context.commit('entity_type', options.entity_type);
            }
            if (options.entity_id) {
                context.commit('entity_id', options.entity_id);
            }
        },
    },
    getters: {
        data: state => state.data,
    }
}