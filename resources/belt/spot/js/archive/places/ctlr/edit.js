import shared from 'belt/spot/js/places/ctlr/shared';
import priorityDropdown from 'belt/core/js/inputs/priority/form';
import templateDropdown from 'belt/content/js/templates';
import teamInput from 'belt/core/js/teams/input';
import attachment from 'belt/clip/js/clippables/ctlr/attachment';

import tabs_html from 'belt/spot/js/places/templates/tabs.html';
import edit_html from 'belt/spot/js/places/templates/edit.html';
import form_html from 'belt/spot/js/places/templates/form.html';

export default {
    components: {

        tabs: {template: tabs_html},
        tab: {
            mixins: [shared],
            components: {
                attachment,
                priorityDropdown,
                templateDropdown,
                teamInput
            },
            template: form_html,
        },
    },
    mixins: [shared],
    template: edit_html,
}