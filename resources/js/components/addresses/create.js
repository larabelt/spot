import shared from 'belt/spot/js/components/addresses/shared';

import coordinates from 'belt/core/js/components/base/coordinates';

// templates
import edit_html from 'belt/spot/js/components/addresses/templates/edit.html';
import form_html from 'belt/spot/js/components/addresses/templates/form.html';

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
        addressForm: {
            components: {
                coordinates,
            },
            mixins: [shared],
            template: form_html,
        }
    },
    template: edit_html
}