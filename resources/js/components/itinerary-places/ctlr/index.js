// components
import edit from './edit';
import panel from './panel';

// helpers
import Form from '../form';
import Table from '../table';
import PlaceTable from '../../places/table';

// templates
import index_html from '../templates/index.html';

export default {
    data() {
        return {
            morphable_id: this.$parent.morphable_id,
            active: new Form({
                morphable_id: this.$parent.morphable_id,
            }),
            form: new Form({
                morphable_id: this.$parent.morphable_id,
            }),
            itineraryPlaces: new Table({
                morphable_id: this.$parent.morphable_id,
            }),
            places: new PlaceTable(),
            modes: {
                active: 'index',
            },
            moving: new Form({
                morphable_id: this.$parent.morphable_id,
            }),
            scroll: {x: 0, y: 0},
        }
    },
    created() {
        this.itineraryPlaces.index();
    },
    mounted() {
        let itinerary_place_id = this.$route.params.place;
        if (itinerary_place_id) {
            this.modes.active = 'edit';
            this.active.show(itinerary_place_id);
        }
    },
    components: {edit, panel},
    computed: {
        mode() {
            return this.modes.active;
        }
    },
    methods: {
        attach(place_id) {
            this.form.setData({
                itinerary_id: this.morphable_id,
                place_id: place_id,
            });
            this.form.store()
                .then(() => {
                    this.itineraryPlaces.index();
                    this.places.query.q = '';
                })
        },
    },
    template: index_html
}