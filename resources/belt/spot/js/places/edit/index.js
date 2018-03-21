import place from 'belt/spot/js/places/store/mixin';
import edit from 'belt/spot/js/places/edit/shared';
import html from 'belt/spot/js/places/edit/form.html';
import priorityDropdown from 'belt/core/js/inputs/priority/form';
import templateDropdown from 'belt/content/js/templates';
import teamInput from 'belt/core/js/teams/input';

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
            components: {
                priorityDropdown,
                templateDropdown,
                teamInput,
            },
            template: html,
        },
    },
}