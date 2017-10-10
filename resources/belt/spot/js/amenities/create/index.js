import form from 'belt/spot/js/amenities/form';
import heading_html from 'belt/core/js/templates/heading.html';
import html from 'belt/spot/js/amenities/create/template.html';

export default {
    components: {
        heading: {template: heading_html},
        create: form
    },
    template: html
}