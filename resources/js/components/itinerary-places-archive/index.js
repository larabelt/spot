import edit from './edit';

// helpers
import Form from './form';
import Table from './table';

// templates
import index_html from './templates/index.html';

export default {
    data() {
        return {
            morphable_type: 'itineraries',
            morphable_id: this.$parent.morphable_id,
            detached: new Table({
                morphable_id: this.$parent.morphable_id,
                query: {not: 1},
            }),
            form: new Form({
                morphable_id: this.$parent.morphable_id,
                itineraryPlace: this.itineraryPlace,
            }),
            table: new Table({
                morphable_id: this.$parent.morphable_id,
            }),
        }
    },
    mounted() {
        this.table.index();
    },
    methods: {
        attach(id) {
            this.form.setData({id: id});
            this.form.store()
                .then(() => {
                    this.table.items = [];
                    this.table.index();
                    this.detached.query.q = '';
                })
        }
    },
    components: {
        edit
    },
    template: index_html
}