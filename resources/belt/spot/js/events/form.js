import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

class EventForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/events/'});
        this.routeEditName = 'events.edit';
        this.setData({
            id: '',
            default_user_id: null,
            is_active: false,
            name: '',
            slug: '',
            body: '',
        })
    }

}

export default EventForm;