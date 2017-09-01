import Config from 'belt/core/js/templates/config';

import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/events/templates/tabs.html';
import edit_html from 'belt/spot/js/events/templates/edit.html';

import Form from 'belt/spot/js/events/form';

export default {
    data() {
        return {
            config: new Config(),
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
        this.event.show(this.morphable_id)
            .then(() => {
                this.config.setService('events', this.event.template);
                this.config.load()
                    .then((response) => {
                    });
            });
    },
    template: edit_html,
}