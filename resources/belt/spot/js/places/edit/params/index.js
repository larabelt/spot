import place from 'belt/spot/js/places/store/mixin';
import edit from 'belt/spot/js/places/edit/shared';
import params from 'belt/core/js/paramables/ctlr/index';

export default {
    mixins: [edit],
    components: {
        edit: {
            mixins: [place, params],
            data() {
                return {
                    morphable_type: 'places',
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