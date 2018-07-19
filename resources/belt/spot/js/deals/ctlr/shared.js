import Form from 'belt/spot/js/deals/form';

export default {
    data() {
        return {
            entity_type: 'deals',
            entity_id: this.$parent.entity_id ? this.$parent.entity_id : this.$route.params.id,
            deal: this.$parent.deal ? this.$parent.deal : new Form(),
        }
    },
    mounted() {
        this.deal.show(this.entity_id);
    }
}