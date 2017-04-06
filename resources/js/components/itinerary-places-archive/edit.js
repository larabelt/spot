import shared from './shared';

// helpers
import Form from './form';
import Table from './table';

// templates
import edit_html from './templates/edit.html';

export default {
    mixins: [shared],
    props: ['itineraryPlace'],
    data() {
        return {
            form: new Form({
                morphable_id: this.$parent.morphable_id,
                itineraryPlace: this.itineraryPlace,
            }),
        }
    },
    mounted() {
        this.form.show(this.itineraryPlace.id);
    },
    methods: {
        destroy(id) {
            this.form.destroy(id)
                .then(() => {
                    this.table.items = [];
                    this.table.index();
                });
        },
        save() {
            this.form.submit()
                .then(() => {
                    this.table.items = [];
                    this.table.index();
                });
        }
    },
    template: edit_html
}