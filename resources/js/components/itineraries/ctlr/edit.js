import shared from 'belt/spot/js/components/itineraries/ctlr/shared';

// components
import attachment from 'belt/clip/js/components/clippables/ctlr/attachment';

// helpers
import Form from 'belt/spot/js/components/itineraries/form';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/components/itineraries/templates/tabs.html';
import edit_html from 'belt/spot/js/components/itineraries/templates/edit.html';
import form_html from 'belt/spot/js/components/itineraries/templates/form.html';

export default {
    data() {
        return {
            morphable_type: 'itineraries',
            morphable_id: this.$route.params.id,
            itinerary: new Form(),
        }
    },
    mounted() {
        this.itinerary.show(this.morphable_id);
    },
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
        tab: {
            mixins: [shared],
            components: {attachment},
            template: form_html,
        },
    },
    template: edit_html,
}