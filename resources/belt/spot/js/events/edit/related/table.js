import BaseTable from 'belt/core/js/helpers/table';

class Table extends BaseTable {

    constructor(options = {}) {
        options.baseUrl = `/api/v1/index/`;
        super(options);
        this.query.event_id = this.entity_id;
    }

}

export default Table;