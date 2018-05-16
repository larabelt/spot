// helpers
import Form from 'belt/spot/js/events/form';
import datetimeInput from 'belt/core/js/inputs/datetime';
// templates make a change

import form_html from 'belt/spot/js/events/templates/form.html';
import create_html from 'belt/spot/js/events/templates/create.html';

export default {
    components: {

        create: {
            data() {
                return {
                    event: new Form({router: this.$router}),
                }
            },
            components: {
                datetimeInput
            },
            template: form_html,
        },
    },
    template: create_html
}