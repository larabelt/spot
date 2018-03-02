import edit from 'belt/spot/js/events/edit/shared';
import tags from 'belt/glue/js/taggables/ctlr-edit';

export default {
    mixins: [edit],
    components: {
        edit: tags,
    },
}