import Form from 'belt/spot/js/places/form';
import store from 'belt/spot/js/places/store';

export default {
    created() {
        if (!this.$store.state[this.storeKey]) {
            this.$store.registerModule(this.storeKey, store);
        }
    },
    computed: {
        storeKey() {
            return 'places' + this.place_id;
        },
        place() {
            return this.$store.getters[this.storeKey + '/form'];
        },
    },
    methods: {

    },
    data() {
        return {
            place_id: null,
        }
    },
}