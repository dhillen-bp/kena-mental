<script>
    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @elseif (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
    @endif
    // @if ($errors->any())
    //     toastr.options = {
    //         "closeButton": true,
    //         "progressBar": true
    //     }
    //     @foreach ($errors->all() as $error)
    //         toastr.error("{{ $error }}");
    //     @endforeach
    // @endif
</script>
