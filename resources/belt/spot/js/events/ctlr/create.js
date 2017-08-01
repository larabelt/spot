// helpers
import Form from 'belt/spot/js/events/form';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import form_html from 'belt/spot/js/events/templates/form.html';
import create_html from 'belt/spot/js/events/templates/create.html';

export default {
    components: {
        heading: {template: heading_html},
        create: {
            data() {
                return {
                    event: new Form({router: this.$router}),
                }
            },
            template: form_html,
        },
    },
    template: create_html
}