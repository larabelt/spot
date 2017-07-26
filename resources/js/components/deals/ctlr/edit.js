import shared from 'belt/spot/js/components/deals/ctlr/shared';

// components
import attachment from 'belt/clip/js/components/clippables/ctlr/attachment';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/components/deals/templates/tabs.html';
import edit_html from 'belt/spot/js/components/deals/templates/edit.html';
import form_html from 'belt/spot/js/components/deals/templates/form.html';

export default {
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
        tab: {
            mixins: [shared],
            components: {attachment},
            template: form_html,
        },
    },
    mixins: [shared],
    template: edit_html,
}