import edit from 'belt/spot/js/events/edit/shared';
import categories from 'belt/glue/js/categorizables/ctlr-edit';

export default {
    mixins: [edit],
    components: {
        edit: categories,
    },
}