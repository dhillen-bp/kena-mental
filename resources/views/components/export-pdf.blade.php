<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    {{-- Custom CSS --}}
    <style type="text/css">
        .bg-purple {
            background-color: #A46FDA;
            color: white;
        }

        .border-purple {
            border-color: #A46FDA;
        }

        .btn-purple {
            background-color: #A46FDA;
            color: white;
        }

        .btn-purple:hover {
            background-color: #9854dd;
            color: white;
        }
    </style>
</head>

<body>
    <div class="col w-75 mx-auto mt-5">
        <div class="card border-purple mb-3">
            <div class="card-header border-purple"
                style="float: none; margin: 0 auto; text-align: center; background-color: transparent;">
                <h5 class="card-title">Consultation</h5>
                <small class="text-sm">{{ $consultationArray['booking_date'] }}</small>
            </div>
            <div class="card-body">
                <div style="float: left; width: 50%;">
                    <p class="text-secondary" style="margin: 0; padding: 0;">Psychologist:
                        {{ $consultationArray['psychologists']['name'] }}</p>
                </div>
                <div style="float: right; width: 50%;">
                    <p class="" style="margin: 0; padding: 0; text-align: right;">To:
                        {{ $consultationArray['users']['name'] }}</p>
                </div>
                <h6 class="text-center">Notes</h6>
                <hr>
                <p class="card-text">{{ $consultationArray['notes'] }}</p>
            </div>
        </div>
    </div>
</body>


</html>
