import shared from './shared';

import coordinates from 'belt/core/js/components/base/coordinates';

// templates
import edit_html from './templates/edit.html';
import form_html from './templates/form.html';

export default {
    mixins: [shared],
    methods: {
        save() {
            let self = this;
            self.form.submit()
                .then(function () {
                    self.setEditing(self.form.id);
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