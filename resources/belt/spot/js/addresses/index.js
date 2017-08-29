import create from 'belt/spot/js/addresses/create';
import edit from 'belt/spot/js/addresses/edit';
import panel from 'belt/spot/js/addresses/panel';

// helpers
import Form from 'belt/spot/js/addresses/form';
import Table from 'belt/spot/js/addresses/table';

// templates
import index_html from 'belt/spot/js/addresses/templates/index.html';

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
            showHelp: false,
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
        },
        table() {
            return this.addresses;
        }
    },
    methods: {
        setCreating() {
            if (this.form._address) {
                this.form.submit()
                    .then((address) => {
                        if (address.id) {
                            this.modes.active = 'edit';
                            this.form._address = '';
                        }
                    });
            } else {
                return new Promise((resolve, reject) => {
                    this.modes.active = 'create';
                    this.form.reset();
                    resolve();
                });
            }
        },
        toggleHelp() {
            this.showHelp = !this.showHelp;
        }
    },
    components: {create, edit, panel},
    template: index_html
}