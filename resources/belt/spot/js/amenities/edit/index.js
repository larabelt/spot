import form from 'belt/spot/js/amenities/form';
import html from 'belt/spot/js/amenities/edit/template.html';

export default {
    mixins: [form],
    components: {
        edit: form,
    },
    template: html,
}