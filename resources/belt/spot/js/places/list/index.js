import Table from 'belt/spot/js/places/table';
import heading_html from 'belt/core/js/templates/heading.html';
import index_html from 'belt/spot/js/places/list/template.html';

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
            template: index_html,
        },
    },

    template: `
        <div>
            <heading>
                <span slot="title">Place Manager</span>
            </heading>
            <section class="content">
                <index></index>
            </section>
        </div>
        `
}