import shared from 'belt/core/js/inputs/shared';
import PlaceTable from 'belt/spot/js/places/table';
import PlaceForm from 'belt/spot/js/places/form';
import html from 'belt/spot/js/places/inputs/template.html';

export default {
    mixins: [shared],
    data() {
        return {
            place: new PlaceForm(),
            places: new PlaceTable({query: {perPlace: 20}}),
        };
    },
    created() {
        this.config.label = _.get(this.config, 'label', 'Place');
        this.config.description = _.get(this.config, 'description', 'Use the search field to find places that can be linked to this item.');
        this.$watch('form.' + this.column, function (newValue) {
            this.place.show(newValue);
        });
    },
    mounted() {
        if (this.value) {
            this.place.show(this.value);
        }
    },
    methods: {
        clear() {
            this.places.query.q = '';
        },
        update(id) {
            this.form[this.column] = id;
            this.clear();
            this.emitEvent();
        },
    },
    components: {},
    template: html
}