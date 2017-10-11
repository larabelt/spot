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
            let table = new Table({morphable_type: context.state.morphType, morphable_id: context.state.morphID});
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