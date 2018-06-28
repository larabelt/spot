import edit from 'belt/spot/js/events/edit/shared';
import attachments from 'belt/content/js/clippables/ctlr/index';

export default {
    mixins: [edit],
    components: {
        edit: attachments,
    },
}