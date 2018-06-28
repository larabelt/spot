import edit from 'belt/spot/js/places/edit/shared';
import attachments from 'belt/content/js/clippables/ctlr/index';

export default {
    mixins: [edit],
    components: {
        edit: attachments,
    },
}