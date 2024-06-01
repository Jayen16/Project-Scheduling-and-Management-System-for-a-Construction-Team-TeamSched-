import './bootstrap';

window.addEventListener('alert',(event) => {
    let data = event.detail;

    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: false,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: data.title
      });
});