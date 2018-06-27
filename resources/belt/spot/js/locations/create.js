import shared from 'belt/spot/js/locations/shared';

import coordinates from 'belt/core/js/base/coordinates';

// templates
import edit_html from 'belt/spot/js/locations/templates/edit.html';
import form_html from 'belt/spot/js/locations/templates/form.html';

export default {
    mixins: [shared],
    methods: {
        save() {
            this.form.submit()
                .then(() => {
                    this.setEditing(this.form.id);
                });
        },
    },
    components: {
        locationForm: {
            components: {
                coordinates,
            },
            mixins: [shared],
            template: form_html,
        }
    },
    template: edit_html
}