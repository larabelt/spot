import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';
import moment from 'moment';

class eventForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/events/'});
        this.routeEditName = 'events.edit';
        this.setData({
            id: '',
            attachment_id: '',
            is_active: 0,
            name: '',
            slug: '',
            intro: '',
            body: '',
            phone: '',
            phone_tollfree: '',
            url: '',
            meta_title: '',
            meta_description: '',
            meta_keywords: '',
            starts_at: '',
            ends_at: '',
            template: '',
        })
    }

    getAttachmentId() {
        return this.attachment_id;
    }

}

export default eventForm;