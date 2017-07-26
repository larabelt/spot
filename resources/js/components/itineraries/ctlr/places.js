import shared from 'belt/spot/js/components/itineraries/ctlr/shared';

// components
import places from 'belt/spot/js/components/itinerary-places/ctlr/index';

export default {
    mixins: [shared],
    components: {
        tab: places,
    },
}