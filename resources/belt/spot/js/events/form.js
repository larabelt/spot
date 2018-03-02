import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';
import * as URI from 'uri-js/dist/es5/uri.all.js';

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

    normalizeUrl() {
        if (this.url) {
            let bits = URI.parse(this.url);
            if (!bits.scheme) {
                this.url = 'http://' + this.url;
            }
            this.url = URI.normalize(this.url);
        }
    }

}

export default EventForm;