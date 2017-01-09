import headingTemplate from 'ohio/core/js/templates/base/heading';
import addressService from './service';
import addressFormTemplate from './templates/form';

export default {
    components: {
        'heading': {
            data() {
                return {
                    title: 'Address Editor',
                    subtitle: '',
                    crumbs: [
                        {route: 'addressIndex', text: 'Manager'}
                    ],
                }
            },
            'template': headingTemplate
        },
        'address-form': {
            mixins: [addressService],
            template: addressFormTemplate,
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
                                <h3 class="box-title">Edit Address</h3>
                            </div>
                            <address-form></address-form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        `
}