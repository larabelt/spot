import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

class ItineraryForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/itineraries/'});
        this.routeEditName = 'itineraries.edit';
        this.setData({
            id: '',
            name: '',
            slug: '',
            rating: '',
            heading: '',
            body: '',
            meta_title: '',
            meta_keywords: '',
            meta_description: '',
            template: '',
        })
    }

}

export default ItineraryForm;