
export default {
    props: {
        address: {},
    },
    data() {
        return {
            morphable_id: this.$parent.morphable_id,
            morphable_type: this.$parent.morphable_type,
            addresses: this.$parent.addresses,
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
                this.$router.push({params: {address: null}});
                this.modes.active = 'index';
                this.form.reset();
                this.addresses.index()
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
                this.$router.push({params: {address: id}});
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