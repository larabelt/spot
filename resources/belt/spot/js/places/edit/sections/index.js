import edit from 'belt/spot/js/places/edit/shared';
import sections from 'belt/content/js/sectionables/router/index';

export default {
    mixins: [edit],
    components: {
        edit: sections,
    },
}