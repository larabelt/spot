import adminUrls from 'belt/spot/js/mixins/admin-urls';
import html from 'belt/spot/js/places/edit/related/row-item/template.html';

export default {
    mixins: [adminUrls],
    props: {
        'item': {
            default: null,
        }
    },
    computed: {
        editUrl() {
            return this.adminEditUrl(this.item.id, this.item.indexable_type);
            let beltPackage = 'spot';
            let compiled = _.template('/admin/belt/${package}/${type}/edit/${id}');
            return compiled({
                package: beltPackage,
                type: this.item.indexable_type,
                id: this.item.indexable_id,
            });
        },
        id() {
            return this.item.id;
        },
        title() {
            return 'edit ' + this.type;
        },
        type() {
            return this.item.indexable_type;
        },
    },
    template: html,
}