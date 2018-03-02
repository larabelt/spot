import BaseTable from 'belt/core/js/helpers/table';
import BaseService from 'belt/core/js/helpers/service';

class eventTable extends BaseTable {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/events/'});
        this.query.starts_at = '';
        this.query.ends_at = '';
    }

}

export default eventTable;