import event from 'belt/spot/js/events/store/mixin';
import tabs_html from 'belt/spot/js/events/edit/tabs.html';
import html from 'belt/spot/js/events/edit/template.html';

export default {
    mixins: [event],
    data() {
        return {
            morphable_type: 'events',
            morphable_id: this.$route.params.id,
            event_id: this.$route.params.id,
        }
    },
    mounted() {
        this.$store.dispatch(this.storeKey + '/load', this.event_id);
    },
    computed: {
        form() {
            return this.event;
        }
    },
    components: {
        tabs: {template: tabs_html},
        edit: {},
    },
    template: html,
}