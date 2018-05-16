// helpers
import Form from 'belt/spot/js/places/form';

// templates make a change

import form_html from 'belt/spot/js/places/templates/form.html';
import create_html from 'belt/spot/js/places/templates/create.html';

export default {
    components: {

        create: {
            data() {
                return {
                    place: new Form({router: this.$router}),
                }
            },
            template: form_html,
        },
    },
    template: create_html
}