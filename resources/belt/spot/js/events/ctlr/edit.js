import shared from 'belt/spot/js/events/ctlr/shared';
import templateDropdown from 'belt/content/js/templates';
import attachment from 'belt/clip/js/clippables/ctlr/attachment';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/events/templates/tabs.html';
import edit_html from 'belt/spot/js/events/templates/edit.html';
import form_html from 'belt/spot/js/events/templates/form.html';

export default {
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
        tab: {
            mixins: [shared],
            components: {attachment, templateDropdown},
            template: form_html,
        },
    },
    mixins: [shared],
    template: edit_html,
}