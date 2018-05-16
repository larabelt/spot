import filterPriority from 'belt/core/js/inputs/priority/filter';
import filterSearch from 'belt/core/js/inputs/filter-search';
import Form from 'belt/spot/js/events/form';
import Table from 'belt/spot/js/events/table';
import datetime from 'belt/core/js/mixins/datetime';
import datetimeInput from 'belt/core/js/inputs/datetime';

import index_html from 'belt/spot/js/events/templates/index.html';

export default {
    components: {

        index: {
            mixins: [datetime],
            data() {
                return {
                    table: new Table({router: this.$router}),
                }
            },
            mounted() {
                this.table.updateQueryFromRouter();
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
                            //this.table.pushQueryToHistory();
                            this.table.pushQueryToRouter();
                        });
                }, 750),
                copy(id) {
                    let form = new Form();
                    form.service.baseUrl = '/api/v1/events/?source=' + id;
                    form.router = this.$router;
                    form.submit();
                }
            },
            components: {
                datetimeInput,
                filterPriority,
                filterSearch,
            },
            template: index_html,
        },
    },

    template: `
        <div>
            <heading>
                <span slot="title">Event Manager</span>
            </heading>
            <section class="content">
                <index></index>
            </section>
        </div>
        `
}