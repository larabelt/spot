import create from './create';
import edit from './edit';
import panel from './panel';

// helpers
import Form from './form';
import Table from './table';

// templates
import index_html from './templates/index.html';

export default {
    data() {
        return {
            morphable_type: this.$parent.morphable_type,
            morphable_id: this.$parent.morphable_id,
            addresses: new Table({
                morphable_type: this.$parent.morphable_type,
                morphable_id: this.$parent.morphable_id,
            }),
            form: new Form({
                morphable_type: this.$parent.morphable_type,
                morphable_id: this.$parent.morphable_id,
            }),
            modes: {
                active: 'index',
            },
        }
    },
    mounted() {
        let address_id = this.$route.params.address;
        if (address_id) {
            this.modes.active = 'edit';
            this.form.show(address_id);
        } else {
            this.addresses.index();
        }
    },
    computed: {
        mode() {
            return this.modes.active;
        }
    },
    methods: {
        setCreating() {
            return new Promise((resolve, reject) => {
                this.modes.active = 'create';
                this.form.reset();
                resolve();
            });
        },
    },
    components: {create, edit, panel},
    template: index_html
}