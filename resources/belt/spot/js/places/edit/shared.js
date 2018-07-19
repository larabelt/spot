import place from 'belt/spot/js/places/store/mixin';
import tabs_html from 'belt/spot/js/places/edit/tabs.html';
import html from 'belt/spot/js/places/edit/template.html';

export default {
    mixins: [place],
    data() {
        return {
            entity_type: 'places',
            entity_id: this.$route.params.id,
            place_id: this.$route.params.id,
        }
    },
    mounted() {
        this.$store.dispatch(this.storeKey + '/load', this.place_id);
    },
    computed: {
        config() {
            return this.form.config;
            //return this.$store.getters[this.storeKey + '/config/data'];
        },
        form() {
            return this.place;
        },
        sectionable() {
            return _.get(this.config, 'sectionable', false);
        },
        storeKey() {
            return 'places' + this.entity_id;
        },
    },
    components: {
        tabs: {template: tabs_html},
        edit: {},
    },
    template: html,
}