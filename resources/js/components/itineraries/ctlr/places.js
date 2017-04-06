import shared from './shared';

// components
import places from 'belt/spot/js/components/itinerary-places/ctlr/index';

export default {
    mixins: [shared],
    components: {
        tab: places,
    },
}