@if(Session::has('status'))
<script> 
        var type = "{{ Session::get('status') }}"
        switch(type){           
            case 'success':
                Swal.fire({
                icon: 'success',
                title: '{{ Session::get('title') }}',
                text: '{{ Session::get('message') }}',               
                })
            break;
            case 'error':
                Swal.fire({
                icon: 'error',
                title: '{{ Session::get('title') }}',
                text: '{{ Session::get('message') }}',               
                })
            break;
            case 'info':
                Swal.fire({
                icon: 'info',
                title: '{{ Session::get('title') }}',
                text: '{{ Session::get('message') }}',               
                })
            break;
            case 'update':
                Swal.fire({
                icon: 'sucess',
                title: '{{ Session::get('title') }}',
                text: '{{ Session::get('message') }}',               
                })
            break;
            case 'toast_success':
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

            Toast.fire({
              icon: 'success',
              title: '{{ Session::get('title') }}'
            }) 
    }     
    </script>
@endif