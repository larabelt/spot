import shared from './shared';

// templates
import edit_html from '../templates/edit.html';

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