import shared from 'belt/spot/js/components/events/ctlr/shared';

import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/components/events/templates/tabs.html';
import edit_html from 'belt/spot/js/components/events/templates/edit.html';

import Form from 'belt/spot/js/components/events/form';

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