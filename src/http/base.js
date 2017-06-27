import axios from 'axios';
import store from '../store'

const id = sessionStorage.getItem('id');
const token = sessionStorage.getItem('token');

export default axios.create({
    baseURL: `/api/`,
    headers: {
        Authorization: 'Bearer ' + token,
    }
});