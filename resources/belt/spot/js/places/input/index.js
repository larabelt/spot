import list from 'belt/spot/js/places/list';
import Form from 'belt/spot/js/places/form';
import Table from 'belt/spot/js/places/table';
import html from 'belt/spot/js/places/input/template.html';

export default {
    props: ['form'],
    data() {
        return {
            place: new Form(),
            search: false,
            table: new Table(),
        }
    },
    watch: {
        'form.place_id': function (new_place_id) {
            if (new_place_id) {
                this.place.show(new_place_id);
            }
        }
    },
    methods: {
        filter: _.debounce(function (query) {
            this.table.index();
        }, 500),
        toggle() {
            if (!this.search) {
                this.table.index();
            }
            this.search = !this.search;
        },
        clear() {
            this.form.place_id = null;
            this.place.reset();
            this.search = false;
        },
        setPlace(place) {
            this.form.place_id = place.id;
            this.place.setData(place);
            this.search = false;
        }
    },
    components: {
        list
    },
    template: html
}