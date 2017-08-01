import shared from 'belt/spot/js/addresses/shared';

// templates
import panel_html from 'belt/spot/js/addresses/templates/panel.html';

export default {
    mixins: [shared],
    methods: {
        destroy(id) {
            let self = this;
            self.addresses.destroy(id)
                .then(function () {
                    self.addresses.index();
                });
        },
    },
    template: panel_html
}