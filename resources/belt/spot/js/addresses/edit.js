import shared from 'belt/spot/js/addresses/shared';

// templates
import edit_html from 'belt/spot/js/addresses/templates/edit.html';
import form_html from 'belt/spot/js/addresses/templates/form.html';

import coordinates from 'belt/core/js/base/coordinates';

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