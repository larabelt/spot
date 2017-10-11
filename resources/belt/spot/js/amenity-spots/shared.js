import amenitiesStore from 'belt/spot/js/amenities/store';
import store from 'belt/spot/js/amenity-spots/store';

// amenities itself with sort by alpha by node
// revisit api/index??? (remember store response vs response.data)

export default {
    created() {
        if (!this.$store.state['amenities']) {
            this.$store.registerModule('amenities', amenitiesStore);
            this.$store.dispatch('amenities/load', {perPage:99999});
        }
        if (!this.$store.state[this.storeKey]) {
            this.$store.registerModule(this.storeKey, store);
            this.$store.dispatch(this.storeKey + '/set', {morphType: this.morphable_type, morphID: this.morphable_id});
            this.$store.dispatch(this.storeKey + '/load');
        }
    },
    computed: {
        attachedAmenities() {
            return this.$store.getters[this.storeKey + '/data'];
        },
        parentAmenities() {
            return this.amenities();
        },
        storeKey() {
            return `${this.morphable_type}/${this.morphable_id}/amenities`;
        },
    },
    methods: {
        amenities(parent_id = null) {
            let amenities = this.$store.getters['amenities/data'];
            return _.filter(amenities, {parent_id: parent_id});
        }
    },
}