import event from 'belt/spot/js/events/store/mixin';
import datetimeInput from 'belt/core/js/inputs/datetime';



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
                    entity_id: this.$parent.entity_id,
                }
            },
            methods: {
                submit() {
                    Events.$emit('events:' + this.entity_id + ':updating', this.form);
                    this.form.submit();
                }
            },
            components: {


                datetimeInput,

            },
            template: html,
        },
    },
}