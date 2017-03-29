// helpers
import Form from './form';
import Table from './table';
import AmenityTable from '../amenities/table';

// templates
import index_html from './templates/index.html';
import button_html from './templates/button.html';

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
            amenities: new AmenityTable(),
        }
    },
    mounted() {
        let self = this;
        this.amenities.index()
            .then(function () {
                self.index();
            });
    },
    methods: {
        index() {
            let attached = this.attached;
            attached.index().then(function () {
                attached.items = _.keyBy(attached.items, 'id');
            })
        },
    },
    template: index_html
}