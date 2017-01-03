import addressableService from './service';
import addressableIndexTemplate from './templates/index';

export default {
    data() {
        return {
            addressable_type: this.$parent.morphable_type,
            addressable_id: this.$parent.morphable_id,
        }
    },
    components: {
        'addressable-index': {
            mixins: [addressableService],
            template: addressableIndexTemplate,
            data() {
                return {
                    addressable_type: this.$parent.addressable_type,
                    addressable_id: this.$parent.addressable_id,
                }
            },
            mounted() {
                this.paginate();
            },
        },
    },
    template: `
        <div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Addresses</h3>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <addressable-index></addressable-index>
                    </div>
                </div>
            </div>
        </div>
        `
}