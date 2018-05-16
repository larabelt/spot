import event from 'belt/spot/js/events/store/mixin';
import datetimeInput from 'belt/core/js/inputs/datetime';
import priorityDropdown from 'belt/core/js/inputs/priority/form';
import templateDropdown from 'belt/content/js/templates';
import teamInput from 'belt/core/js/teams/input';
import edit from 'belt/spot/js/events/edit/shared';
import html from 'belt/spot/js/events/edit/form.html';

export default {
    mixins: [edit],
    components: {
        edit: {
            data() {
                return {
                    form: this.$parent.form,
                    event: this.$parent.event,
                }
            },
            components: {
                priorityDropdown,
                templateDropdown,
                datetimeInput,
                teamInput,
            },
            template: html,
        },
    },
}