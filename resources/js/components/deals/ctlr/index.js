// helpers
import Form from 'belt/spot/js/components/deals/form';
import Table from 'belt/spot/js/components/deals/table';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import index_html from 'belt/spot/js/components/deals/templates/index.html';

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
                    form.service.baseUrl = '/api/v1/deals/?source=' + id;
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
                <span slot="title">Deal Manager</span>
            </heading>
            <section class="content">
                <index></index>
            </section>
        </div>
        `
}