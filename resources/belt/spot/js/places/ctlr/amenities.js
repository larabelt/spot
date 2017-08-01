import shared from 'belt/spot/js/places/ctlr/shared';

// components
import amenities from 'belt/spot/js/amenity-spots/ctlr-edit';

export default {
    mixins: [shared],
    components: {
        tab: amenities,
    },
}