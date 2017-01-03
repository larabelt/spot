import headingTemplate from 'ohio/core/js/templates/base/heading';
import placeService from './service';
import placeIndexTemplate from './templates/index';

export default {

    components: {
        'heading': {
            data() {
                return {
                    title: 'Place Manager',
                    subtitle: '',
                    crumbs: [],
                }
            },
            'template': headingTemplate
        },
        'place-index': {
            mixins: [placeService],
            template: placeIndexTemplate,
            mounted() {
                this.query = this.getUrlQuery();
                this.paginate();
            },
        },
    },

    template: `
        <div>
            <heading></heading>
            <section class="spot">
                <place-index></place-index>
            </section>
        </div>
        `
}