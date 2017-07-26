// templates
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/components/places/templates/tabs.html';
import edit_html from 'belt/spot/js/components/places/templates/edit.html';

import Form from 'belt/spot/js/components/places/form';

export default {
    data() {
        return {
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
        this.place.show(this.morphable_id);
    },
    template: edit_html,
}