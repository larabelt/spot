import list from 'belt/spot/js/events/list';
import Form from 'belt/spot/js/events/form';
import Table from 'belt/spot/js/events/table';
import html from 'belt/spot/js/events/input/template.html';

export default {
    props: ['form'],
    data() {
        return {
            event: new Form(),
            search: false,
            table: new Table(),
        }
    },
    watch: {
        'form.event_id': function (new_event_id) {
            if (new_event_id) {
                this.event.show(new_event_id);
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
            this.form.event_id = null;
            this.event.reset();
            this.search = false;
        },
        setEvent(event) {
            this.form.event_id = event.id;
            this.event.setData(event);
            this.search = false;
        }
    },
    components: {
        list
    },
    template: html
}