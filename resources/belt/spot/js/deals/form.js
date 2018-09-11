import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';
import * as URI from 'uri-js/dist/es5/uri.all.js';

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
            rating: '',
            intro: '',
            body: '',
            starts_at: '',
            ends_at: '',
            url: '',
            priority: 0,
        })
    }

    getAttachmentId() {
        return this.attachment_id;
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

export default dealForm;