import Form from 'belt/spot/js/events/form';
import datetimeInput from 'belt/core/js/inputs/datetime';
import priorityDropdown from 'belt/core/js/inputs/priority/form';

import form_html from 'belt/spot/js/events/create/form.html';
import create_html from 'belt/spot/js/events/create/template.html';

export default {
    components: {

        create: {
            data() {
                return {
                    form: new Form({router: this.$router}),
                }
            },
            components: {
                priorityDropdown,
                datetimeInput
            },
            template: form_html,
        },
    },
    template: create_html
}