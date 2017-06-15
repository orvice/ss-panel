import axios from 'axios'

let data;

axios.get('/api/config')
    .then(function (response) {
        // console.log(response.data.data);
        data =  response.data.data
    })
    .catch(function (error) {
        console.log(error);
    });

export default data