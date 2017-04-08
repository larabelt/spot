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
            starts_at: '',
            starts_at_date: '',
            starts_at_time: '',
            ends_at: '',
            ends_at_date: '',
            ends_at_time: '',
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

    setData(data) {
        super.setData(data);

        if (this.starts_at) {
            let starts_at = moment(this.starts_at);
            this.starts_at_date = starts_at.format("YYYY-MM-DD");
            this.starts_at_time = starts_at.format("HH:MM");
        }

        if (this.ends_at) {
            let ends_at = moment(this.ends_at);
            this.ends_at_date = ends_at.format("YYYY-MM-DD");
            this.ends_at_time = ends_at.format("HH:MM");
        }
    }

}

export default eventForm;