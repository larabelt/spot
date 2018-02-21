import edit from 'belt/spot/js/places/edit/shared';
import amenities from 'belt/spot/js/amenity-spots/list';

export default {
    mixins: [edit],
    components: {
        edit: amenities,
    },
}