import form from 'belt/spot/js/amenities/form';
import heading_html from 'belt/core/js/templates/heading.html';
import html from 'belt/spot/js/amenities/edit/template.html';

export default {
    components: {
        heading: {template: heading_html},
        edit: form,
    },
    template: html,
}