<script>
    $(document).ready(function() {
        $('#role').change(function() {
            var selectedRole = $(this).val();
            var psychologistField = $('#psychologistField');

            if (selectedRole === 'admin') {
                psychologistField.hide();
            } else {
                psychologistField.show();
            }
        });

        $('#psychologist_id').change(function() {
            var selectedPsychologistName = $('#psychologist_id option:selected').text().split(' - ')[1];
            $('#name').val(selectedPsychologistName);
        });
    });
</script>
