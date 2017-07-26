import shared from 'belt/spot/js/components/itinerary-places/ctlr/shared';

// templates
import edit_html from 'belt/spot/js/components/itinerary-places/templates/edit.html';

export default {
    mixins: [shared],
    methods: {
        save() {
            this.active.submit()
                .then(() => {
                    this.itineraryPlaces.index();
                });
        },
    },
    template: edit_html
}