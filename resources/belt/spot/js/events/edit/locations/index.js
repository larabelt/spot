import edit from 'belt/spot/js/events/edit/shared';
import locations from 'belt/spot/js/locations/index';

export default {
    mixins: [edit],
    components: {
        edit: locations,
    },
}