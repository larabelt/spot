import BaseTable from 'belt/core/js/helpers/table';
import BaseService from 'belt/core/js/helpers/service';

class AmenityTable extends BaseTable {

    constructor(options = {}) {
        super(options);
        let baseUrl = `/api/v1/${this.entity_type}/${this.entity_id}/amenities/`;
        this.service = new BaseService({baseUrl: baseUrl});
    }

}

export default AmenityTable;