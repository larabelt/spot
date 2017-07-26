import shared from 'belt/spot/js/components/itineraries/ctlr/shared';

// components
import attachments from 'belt/clip/js/components/clippables/ctlr/index';

export default {
    mixins: [shared],
    components: {
        tab: attachments,
    },
}