

import Form from 'belt/spot/js/places/form';
import Table from 'belt/spot/js/places/table';

import index_html from 'belt/spot/js/places/list/template.html';

export default {

    components: {

        index: {
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
                    form.service.baseUrl = '/api/v1/places/?source=' + id;
                    form.router = this.$router;
                    form.submit();
                }
            },
            components: {


            },
            template: index_html,
        },
    },

    template: `
        <div>
            <heading>
                <span slot="title">Place Manager</span>
                <li><router-link :to="{ name: 'places' }">Place Manager</router-link></li>
            </heading>
            <section class="content-subheader">
                <p class="text-muted">{{ trans('belt-spot::places.manager.overall') }}</p>
            </section>
            <section class="content">
                <index></index>
            </section>
        </div>
        `
}