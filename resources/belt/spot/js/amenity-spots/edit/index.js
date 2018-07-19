import shared from 'belt/spot/js/amenity-spots/shared';
import self from 'belt/spot/js/amenity-spots/edit';
import html from 'belt/spot/js/amenity-spots/edit/template.html';
//import amenities from "../../places/ctlr/amenities";

export default {
    mixins: [shared],
    props: {
        amenity: {},
        collapsable: {
            default: false,
        },
        depth: {
            default: 1,
        },
        entity_type: {
            default: function () {
                return this.$parent.entity_type;
            }
        },
        entity_id: {
            default: function () {
                return this.$parent.entity_id;
            }
        },
    },
    data() {
        return {
            active: false,
            expanded: this.collapsable ? false : true,
            value: '',
        }
    },
    computed: {
        attached() {
            return _.find(this.attachedAmenities, {id: this.amenity.id});
        },
        hasActive() {
            if (this.active) {
                return true;
            }

            for (let i = 0; i < this.childAmenities.length; i++) {
                let amenity = this.childAmenities[i];
                let active = _.find(this.attachedAmenities, {id: amenity.id});
                if (active) {
                    return true;
                }
            }

            return false;
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
        toggleCheckbox() {
            if (!this.active) {
                this.attach();
            } else {
                this.detach();
            }
        },
        toggleExpand() {
            if (this.hasChildren) {
                this.expanded = !this.expanded;
            }
        },
        update: _.debounce(function (e) {
            this.attach();
        }, 500),

    },
    components: {},
    template: html
}