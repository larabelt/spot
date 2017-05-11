import shared from './shared';

import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from '../templates/tabs.html';
import edit_html from '../templates/edit.html';

import Form from '../form';

export default {
    data() {
        return {
            morphable_type: 'events',
            morphable_id: this.$route.params.id,
            event: new Form(),
        }
    },
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
    },
    mounted() {
        this.event.show(this.morphable_id);
    },
    template: edit_html,
}