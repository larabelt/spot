import shared from 'belt/spot/js/itineraries/ctlr/shared';

// components
import sections from 'belt/content/js/sectionables/router/index';

export default {
    mixins: [shared],
    components: {
        tab: sections,
    },
}