import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';
import moment from 'moment';

class dealForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/deals/'});
        this.routeEditName = 'deals.edit';
        this.setData({
            id: '',
            attachment_id: '',
            is_active: 0,
            name: '',
            slug: '',
            intro: '',
            body: '',
            starts_at: '',
            ends_at: '',
        })
    }

    getAttachmentId() {
        return this.attachment_id;
    }

}

export default dealForm;