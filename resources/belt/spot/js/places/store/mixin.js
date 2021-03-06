import Form from 'belt/spot/js/places/form';
import store from 'belt/spot/js/places/store';

export default {
    created() {
        if (!this.$store.state[this.storeKey]) {
            this.$store.registerModule(this.storeKey, store);
            this.$store.dispatch(this.storeKey + '/construct', {id: this.place_id});
        }
    },
    computed: {
        config() {
            return this.$store.getters[this.storeKey + '/config/data'];
        },
        place() {
            return this.$store.getters[this.storeKey + '/form'];
        },
        storeKey() {
            return 'places' + this.place_id;
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