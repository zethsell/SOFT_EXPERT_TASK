import type { Detail } from "."

export type SellRegister = {
  id?: number
  description: string
}

export type SellInformation = {
  id: number
  description: string
  details: Detail[]
  created_at:string
}
