import Table from 'belt/spot/js/amenities/helpers/table';

export default {
    namespaced: true,
    state: {
        data: {},
    },
    mutations: {
        data: (state, value) => state.data = value,
    },
    actions: {
        data: (context, value) => context.commit('data', value),
        load: (context, query) => {
            context.commit('data', {});
            let table = new Table({entity_type: context.state.entity_type, entity_id: context.state.entity_id});
            if (query) {
                table.updateQuery(query);
            }
            return new Promise((resolve, reject) => {
                table.index()
                    .then(response => {
                        context.commit('data', response.data);
                        resolve(response);
                    })
                    .catch(error => {
                        reject(error);
                    })
            });
        },
    },
    getters: {
        data: state => state.data,
    }
}