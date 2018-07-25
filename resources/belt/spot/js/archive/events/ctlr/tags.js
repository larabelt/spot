import shared from 'belt/spot/js/events/ctlr/shared';

// components
import tags from 'belt/glue/js/taggables/ctlr-edit';

// templates

import tabs_html from 'belt/spot/js/events/templates/tabs.html';
import edit_html from 'belt/spot/js/events/templates/edit.html';

export default {
    components: {

        tabs: {template: tabs_html},
        tab: tags,
    },
    mixins: [shared],
    template: edit_html,
}