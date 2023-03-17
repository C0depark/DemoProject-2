import "axios"
import axios from "axios";

export default {
    async getTableData(search = '') {
        let params = '?search=' + search;
        let uri = '/api/get_characters';

        if (search !== '') {
            uri += params;
        }

        return (await axios.get(uri)
            .catch(function (error) {
                console.log(error);
            })).data.docs;
    }
}
