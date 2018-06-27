import shared from 'belt/spot/js/locations/shared';

// templates
import panel_html from 'belt/spot/js/locations/templates/panel.html';

export default {
    mixins: [shared],
    methods: {
        destroy(id) {
            let self = this;
            self.locations.destroy(id)
                .then(function () {
                    self.locations.index();
                });
        },
    },
    template: panel_html
}