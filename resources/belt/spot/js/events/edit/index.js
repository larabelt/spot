import event from 'belt/spot/js/events/store/mixin';
import datetimeInput from 'belt/core/js/inputs/datetime';
import priorityDropdown from 'belt/core/js/inputs/priority/form';
import templateDropdown from 'belt/content/js/templates';
import edit from 'belt/spot/js/events/edit/shared';
import html from 'belt/spot/js/events/edit/form.html';

export default {
    mixins: [edit],
    components: {
        edit: {
            mixins: [event],
            data() {
                return {
                    morphable_type: 'events',
                    morphable_id: this.$parent.morphable_id,
                    event_id: this.$parent.morphable_id,
                }
            },
            computed: {
                form() {
                    return this.event;
                }
            },
            mounted() {
                this.$store.dispatch(this.storeKey + '/load', this.event_id);
            },
            components: {
                priorityDropdown,
                templateDropdown,
                datetimeInput
            },
            template: html,
        },
    },
}