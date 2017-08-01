import shared from 'belt/spot/js/itineraries/ctlr/shared';

// components
import categories from 'belt/glue/js/categorizables/ctlr-edit';

export default {
    mixins: [shared],
    components: {
        tab: categories,
    },
}