import shared from './shared';

// components
import sections from 'belt/content/js/components/sectionables/ctlr/index';

// templates
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from '../templates/tabs.html';
import edit_html from '../templates/edit.html';

export default {
    mixins: [shared],
    data() {
        return {
            morphable_type: 'places',
            morphable_id: this.$route.params.id
        }
    },
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
        tab: sections,
    },
    template: edit_html,
}