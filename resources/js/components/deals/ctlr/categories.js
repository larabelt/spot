import shared from 'belt/spot/js/components/deals/ctlr/shared';

// components
import categories from 'belt/glue/js/components/categorizables/ctlr-edit';

// templates
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/components/deals/templates/tabs.html';
import edit_html from 'belt/spot/js/components/deals/templates/edit.html';

export default {
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
        tab: categories,
    },
    mixins: [shared],
    template: edit_html,
}