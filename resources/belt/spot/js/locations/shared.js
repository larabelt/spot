
export default {
    props: {
        location: {},
    },
    data() {
        return {
            entity_id: this.$parent.entity_id,
            entity_type: this.$parent.entity_type,
            locations: this.$parent.locations,
            form: this.$parent.form,
            modes: this.$parent.modes,
        }
    },
    computed: {
        mode() {
            return this.modes.active;
        }
    },
    methods: {
        close() {
            this.reset();
        },
        reset() {
            return new Promise((resolve, reject) => {
                this.$router.push({params: {location: null}});
                this.modes.active = 'index';
                this.form.reset();
                this.locations.index()
                    .then(function () {
                        resolve();
                    })
                    .catch(function () {
                        reject();
                    });
            });
        },
        saveCoordinates (payload) {
            this.form.lat = payload.lat;
            this.form.lng = payload.lng
        },
        setEditing(id) {
            return new Promise((resolve, reject) => {
                this.$router.push({params: {location: id}});
                this.modes.active = 'edit';
                this.form.show(id)
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