import place from 'belt/spot/js/places/store/mixin';
import edit from 'belt/spot/js/places/edit/shared';
import html from 'belt/spot/js/places/edit/form.html';
import priorityDropdown from 'belt/core/js/inputs/priority/form';
import templateDropdown from 'belt/content/js/subtypes/inputs/default';
import teamInput from 'belt/core/js/teams/input';

export default {
    mixins: [edit],
    components: {
        edit: {
            data() {
                return {
                    form: this.$parent.form,
                    place: this.$parent.place,
                    entity_id: this.$parent.entity_id,
                }
            },
            methods: {
                submit() {
                    Events.$emit('places:' + this.entity_id + ':updating', this.form);
                    this.form.submit();
                }
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