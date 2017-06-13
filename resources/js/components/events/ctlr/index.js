// helpers
import Form  from '../form';
import Table from '../table';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import index_html from '../templates/index.html';

export default {

    components: {
        heading: {template: heading_html},
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
                copy(id) {
                    let form = new Form();
                    form.service.baseUrl = '/api/v1/events/?source=' + id;
                    form.router = this.$router;
                    form.submit();
                }
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