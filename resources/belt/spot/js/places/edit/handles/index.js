import edit from 'belt/spot/js/places/edit/shared';
import HandleableManager from 'belt/content/js/handleables/Manager';

export default {
    mixins: [edit],
    components: {
        edit: HandleableManager,
    },
}