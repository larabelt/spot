import Form from 'belt/spot/js/places/form';
import store from 'belt/spot/js/places/store';
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/places/templates/tabs.html';
import edit_html from 'belt/spot/js/places/templates/edit.html';

export default {
    data() {
        return {
            //config: new Config(),
            morphable_type: 'places',
            morphable_id: this.$route.params.id,
            place: new Form(),
        }
    },
    created() {
        if (!this.$store.state[this.storeKey]) {
            this.$store.registerModule(this.storeKey, store);
            this.$store.dispatch(this.storeKey + '/construct', {id: this.morphable_id});
        }
        this.place.show(this.morphable_id)
            .then(() => {
                this.$store.dispatch(this.storeKey + '/load', this.place);
            });
    },
    // mounted() {
    //     this.place.show(this.morphable_id)
    //         .then(() => {
    //             this.config.setService('places', this.place.template);
    //             this.config.load()
    //                 .then((response) => {
    //                 });
    //         });
    // },
    computed: {
        config() {
            return this.$store.getters[this.storeKey + '/config/data'];
        },
        storeKey() {
            return 'places' + this.morphable_id;
        }
    },
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
    },
    template: edit_html,
}