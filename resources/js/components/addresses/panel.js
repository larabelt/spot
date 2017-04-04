import shared from './shared';

// templates
import panel_html from './templates/panel.html';

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