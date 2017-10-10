import table from 'belt/spot/js/amenities/table/index';
import heading_html from 'belt/core/js/templates/heading.html';
import html from 'belt/spot/js/amenities/list/template.html';

export default {
    components: {
        heading: {template: heading_html},
        index: table,
    },
    template: html
}