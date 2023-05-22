import type { ProductTypeInformation } from "./product-type"

export type ProductRegister = {
  id?: number
  value: number
  type_id?: number
  description: string
  product_type?: ProductTypeInformation
}

export type ProductInformation = {
  id?: number
  value?: number
  description?: string
  product_type?: ProductTypeInformation
}
