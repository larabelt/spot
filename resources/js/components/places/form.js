import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

class PlaceForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/places/'});
        this.routeEditName = 'places.edit';
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
            meta_title: '',
            meta_description: '',
            meta_keywords: '',
        })
    }

    getAttachmentId() {
        return this.attachment_id;
    }

}

export default PlaceForm;