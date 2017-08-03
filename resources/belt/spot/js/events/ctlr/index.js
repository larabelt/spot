// helpers
import Form from 'belt/spot/js/events/form';
import Table from 'belt/spot/js/events/table';
import datetime from 'belt/core/js/mixins/datetime';
import datetimeInput from 'belt/core/js/inputs/datetime';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import index_html from 'belt/spot/js/events/templates/index.html';

export default {
    components: {
        heading: {template: heading_html},
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
                copy(id) {
                    let form = new Form();
                    form.service.baseUrl = '/api/v1/events/?source=' + id;
                    form.router = this.$router;
                    form.submit();
                }
            },
            components: {datetimeInput},
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