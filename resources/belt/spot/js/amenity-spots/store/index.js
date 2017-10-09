import Form from 'belt/spot/js/amenity-spots/form';
import Table from 'belt/spot/js/amenity-spots/table';

export default {
    namespaced: true,
    state: {
        data: {},
        morphID: '',
        morphType: '',
    },
    mutations: {
        data: (state, value) => state.data = value,
        morphID: (state, value) => state.morphID = value,
        morphType: (state, value) => state.morphType = value,
    },
    actions: {
        attach: ({dispatch, commit, state}, request) => {
            let form = new Form({morphable_type: state.morphType, morphable_id: state.morphID});
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
            let form = new Form({morphable_type: state.morphType, morphable_id: state.morphID});
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
            let table = new Table({morphable_type: context.state.morphType, morphable_id: context.state.morphID});
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
            if (options.morphType) {
                context.commit('morphType', options.morphType);
            }
            if (options.morphID) {
                context.commit('morphID', options.morphID);
            }
        },
    },
    getters: {
        data: state => state.data,
    }
}