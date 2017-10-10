import row from 'belt/spot/js/amenities/table/row';
import filterSearch from 'belt/core/js/inputs/filter-search';
import Form from 'belt/spot/js/amenities/helpers/form';
import Table from 'belt/spot/js/amenities/helpers/table';
import TreeForm from 'belt/spot/js/amenities/helpers/tree';
import html from 'belt/spot/js/amenities/table/template.html';

export default {
    props: {
        mode: {default: 'admin'},
    },
    data() {
        return {
            loading: false,
            moving: new Form(),
            table: new Table({router: this.$router}),
            morphable_type: 'amenities',
            morphable_id: null,
        }
    },
    computed: {
        isMoving() {
            return this.moving.id;
        },
    },
    methods: {
        cancelMove() {
            this.moving.reset();
        },
        filter: _.debounce(function (query) {
            if (query) {
                query.page = 1;
                this.table.updateQuery(query);
            }
            this.table.index()
                .then(() => {
                    this.table.pushQueryToHistory();
                    this.table.pushQueryToRouter();
                });
        }, 500),
        move(id, position) {
            return new Promise((resolve, reject) => {

                let tree = new TreeForm({amenity: this.moving});

                tree.setData({
                    neighbor_id: id,
                    move: position,
                });

                tree.submit()
                    .then(() => {
                        this.moving.reset();
                        this.table.index();
                        resolve();
                    })
                    .catch(() => {
                        reject();
                    });
            });
        },
        setMoving(id) {
            if (!this.moving.id) {
                this.moving.show(id);
            } else {
                this.moving.reset();
            }
        },
    },
    mounted() {
        this.table.updateQueryFromHistory();
        this.table.updateQueryFromRouter();
        this.table.pushQueryToRouter();

        this.loading = true;

        this.table.index()
            .then(() => {
                this.loading = false;
            });
    },
    components: {
        filterSearch,
        row,
    },
    template: html,
}