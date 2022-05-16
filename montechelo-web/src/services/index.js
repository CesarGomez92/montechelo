import axios from 'axios'

function business () {
  return axios.create({
    baseURL: process.env.VUE_APP_BUSINESS_URL,
    headers: {'Authorization': `bearer ${process.env.VUE_APP_BUSINESS_TOKEN}`},
  });
}

function exceptions () {
  return axios.create({
    baseURL: process.env.VUE_APP_EXCEPTIONS_URL,
    headers: {'Authorization': `bearer ${process.env.VUE_APP_EXCEPTIONS_TOKEN}`},
  });
}

export {
  business,
  exceptions,
}
