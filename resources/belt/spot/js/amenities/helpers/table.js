import BaseTable from 'belt/core/js/helpers/table';
import BaseService from 'belt/core/js/helpers/service';

class AmenityTable extends BaseTable {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/amenities/'});
        this.name = 'admin.amenities';
        this.updateQuery({template:'',not_in:''});
    }

}

export default AmenityTable;