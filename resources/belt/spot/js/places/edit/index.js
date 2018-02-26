import place from 'belt/spot/js/places/store/mixin';
import Form from 'belt/spot/js/places/form';
import edit from 'belt/spot/js/places/edit/shared';
import html from 'belt/spot/js/places/edit/form.html';

export default {
    mixins: [edit],
    components: {
        edit: {
            mixins: [place],
            data() {
                return {
                    morphable_type: 'places',
                    morphable_id: this.$parent.morphable_id,
                    place_id: this.$parent.morphable_id,
                }
            },
            computed: {
                form() {
                    return this.place;
                }
            },
            mounted() {
                this.$store.dispatch(this.storeKey + '/load', this.place_id);
            },
            template: html,
        },
    },
}