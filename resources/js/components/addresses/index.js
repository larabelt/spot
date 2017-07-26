import create from 'belt/spot/js/components/addresses/create';
import edit from 'belt/spot/js/components/addresses/edit';
import panel from 'belt/spot/js/components/addresses/panel';

// helpers
import Form from 'belt/spot/js/components/addresses/form';
import Table from 'belt/spot/js/components/addresses/table';

// templates
import index_html from 'belt/spot/js/components/addresses/templates/index.html';

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
            this.addresses.index()
                .then(() => {
                    if (this.addresses.items.length == 1) {
                        this.modes.active = 'edit';
                        this.form.show(this.addresses.items[0]['id']);
                    }
                });
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