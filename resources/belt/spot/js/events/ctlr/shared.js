import Form from 'belt/spot/js/events/form';
import store from 'belt/spot/js/events/store';
import heading_html from 'belt/core/js/templates/heading.html';
import tabs_html from 'belt/spot/js/events/templates/tabs.html';
import edit_html from 'belt/spot/js/events/templates/edit.html';

export default {
    data() {
        return {
            //config: new Config(),
            morphable_type: 'events',
            morphable_id: this.$route.params.id,
            event: new Form(),
        }
    },

    created() {
        if (!this.$store.state[this.storeKey]) {
            this.$store.registerModule(this.storeKey, store);
            this.$store.dispatch(this.storeKey + '/construct', {id: this.morphable_id});
        }
        this.event.show(this.morphable_id)
            .then(() => {
                this.$store.dispatch(this.storeKey + '/load', this.event);
            });
    },
    computed: {
        config() {
            return this.$store.getters[this.storeKey + '/config/data'];
        },
        storeKey() {
            return 'events' + this.morphable_id;
        }
    },
    components: {
        heading: {template: heading_html},
        tabs: {template: tabs_html},
    },
    // mounted() {
    //     this.event.show(this.morphable_id)
    //         .then(() => {
    //             this.config.setService('events', this.event.template);
    //             this.config.load()
    //                 .then((response) => {
    //                 });
    //         });
    // },
    template: edit_html,
}