<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine Favour International School - School Fees Verification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/app.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Verify Your School Fees Payment</h3>
                        <p>Use the Reference number on the email sent to you</p>
                        <form method="POST">

                            <div class="col-md-12 form-group">
                                <input class="form-control" type="text" name="reference" placeholder="Reference" required>
                            </div>

                            <div class="form-group mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Verify</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#submit').click(function(e) {
                e.preventDefault();
                var reference = $('input[name=reference]').val();
                if (!reference) {
                    return false;
                }
                $.ajax({
                    url: 'process/ajax.php',
                    type: 'POST',
                    data: {
                        reference: reference,
                        action: 'verify'
                    },
                    success: function(data) {
                        if (data == 'success') {
                            alert('Payment Verified');
                            setTimeout(() => {
                                window.location.href =  'http://localhost/portala/index.php';
                            }, 2000);
                        } else {
                            alert(data);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>