import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

class Form extends BaseForm {

    /**
     * Create a new Form instance.
     *
     * @param {object} options
     */
    constructor(options = {}) {
        super(options);

        let baseUrl = `/api/v1/${this.morphable_type}/${this.morphable_id}/addresses/`;

        this.service = new BaseService({baseUrl: baseUrl});
        this.setData({
            id: '',
            nickname: '',
            name: '',
            line1: '',
            line2: '',
            line3: '',
            line4: '',
            locality: '',
            sub_locality: '',
            postcode: '',
            region: '',
            country: '',
            location: '',
            lat: 0,
            north_lat: 0,
            south_lat: 0,
            lng: 0,
            east_lng: 0,
            west_lng: 0,
            altitude: 0,
            zoom: 15,
        });
    }

}

export default Form;