import shared from 'belt/spot/js/components/events/ctlr/shared';

// components
import tags from 'belt/glue/js/components/taggables/ctlr-edit';

// templates
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/components/events/templates/tabs.html';
import edit_html from 'belt/spot/js/components/events/templates/edit.html';

export default {
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
        tab: tags,
    },
    mixins: [shared],
    template: edit_html,
}