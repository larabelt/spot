import shared from './shared';

// components
import addresses from 'belt/spot/js/components/addresses/index';

export default {
    mixins: [shared],
    components: {
        tab: addresses,
    },
}