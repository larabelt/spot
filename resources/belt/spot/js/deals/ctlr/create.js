// helpers
import Form from 'belt/spot/js/deals/form';

// templates make a change

import form_html from 'belt/spot/js/deals/templates/form.html';
import create_html from 'belt/spot/js/deals/templates/create.html';

export default {
    components: {

        create: {
            data() {
                return {
                    deal: new Form({router: this.$router}),
                }
            },
            template: form_html,
        },
    },
    template: create_html
}