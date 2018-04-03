import edit from 'belt/spot/js/events/edit/shared';
import sections from 'belt/content/js/sectionables/router/index';

export default {
    mixins: [edit],
    components: {
        edit: sections,
    },
}