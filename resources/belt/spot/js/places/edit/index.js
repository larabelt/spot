import TranslationStore from 'belt/core/js/translations/store/adapter';
import edit from 'belt/spot/js/places/edit/shared';
import html from 'belt/spot/js/places/edit/form.html';

export default {
    mixins: [edit],
    components: {
        edit: {
            mixins: [TranslationStore],
            data() {
                return {
                    form: this.$parent.form,
                    place: this.$parent.place,
                    entity_type: 'places',
                    entity_id: this.$parent.entity_id,
                }
            },
            created() {
                this.bootTranslationStore();
            },
            destroyed() {
                this.form.reset();
            },
            methods: {
                submit() {
                    Events.$emit('places:' + this.entity_id + ':updating', this.form);
                    this.form.submit();
                }
            },
            components: {

            },
            template: html,
        },
    },
}