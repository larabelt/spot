import place from 'belt/spot/js/places/store/mixin';
import tabs_html from 'belt/spot/js/places/edit/tabs.html';
import html from 'belt/spot/js/places/edit/template.html';

export default {
    mixins: [place],
    data() {
        return {
            morphable_type: 'places',
            morphable_id: this.$route.params.id,
            place_id: this.$route.params.id,
        }
    },
    mounted() {
        this.$store.dispatch(this.storeKey + '/load', this.place_id);
    },
    computed: {
        config() {
            return this.$store.getters[this.storeKey + '/config/data'];
        },
        form() {
            return this.place;
        },
        storeKey() {
            return 'places' + this.morphable_id;
        },
    },
    components: {
        tabs: {template: tabs_html},
        edit: {},
    },
    template: html,
}