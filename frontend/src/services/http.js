import axios, { AxiosInstance  } from 'axios'

const axiosInstance  = axios.create({
    baseURL: 'http://localhost:8000',
    Headers: {
        "content-type": "application/jso"
    }
})

export default axiosInstance