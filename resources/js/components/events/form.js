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
            let starts_at = moment(this.starts_at);
            this.starts_at_date = starts_at.format("YYYY-MM-DD");
            this.starts_at_time = starts_at.format("HH:mm");
        }

        if (this.ends_at) {
            let ends_at = moment(this.ends_at);
            this.ends_at_date = ends_at.format("YYYY-MM-DD");
            this.ends_at_time = ends_at.format("HH:mm");
        }
    }

    data() {
        if (this.starts_at_date || this.starts_at_time) {
            let starts_at = moment(this.starts_at_date + ' ' + this.starts_at_time);
            this.starts_at = starts_at.format("YYYY-MM-DD HH:mm:00");
        }

        if (this.ends_at_date || this.ends_at_time) {
            let ends_at = moment(this.ends_at_date + ' ' + this.ends_at_time);
            this.ends_at = ends_at.format("YYYY-MM-DD HH:mm:00");
        }

        return super.data();
    }

}

export default eventForm;