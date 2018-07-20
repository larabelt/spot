import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

class AmenityForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/amenities/'});
        this.routeEditName = 'amenities.edit';
        this.setData({
            id: '',
            parent_id: '',
            name: '',
            slug: '',
            subtype: '',
            body: '',
            nested_name: '',
            hierarchy: '',
        })
    }

    dropdown() {

        let templates = {
            group: 'group',
            boolean: 'boolean',
            text: 'text',
            textarea: 'textarea',
        };

        return templates;
    }

}

export default AmenityForm;