import event from 'belt/spot/js/events/store/mixin';
import tabs_html from 'belt/spot/js/events/edit/tabs.html';
import html from 'belt/spot/js/events/edit/template.html';

export default {
    mixins: [event],
    data() {
        return {
            entity_type: 'events',
            entity_id: this.$route.params.id,
            event_id: this.$route.params.id,
        }
    },
    mounted() {
        this.$store.dispatch(this.storeKey + '/load', this.event_id);
    },
    computed: {
        config() {
            return this.form.config;
        },
        form() {
            return this.event;
        },
        sectionable() {
            return _.get(this.config, 'sectionable', false);
        },
    },
    components: {
        tabs: {template: tabs_html},
        edit: {},
    },
    template: html,
}