import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

class ItineraryForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/itineraries/'});
        this.routeEditName = 'itineraries.edit';
        this.setData({
            id: '',
            attachment_id: '',
            is_active: 0,
            name: '',
            slug: '',
            body: '',
            intro: '',
            phone: '',
            phone_tollfree: '',
        })
    }

    getAttachmentId() {
        return this.attachment_id;
    }

}

export default ItineraryForm;