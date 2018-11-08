import Form from 'belt/spot/js/places/form';
import tile from 'belt/core/js/tiles/default';
import html from 'belt/spot/js/places/tiles/default/template.html';

export default {
    mixins: [tile],
    data() {
        return {
            form: new Form(),
            entity_type: 'places',
        }
    },
    computed: {
        attachments() {
            return _.get(this.place, 'attachments', []);
        },
        id() {
            let param = _.find(this.params, {
                key: 'places',
            });

            return _.get(param, 'value');
        },
        name() {
            return _.get(this.place, 'name', '');
        },
        place() {
            return this.form;
        },
        summary() {
            let content = _.get(this.place, 'body', _.get(this.place, 'intro', _.get(this.place, 'meta_description', '')));

            if (content.length > 100) {
                content = content.substring(0, 100) + '...';
            }

            return content.replace(/<\/?[^>]+(>|$)/g, "");
        },
    },
    watch: {
        'id': function (id) {
            if (id) {
                this.form.show(this.id);
            }
        }
    },
    mounted() {
        this.form.show(this.id);
    },
    template: html,
}