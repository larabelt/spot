import edit from 'belt/spot/js/events/edit/shared';
import addresses from 'belt/spot/js/addresses/index';

export default {
    mixins: [edit],
    components: {
        edit: addresses,
    },
}