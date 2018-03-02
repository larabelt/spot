import event from 'belt/spot/js/events/store/mixin';
import edit from 'belt/spot/js/events/edit/shared';
import params from 'belt/core/js/paramables/ctlr/index';

export default {
    mixins: [edit],
    components: {
        edit: {
            mixins: [event, params],
            data() {
                return {
                    morphable_type: 'events',
                    morphable_id: this.$parent.morphable_id,
                    place_id: this.$parent.morphable_id,
                }
            },
            mounted() {
                this.$store.dispatch(this.storeKey + '/params/load');
            }
        },
    },
}