import Swal from 'sweetalert2'

export const alertError = async (title = 'Error',text = 'Something went wrong!') => {
  await Swal.fire({
    title,
    text,
    icon: 'error',
    confirmButtonColor: '#16a34a'
  })
}

export const alertSuccess = async (title = 'Sucess', text = 'Everything is going OK!') => {
  await Swal.fire({
    title,
    text,
    icon: 'success',
    confirmButtonColor: '#16a34a'
  })
}

export const alertCancelSell = async () => {
  return await Swal.fire({
    title: 'Cancel?',
    text: 'All displayed data will be lost, want to proceed?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Yes',
    confirmButtonColor: '#16a34a',
    denyButtonColor: '#000',
    denyButtonText: 'No',
    icon: 'question'
  }).then(async (result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      return true
    } 
    return false
  })
}