import headingTemplate from 'ohio/core/js/templates/base/heading';
import placeService from './service';
import placeFormTemplate from './templates/form';

export default {
    components: {
        'heading': {
            data() {
                return {
                    title: 'Place Editor',
                    subtitle: '',
                    crumbs: [
                        {route: 'placeIndex', text: 'Manager'}
                    ],
                }
            },
            'template': headingTemplate
        },
        'place-form': {
            mixins: [placeService],
            template: placeFormTemplate,
            mounted() {
                this.item.id = this.$route.params.id;
                this.get();
            },
        },
    },
    template: `
        <div>
            <heading></heading>
            <section class="spot">
                <div class="row">
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit Place</h3>
                            </div>
                            <place-form></place-form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        `
}