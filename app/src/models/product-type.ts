import type { TaxInformation } from "."

export type ProductTypeRegister = {
  id?: number
  description: string
  taxes:TaxInformation[]
}

export type ProductTypeInformation = {
  id: number
  description: string
  taxes:TaxInformation[]
}
