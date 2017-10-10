import Form from 'belt/spot/js/amenities/helpers/form';
import Table from 'belt/spot/js/amenities/helpers/table';
import TreeForm from 'belt/spot/js/amenities/helpers/tree';
import html from 'belt/spot/js/amenities/table/row/template.html';

export default {
    props: {
        item: {
            default: {}
        },
        mode: {default: 'admin'},
    },
    data() {
        return {
            loading: false,
            moving: new Form(),
            table: this.$parent.table,
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
        confirm(amenity) {
            this.$parent.$emit('select-amenity', amenity);
        },
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
        parentCheck(amenity) {
            let output = `<b>${amenity.name}</b>`;

            if (amenity.hierarchy.length > 1) {
                output = '';
                amenity.hierarchy.forEach((item, index) => {
                    let name = `(${item.id}) ${item.name} > `;

                    if (index == amenity.hierarchy.length - 1) {
                        name = `<b>${item.name}</b>`;
                    }
                    output = output + name;
                });
            }

            return output;
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

    },
    template: html,
}