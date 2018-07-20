import Form from 'belt/spot/js/places/form';


import form_html from 'belt/spot/js/places/create/form.html';
import create_html from 'belt/spot/js/places/create/template.html';

export default {
    components: {

        create: {
            data() {
                return {
                    form: new Form({router: this.$router}),
                }
            },
            components: {

            },
            template: form_html,
        },
    },
    template: create_html
}