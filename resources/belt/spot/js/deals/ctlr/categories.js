import shared from 'belt/spot/js/deals/ctlr/shared';

// components
import categories from 'belt/glue/js/categorizables/ctlr-edit';

// templates
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/deals/templates/tabs.html';
import edit_html from 'belt/spot/js/deals/templates/edit.html';

export default {
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
        tab: categories,
    },
    mixins: [shared],
    template: edit_html,
}