import TranslationStore from 'belt/core/js/translations/store/adapter';
import form from 'belt/spot/js/amenities/form';
import html from 'belt/spot/js/amenities/edit/template.html';

export default {
    mixins: [form],
    data() {
        return {
            entity_type: 'amenities',
            entity_id: this.$route.params.id,
        }
    },
    components: {
        edit: {
            mixins: [form, TranslationStore],
            data() {
                return {
                    entity_type: this.$parent.entity_type,
                    entity_id: this.$parent.entity_id,
                }
            },
            created() {
                this.bootTranslationStore();
            },
        },
    },
    template: html,
}