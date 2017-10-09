import shared from 'belt/spot/js/places/ctlr/shared';
import amenities from 'belt/spot/js/amenity-spots/list';

export default {
    mixins: [shared],
    components: {
        tab: amenities,
    },
}