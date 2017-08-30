import shared from 'belt/spot/js/events/ctlr/shared';

// components
import attachments from 'belt/clip/js/clippables/ctlr/index';

// templates
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/events/templates/tabs.html';
import edit_html from 'belt/spot/js/events/templates/edit.html';

export default {
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
        tab: attachments,
    },
    mixins: [shared],
    template: edit_html,
}