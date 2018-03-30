import shared from 'belt/core/js/inputs/shared';
import ItineraryTable from 'belt/spot/js/itineraries/table';
import ItineraryForm from 'belt/spot/js/itineraries/form';
import html from 'belt/spot/js/inputs/itineraries/template.html';

export default {
    mixins: [shared],
    data() {
        return {
            itinerary: new ItineraryForm(),
            itineraries: new ItineraryTable({query: {perPage: 20}}),
        };
    },
    created() {
        this.config.label = _.get(this.config, 'label', 'Itinerary');
        this.config.description = _.get(this.config, 'description', 'Use the search field to find itineraries that can be linked to this item.');
        this.$watch('form.' + this.column, function (newValue) {
            this.itinerary.show(newValue);
        });
    },
    mounted() {
        if (this.value) {
            this.itinerary.show(this.value);
        }
    },
    methods: {
        clear() {
            this.itineraries.query.q = '';
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