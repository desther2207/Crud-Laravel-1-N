@session('message')
<script>
    Swal.fire({
        icon: "success",
        title: "{{session('message')}}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endsession