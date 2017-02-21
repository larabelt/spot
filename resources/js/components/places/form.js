import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

class PlaceForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/places/'});
        this.routeEditName = 'places.edit';
        this.setData({
            id: '',
            is_active: 0,
            name: '',
            slug: '',
            body: '',
        })
    }

}

export default PlaceForm;