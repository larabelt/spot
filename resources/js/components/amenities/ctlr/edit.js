
// helpers
import Form from 'belt/spot/js/components/amenities/form';

// templates make a change
import heading_html from 'belt/core/js/templates/heading.html';
import edit_html from 'belt/spot/js/components/amenities/templates/edit.html';
import form_html from 'belt/spot/js/components/amenities/templates/form.html';

export default {
    components: {
        heading: {template: heading_html},
        edit: {
            data() {
                return {
                    form: new Form(),
                }
            },
            mounted() {
                this.form.show(this.$route.params.id);
            },
            template: form_html,
        },
    },
    template: edit_html,
}