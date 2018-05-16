// helpers
import Table from 'belt/spot/js/amenities/table';

// templates make a change

import index_html from 'belt/spot/js/amenities/templates/index.html';

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
            template: index_html,
        },
    },

    template: `
        <div>
            <heading>
                <span slot="title">Amenity Manager</span>
            </heading>
            <section class="content">
                <index></index>
            </section>
        </div>
        `
}