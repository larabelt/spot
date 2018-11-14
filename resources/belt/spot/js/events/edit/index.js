import TranslationStore from 'belt/core/js/translations/store/adapter';
import datetimeInput from 'belt/core/js/inputs/datetime';
import edit from 'belt/spot/js/events/edit/shared';
import html from 'belt/spot/js/events/edit/form.html';

export default {
    mixins: [edit],
    components: {
        edit: {
            mixins: [TranslationStore],
            data() {
                return {
                    form: this.$parent.form,
                    event: this.$parent.event,
                    entity_type: 'events',
                    entity_id: this.$parent.entity_id,
                }
            },
            created() {
                this.bootTranslationStore();
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