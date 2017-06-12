import shared from './shared';

// templates
import edit_html from './templates/edit.html';
import form_html from './templates/form.html';

import coordinates from 'belt/core/js/components/base/coordinates';

export default {
    mixins: [shared],
    methods: {
        save() {
            let self = this;
            self.form.submit()
                .then(function () {
                    self.addresses.index();
                });
        },
    },
    components: {
        addressForm: {
            mixins: [shared],
            components: {
                coordinates,
            },
            template: form_html,
        }
    },
    template: edit_html
}