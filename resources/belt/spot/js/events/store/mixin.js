import Form from 'belt/spot/js/events/form';
import store from 'belt/spot/js/events/store';

export default {
    created() {
        if (!this.$store.state[this.storeKey]) {
            this.$store.registerModule(this.storeKey, store);
            this.$store.dispatch(this.storeKey + '/construct', {id: this.event_id});
        }
    },
    computed: {
        config() {
            return this.$store.getters[this.storeKey + '/config/data'];
        },
        event() {
            return this.$store.getters[this.storeKey + '/form'];
        },
        storeKey() {
            return 'events' + this.event_id;
        },
    },
    methods: {

    },
    data() {
        return {
            event_id: null,
        }
    },
}