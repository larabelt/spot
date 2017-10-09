import shared from 'belt/spot/js/amenity-spots/shared';
import self from 'belt/spot/js/amenity-spots/edit';
import html from 'belt/spot/js/amenity-spots/edit/template.html';

export default {
    mixins: [shared],
    props: {
        amenity: {},
        depth: {
            default: 1,
        },
        morphable_type: {
            default: function () {
                return this.$parent.morphable_type;
            }
        },
        morphable_id: {
            default: function () {
                return this.$parent.morphable_id;
            }
        },
    },
    data() {
        return {
            active: false,
            expanded: false,
            value: '',
        }
    },
    computed: {
        attached() {
            return _.find(this.attachedAmenities, {id: this.amenity.id});
        },
        hasChildren() {
            return this.childAmenities.length;
        },
        childAmenities() {
            return this.amenities(this.amenity.id);
        },
    },
    beforeCreate: function () {
        this.$options.components.edit = self
    },
    mounted() {
        if (this.attached) {
            this.active = true;
            this.value = this.attached.pivot.value;
        }
    },
    methods: {
        attach() {
            this.$store.dispatch(this.storeKey + '/attach', {id: this.amenity.id, value: this.value})
                .then((response) => {
                    this.active = true;
                    this.value = response.pivot.value;
                });
        },
        detach() {
            this.$store.dispatch(this.storeKey + '/detach', {id: this.amenity.id})
                .then((response) => {
                    this.active = false;
                    this.value = '';
                });
        },
        toggle() {
            if (!this.active) {
                this.detach();
            } else {
                this.attach();
            }
        },
        update: _.debounce(function (e) {
            this.attach();
        }, 500),

    },
    components: {},
    template: html
}