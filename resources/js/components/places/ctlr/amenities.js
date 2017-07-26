import shared from 'belt/spot/js/components/places/ctlr/shared';

// components
import amenities from 'belt/spot/js/components/amenity-spots/ctlr-edit';

export default {
    mixins: [shared],
    components: {
        tab: amenities,
    },
}