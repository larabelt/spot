import shared from 'belt/spot/js/deals/ctlr/shared';
import terms from 'belt/content/js/termables/ctlr-edit';
import tabs_html from 'belt/spot/js/deals/templates/tabs.html';
import edit_html from 'belt/spot/js/deals/templates/edit.html';

export default {
    components: {
        tabs: {template: tabs_html},
        tab: terms,
    },
    mixins: [shared],
    template: edit_html,
}