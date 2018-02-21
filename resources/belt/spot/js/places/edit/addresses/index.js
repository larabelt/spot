import edit from 'belt/spot/js/places/edit/shared';
import addresses from 'belt/spot/js/addresses/index';

export default {
    mixins: [edit],
    components: {
        edit: addresses,
    },
}