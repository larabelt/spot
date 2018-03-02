import edit from 'belt/spot/js/events/edit/shared';
import filterSearch from 'belt/spot/js/inputs/filter-search';
import filterType from 'belt/spot/js/events/edit/related/filters/type';
import Table from 'belt/spot/js/events/edit/related/table';
import rowItem from 'belt/spot/js/events/edit/related/row-item';
import html from 'belt/spot/js/events/edit/related/template.html';

export default {
    mixins: [edit],
    components: {
        edit: {
            props: {
                morphable_type: {
                    default: function () {
                        return this.$parent.morphable_type;
                    }
                },
                morphable_id: {
                    default: function () {
                        return this.$parent.morphable_id;
                    }
                },
            },
            data() {
                return {
                    table: new Table({
                        morphable_type: 'events',
                        morphable_id: this.morphable_id,
                    }),
                }
            },
            mounted() {
                this.table.index();
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
                            this.table.pushQueryToRouter();
                        });
                }, 300),
            },
            components: {
                filterSearch,
                filterType,
                rowItem,
            },
            template: html
        },
    },
}