// helpers
import Form from 'belt/spot/js/amenity-spots/form';
import Table from 'belt/spot/js/amenity-spots/table';
import AmenityTable from 'belt/spot/js/amenity-spots/table';

// templates
import index_html from 'belt/spot/js/amenity-spots/templates/index.html';
import button_html from 'belt/spot/js/amenity-spots/templates/button.html';

export default {
    components: {
        amenity: {
            props: ['amenity'],
            data() {
                return {
                    attached: this.$parent.attached,
                    form: new Form({
                        morphable_type: this.$parent.morphable_type,
                        morphable_id: this.$parent.morphable_id,
                    }),
                }
            },
            computed: {
                isAttached() {
                    return _.get(this.attached.items, this.amenity.id) ? true : false;
                },
            },
            methods: {
                toggle() {
                    let self = this;
                    if (this.isAttached) {
                        self.form.destroy(this.amenity.id)
                            .then(function () {
                                self.$parent.index();
                            });
                    } else {
                        self.form.setData({id: this.amenity.id});
                        self.form.store()
                            .then(function () {
                                self.$parent.index();
                            });
                    }
                },
            },
            template: button_html,
        }
    },
    data() {
        return {
            morphable_type: this.$parent.morphable_type,
            morphable_id: this.$parent.morphable_id,
            attached: new Table({
                morphable_type: this.$parent.morphable_type,
                morphable_id: this.$parent.morphable_id,
            }),
            amenities: new AmenityTable({
                morphable_type: this.$parent.morphable_type,
                morphable_id: this.$parent.morphable_id,
            }),
        }
    },
    mounted() {
        this.amenities.index()
            .then(() => {
                this.index();
            });
    },
    methods: {
        index() {
            this.attached.index().then(() => {
                this.attached.items = _.keyBy(this.attached.items, 'id');
            })
        },
    },
    template: index_html
}