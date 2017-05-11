import Form from '../form';

export default {
    data() {
        return {
            morphable_type: 'deals',
            morphable_id: this.$parent.morphable_id,
            deal: new Form(),
        }
    },
    mounted() {
        this.deal.show(this.morphable_id);
    }
}