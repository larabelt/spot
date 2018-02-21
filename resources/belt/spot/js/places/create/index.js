import Form from 'belt/spot/js/places/form';
import heading_html from 'belt/core/js/templates/heading.html';
import form_html from 'belt/spot/js/places/create/form.html';
import create_html from 'belt/spot/js/places/create/template.html';

export default {
    components: {
        heading: {template: heading_html},
        create: {
            data() {
                return {
                    form: new Form({router: this.$router}),
                }
            },
            template: form_html,
        },
    },
    template: create_html
}