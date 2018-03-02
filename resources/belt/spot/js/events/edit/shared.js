import tabs_html from 'belt/spot/js/events/edit/tabs.html';
import html from 'belt/spot/js/events/edit/template.html';

export default {
    data() {
        return {
            morphable_type: 'events',
            morphable_id: this.$route.params.id,
        }
    },
    components: {
        tabs: {template: tabs_html},
        edit: {},
    },
    template: html,
}