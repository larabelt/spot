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
            moving: this.$parent.moving,
            table: this.$parent.table,
            morphable_type: this.$parent.morphable_type,
            morphable_id: this.$parent.morphable_id,
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
        setMoving(amenity) {
            if (!this.moving.id) {
                this.moving.setData(amenity);
                //this.table.updateQuery({template: 'group'});
                //this.table.index();
            } else {
                this.moving.reset();
            }
        },
    },
    template: html,
}