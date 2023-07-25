<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.3.min.js"></script>
</head>

<body>
    <input type="text" class="number-input">
    <input type="text" class="number-input">
    <input type="text" class="number-input">
    <p>Total: <span id="total">0</span></p>

    <script>
        $(document).ready(function() {
            // Add event listener to all number input fields
            $('.number-input').on('input', function() {
                var total = 0;

                // Loop through all number input fields
                $('.number-input').each(function() {
                    var value = parseFloat($(this).val());

                    // Check if the value is a valid number
                    if (!isNaN(value)) {
                        total += value;
                    }
                });

                // Update the total
                $('#total').text(total);
            });
        });
    </script>
</body>

</html>