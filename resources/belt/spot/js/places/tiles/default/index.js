import tile from 'belt/core/js/base/tile';
import html from 'belt/spot/js/places/tiles/default/template.html';

export default {
    mixins: [tile],
    computed: {
        place() {
            return this.item;
        },
    },
    template: html,
}