import Form from 'belt/spot/js/events/form';
import datetimeInput from 'belt/core/js/inputs/datetime';


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

                datetimeInput
            },
            template: form_html,
        },
    },
    template: create_html
}