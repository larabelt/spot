import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

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
        })
    }

    getAttachmentId() {
        return this.attachment_id;
    }

    setData(data) {
        super.setData(data);

        if (this.starts_at) {
            let starts_at = new Date(this.starts_at);
            this.starts_at_date = dateformat(starts_at, "yyyy-mm-dd");
            this.starts_at_time = dateformat(starts_at, "HH:MM");
        }

        if (this.ends_at) {
            let ends_at = new Date(this.ends_at);
            this.ends_at_date = dateformat(ends_at, "yyyy-mm-dd");
            this.ends_at_time = dateformat(ends_at, "HH:MM");
        }
    }

}

export default eventForm;