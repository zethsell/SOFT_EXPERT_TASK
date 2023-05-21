import Swal from 'sweetalert2'

export const alertError = async (title = 'Error',text: 'Something went wrong!') => {
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