import edit from 'belt/spot/js/places/edit/shared';
import terms from 'belt/content/js/termables/ctlr-edit';

export default {
    mixins: [edit],
    components: {
        edit: terms,
    },
}