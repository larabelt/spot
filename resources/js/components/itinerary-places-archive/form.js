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
        let baseUrl = `/api/v1/itineraries/${this.morphable_id}/places/`;
        this.service = new BaseService({baseUrl: baseUrl});
        this.setData({
            id: '',
            name: '',
            pivot: {
                heading: '',
                body: '',
            },
        });
    }

    setData(data) {
        if (data.pivot) {
            data.heading = data.pivot.heading;
            data.body = data.pivot.body;
            data.position = data.pivot.position;
        }
        super.setData(data);
    }
}

export default Form;