import Form from 'belt/spot/js/itinerary-places/form';

export default {
    props: {
        itineraryPlace: {},
    },
    data() {
        return {
            morphable_id: this.$parent.morphable_id,
            active: this.$parent.active,
            form: new Form({
                morphable_type: this.$parent.morphable_type,
                morphable_id: this.$parent.morphable_id,
            }),
            itineraryPlaces: this.$parent.itineraryPlaces,
            modes: this.$parent.modes,
            moving: this.$parent.moving,
            places: this.$parent.places,
            scroll: this.$parent.scroll,
        }
    },
    computed: {
        mode() {
            return this.modes.active;
        },
        isFirst() {
            return this.itineraryPlace.position == 1;
        },
        isMoving() {
            return this.itineraryPlace.id == this.moving.id;
        },
        place() {
            return this.active.place ? this.active.place : {};
        }
    },
    methods: {
        close() {
            this.reset();
            window.scrollTo(0, this.scroll.y);
            this.scroll.y = 0;
        },
        move(id, position) {
            return new Promise((resolve, reject) => {
                this.moving.move = position;
                this.moving.position_entity_id = id;
                this.moving.submit()
                    .then(() => {
                        this.reset();
                    });
            });
        },
        reset() {
            return new Promise((resolve, reject) => {
                this.modes.active = 'index';
                this.$router.push({params: {place: null}});
                this.active.reset();
                this.moving.reset();
                this.itineraryPlaces.index()
                    .then(function () {
                        resolve();
                    })
                    .catch(function () {
                        reject();
                    });
            });

        },
        setActive(id) {
            return new Promise((resolve, reject) => {
                this.modes.active = 'edit';
                this.$router.push({params: {place: id}});
                this.scroll.y = window.pageYOffset;
                window.scrollTo(0, 0);
                this.active.show(id)
                    .then(function () {
                        resolve();
                    })
                    .catch(function () {
                        reject();
                    });
            });
        },
    },
}