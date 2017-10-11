import row from 'belt/spot/js/amenities/table/row';
import filterSearch from 'belt/core/js/inputs/filter-search';
import Form from 'belt/spot/js/amenities/helpers/form';
import Table from 'belt/spot/js/amenities/helpers/table';
import html from 'belt/spot/js/amenities/table/template.html';

export default {
    props: {
        name: {default: 'admin.amenities'},
        mode: {default: 'admin'},
        query: {default: function() {
            return {};
        }},
    },
    data() {
        return {
            loading: false,
            moving: new Form(),
            table: new Table({router: this.$router}),
            morphable_type: 'amenities',
            morphable_id: null,
        }
    },
    methods: {
        filter: _.debounce(function (query) {
            if (query) {
                query.page = 1;
                this.table.updateQuery(query);
            }
            this.table.index()
                .then(() => {
                    this.table.pushQueryToHistory();
                    if (this.mode == 'admin') {
                        this.table.pushQueryToRouter();
                    }
                });
        }, 500),
    },
    mounted() {

        this.table.name = this.name;
        this.table.updateQueryFromHistory();
        this.table.updateQuery(this.query);

        if (this.mode == 'admin') {
            this.table.updateQueryFromRouter();
            this.table.pushQueryToRouter();
        }

        this.loading = true;
        this.table.index()
            .then(() => {
                this.loading = false;
            });
    },
    components: {
        filterSearch,
        row,
    },
    template: html,
}