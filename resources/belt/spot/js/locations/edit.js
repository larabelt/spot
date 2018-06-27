import shared from 'belt/spot/js/locations/shared';

// templates
import edit_html from 'belt/spot/js/locations/templates/edit.html';
import form_html from 'belt/spot/js/locations/templates/form.html';

import coordinates from 'belt/core/js/base/coordinates';

export default {
    mixins: [shared],
    methods: {
        save() {
            this.form.submit()
                .then(() => {
                    this.locations.index();
                });
        },
    },
    components: {
        locationForm: {
            mixins: [shared],
            components: {
                coordinates,
            },
            methods: {
                fetchLatLng() {
                    this.form.name = '';
                    this.form._geocode = 'lat,lng,north_lat,south_lat,west_lng,east_lng';
                    this.form.submit();
                }
            },
            template: form_html,
        }
    },
    template: edit_html
}