import shared from 'belt/spot/js/events/ctlr/shared';
import terms from 'belt/content/js/termables/ctlr-edit';
import tabs_html from 'belt/spot/js/events/templates/tabs.html';
import edit_html from 'belt/spot/js/events/templates/edit.html';

export default {
    components: {
        tabs: {template: tabs_html},
        tab: terms,
    },
    mixins: [shared],
    template: edit_html,
}