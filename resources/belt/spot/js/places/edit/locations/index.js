import edit from 'belt/spot/js/places/edit/shared';
import locations from 'belt/spot/js/locations/index';

export default {
    mixins: [edit],
    components: {
        edit: locations,
    },
}