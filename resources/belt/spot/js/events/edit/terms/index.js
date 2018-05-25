import edit from 'belt/spot/js/events/edit/shared';
import terms from 'belt/content/js/termables/ctlr-edit';

export default {
    mixins: [edit],
    components: {
        edit: terms,
    },
}