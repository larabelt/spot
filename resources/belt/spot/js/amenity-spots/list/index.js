import shared from 'belt/spot/js/amenity-spots/shared';
import edit from 'belt/spot/js/amenity-spots/edit';
import html from 'belt/spot/js/amenity-spots/list/template.html';

export default {
    mixins: [shared],
    props: {
        morphable_type: {
            default: function () {
                return this.$parent.morphable_type;
            }
        },
        morphable_id: {
            default: function () {
                return this.$parent.morphable_id;
            }
        },
    },
    components: {
        edit: edit,
    },
    template: html
}