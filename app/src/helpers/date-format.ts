// @ts-nocheck
export const convertDate = (date: string) => {
  const withNoDot = date.split('.').at(0)
  const dateParts = String(withNoDot?.split('T') ?? [])
  const hour = dateParts.at(-1)
  const reverseDate = dateParts.at(0)?.split('-').reverse().join('/')
  return ` ${reverseDate} ${hour}`
}