import { alertError } from "@/helpers"
import { api, headers } from "."

const {bearer} = headers()

export const apiGet = async (route:string) =>  await api
.get(route, bearer())
.then(async ({ data }) => data)
.catch(async (err) => {
  if(err.response.status === 404){
    await alertError('Error', 'Not Found!')
    return
  }
  await alertError('Error', err.response.data.error.message)
})


export const apiPost = async (route:string, data:any) =>  await api
.post(route, data,bearer())
.then(async ({ data }) => data)
.catch(async (err) => {
  await alertError('Error', err.response.data.error.message)
})

export const apiPut = async (route:string, data:any) =>  await api
.put(route, data,bearer())
.then(async ({ data }) => data)
.catch(async (err) => {
  await alertError('Error', err.response.data.error.message)
})

export const apiDelete = async (route:string) =>  await api
.delete(route, bearer())
.catch(async (err) => {
  await alertError('Error', err.response.data.error.message)
})