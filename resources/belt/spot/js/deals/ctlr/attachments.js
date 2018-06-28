import shared from 'belt/spot/js/deals/ctlr/shared';

// components
import attachments from 'belt/content/js/clippables/ctlr/index';

// templates

import tabs_html from 'belt/spot/js/deals/templates/tabs.html';
import edit_html from 'belt/spot/js/deals/templates/edit.html';

export default {
    components: {

        tabs: {template: tabs_html},
        tab: attachments,
    },
    mixins: [shared],
    template: edit_html,
}