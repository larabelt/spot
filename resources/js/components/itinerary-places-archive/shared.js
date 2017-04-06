// templates

export default {
    data() {
        return {
            morphable_type: 'itineraries',
            morphable_id: this.$route.params.id,
            itinerary: this.$parent.itinerary,
            //form: this.$parent.form,
            table: this.$parent.table,
        }
    },
}