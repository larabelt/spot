// helpers
import Form from 'belt/spot/js/itineraries/form';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import form_html from 'belt/spot/js/itineraries/templates/form.html';
import create_html from 'belt/spot/js/itineraries/templates/create.html';

export default {
    components: {
        heading: {template: heading_html},
        create: {
            data() {
                return {
                    itinerary: new Form({router: this.$router}),
                }
            },
            template: form_html,
        },
    },
    template: create_html
}