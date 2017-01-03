import headingTemplate from 'ohio/core/js/templates/base/heading';
import addresseservice from './service';
import addressFormTemplate from './templates/form';

export default {
    components: {
        'heading': {
            data() {
                return {
                    title: 'Address Creator',
                    subtitle: '',
                    crumbs: [
                        {route: 'addressIndex', text: 'Manager'}
                    ],
                }
            },
            'template': headingTemplate
        },
        'address-form': {
            mixins: [addresseservice],
            template: addressFormTemplate,
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
                                <h3 class="box-title">Create Address</h3>
                            </div>
                            <address-form></address-form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        `
}