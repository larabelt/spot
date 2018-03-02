import tabs_html from 'belt/spot/js/places/edit/tabs.html';
import html from 'belt/spot/js/places/edit/template.html';

export default {
    data() {
        return {
            morphable_type: 'places',
            morphable_id: this.$route.params.id,
        }
    },
    computed: {
        config() {
            return this.$store.getters[this.storeKey + '/config/data'];
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