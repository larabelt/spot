import edit from 'belt/spot/js/places/edit/shared';
import params from 'belt/core/js/paramables/ctlr/index';

export default {
    mixins: [edit],
    components: {
        edit: params,
    },
    mounted() {
        this.$store.dispatch(this.storeKey + '/params/load');
    }
}