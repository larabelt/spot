import create from 'belt/spot/js/locations/create';
import edit from 'belt/spot/js/locations/edit';
import panel from 'belt/spot/js/locations/panel';

// helpers
import Form from 'belt/spot/js/locations/form';
import Table from 'belt/spot/js/locations/table';

// templates
import index_html from 'belt/spot/js/locations/templates/index.html';

export default {
    data() {
        return {
            morphable_type: this.$parent.morphable_type,
            morphable_id: this.$parent.morphable_id,
            locations: new Table({
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
        let location_id = this.$route.params.location;
        if (location_id) {
            this.modes.active = 'edit';
            this.form.show(location_id);
        } else {
            this.locations.index()
                .then(() => {
                    if (this.locations.items.length == 1) {
                        this.modes.active = 'edit';
                        this.form.show(this.locations.items[0]['id']);
                    }
                });
        }
    },
    computed: {
        mode() {
            return this.modes.active;
        },
        table() {
            return this.locations;
        }
    },
    methods: {
        setCreating() {
            if (this.form._location) {
                this.form.submit()
                    .then((location) => {
                        if (location.id) {
                            this.modes.active = 'edit';
                            this.form._location = '';
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