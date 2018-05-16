import shared from 'belt/spot/js/deals/ctlr/shared';
import priorityDropdown from 'belt/core/js/inputs/priority/form';
import datetimeInput from 'belt/core/js/inputs/datetime';

import tabs_html from 'belt/spot/js/deals/templates/tabs.html';
import edit_html from 'belt/spot/js/deals/templates/edit.html';
import form_html from 'belt/spot/js/deals/templates/form.html';

export default {
    mixins: [shared],
    components: {

        tabs: {template: tabs_html},
        tab: {
            mixins: [shared],
            components: {
                priorityDropdown,
                datetimeInput,
            },
            template: form_html,
        },
    },
    template: edit_html,
}