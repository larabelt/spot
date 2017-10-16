import Form from 'belt/spot/js/amenities/helpers/form';
import amenitiesTable from 'belt/spot/js/amenities/table/index';
import html from 'belt/spot/js/amenities/form/template.html';

export default {
    data() {
        return {
            form: new Form({router: this.$router}),
            parentAmenity: new Form(),
            search: false,
        }
    },
    mounted() {
        if (this.$route.params.id) {
            this.form.show(this.$route.params.id)
                .then((response) => {
                    if (response.parent_id) {
                        this.parentAmenity.show(response.parent_id);
                    }
                });
        }
    },
    methods: {
        toggle() {
            this.search = !this.search;
        },
        clearParentAmenity() {
            this.form.parent_id = null;
            this.parentAmenity.reset();
            this.search = false;
        },
        updateParent(amenity) {
            if (amenity.id != this.form.parent_id) {
                this.form.parent_id = amenity.id;
                this.search = false;
                this.parentAmenity.setData(amenity);
            }
        }
    },
    components: {
        amenitiesTable
    },
    template: html,
}