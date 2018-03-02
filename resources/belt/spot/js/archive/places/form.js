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
            team_id: '',
            is_active: 0,
            name: '',
            slug: '',
            rating: '',
            body: '',
            intro: '',
            phone: '',
            phone_tollfree: '',
            hours: '',
            url: '',
            email: '',
            meta_title: '',
            meta_description: '',
            meta_keywords: '',
            starts_at: '',
            ends_at: '',
            template: '',
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

export default PlaceForm;