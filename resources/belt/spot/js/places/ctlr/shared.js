import Config from 'belt/core/js/templates/config';

// templates
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/places/templates/tabs.html';
import edit_html from 'belt/spot/js/places/templates/edit.html';

import Form from 'belt/spot/js/places/form';

export default {
    data() {
        return {
            config: new Config(),
            morphable_type: 'places',
            morphable_id: this.$route.params.id,
            place: new Form(),
        }
    },
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
    },
    mounted() {
        this.place.show(this.morphable_id)
            .then(() => {
                this.config.setService('places', this.place.template);
                this.config.load()
                    .then((response) => {
                    });
            });
    },
    template: edit_html,
}