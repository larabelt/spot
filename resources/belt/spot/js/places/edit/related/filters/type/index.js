import filter from 'belt/spot/js/inputs/filter-base';
import Table from 'belt/spot/js/places/edit/related/table';
import html from 'belt/spot/js/places/edit/related/filters/type/template.html';

export default {
    mixins: [filter],
    props: {},
    data() {
        return {
            groupedItems: new Table({
                morphable_type: this.morphable_type,
                morphable_id: this.morphable_id,
            }),
            indexable_type: null,
        }
    },
    computed: {
        options() {
            let options = {
                '': '',
            };
            let items = _.uniqBy(this.groupedItems.items, 'indexable_type');
            items = _.sortBy(items, [function (o) {
                return o.indexable_type ? o.indexable_type : 1;
            }]);
            _.forEach(items, (item) => {
                //options.push(item.indexable_type);
                options[item.indexable_type] = item.indexable_type;
            });
            return options;
        },
        show() {
            return _.size(this.options) > 2;
        }
    },
    mounted() {
        this.groupedItems.updateQuery({
            groupBy: 'indexable_type',
        });
        this.groupedItems.index();
    },
    watch: {
        'table.query.indexable_type': function (indexable_type) {
            if (indexable_type) {
                this.indexable_type = indexable_type;
            }
        }
    },
    methods: {
        change() {
            //this.table.updateQuery({indexable_type: null});
            delete this.table.query.indexable_type;
            if (this.indexable_type) {
                this.table.updateQuery({indexable_type: this.indexable_type});
            }
            this.$emit('filter-indexable_type-update');
        },
    },
    template: html
}