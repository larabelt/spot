import shared from 'belt/spot/js/components/events/ctlr/shared';

// components
import sections from 'belt/content/js/components/sectionables/ctlr/index';

export default {
    mixins: [shared],
    components: {
        tab: sections,
    },
}