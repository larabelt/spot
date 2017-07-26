import shared from 'belt/spot/js/components/places/ctlr/shared';

// components
import categories from 'belt/glue/js/components/categorizables/ctlr-edit';

export default {
    mixins: [shared],
    components: {
        tab: categories,
    },
}