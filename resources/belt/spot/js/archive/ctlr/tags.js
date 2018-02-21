import shared from 'belt/spot/js/places/ctlr/shared';

// components
import tags from 'belt/glue/js/taggables/ctlr-edit';

export default {
    mixins: [shared],
    components: {
        tab: tags,
    },
}