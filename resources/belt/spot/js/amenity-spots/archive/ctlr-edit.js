// helpers
import Form from 'belt/spot/js/amenity-spots/form';
import Table from 'belt/spot/js/amenity-spots/table';
import AmenityTable from 'belt/spot/js/amenities/table';
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
                        entity_type: this.$parent.entity_type,
                        entity_id: this.$parent.entity_id,
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
            entity_type: this.$parent.entity_type,
            entity_id: this.$parent.entity_id,
            attached: new Table({
                entity_type: this.$parent.entity_type,
                entity_id: this.$parent.entity_id,
            }),
            amenities: new AmenityTable({
                entity_type: this.$parent.entity_type,
                entity_id: this.$parent.entity_id,
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