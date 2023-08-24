<script>
    @if (Session::has('success'))
        _toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        _toastr.success("{{ session('success') }}");
    @endif

    // @if ($errors->any())
    //     _toastr.options = {
    //         "closeButton": true,
    //         "progressBar": true
    //     }
    //     @foreach ($errors->all() as $error)
    //         _toastr.error("{{ $error }}");
    //     @endforeach
    // @endif

    @if (Session::has('error'))
        _toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        _toastr.error("{{ session('error') }}");
    @endif
</script>
