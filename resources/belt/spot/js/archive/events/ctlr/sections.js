import shared from 'belt/spot/js/events/ctlr/shared';

// components
import sections from 'belt/content/js/sectionables/ctlr/index';

export default {
    mixins: [shared],
    components: {
        tab: sections,
    },
}