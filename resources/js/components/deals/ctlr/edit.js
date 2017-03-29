import shared from './shared';

// components
import attachment from 'belt/clip/js/components/clippables/ctlr/attachment';

// helpers
import Form from '../form';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from '../templates/tabs.html';
import edit_html from '../templates/edit.html';
import form_html from '../templates/form.html';

export default {
    data() {
        return {
            morphable_type: 'deals',
            morphable_id: this.$route.params.id,
            deal: new Form(),
        }
    },
    mounted() {
        this.deal.show(this.morphable_id);
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