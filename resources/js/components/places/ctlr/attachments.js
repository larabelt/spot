import shared from './shared';

// components
import attachments from 'belt/spot/js/components/amenity-spots/ctlr-edit';

export default {
    mixins: [shared],
    components: {
        tab: attachments,
    },
}