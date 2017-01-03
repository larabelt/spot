import placegableService from './service';
import placegableIndexTemplate from './templates/index';

export default {
    data() {
        return {
            placegable_type: this.$parent.morphable_type,
            placegable_id: this.$parent.morphable_id,
        }
    },
    components: {
        'placegable-index': {
            mixins: [placegableService],
            template: placegableIndexTemplate,
            data() {
                return {
                    placegable_type: this.$parent.placegable_type,
                    placegable_id: this.$parent.placegable_id,
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
                    <h3 class="box-title">Places</h3>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <placegable-index></placegable-index>
                    </div>
                </div>
            </div>
        </div>
        `
}