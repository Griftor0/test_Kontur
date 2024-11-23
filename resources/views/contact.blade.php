<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <form id="contactForm">
        <div>
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="phone">Телефон:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Отправить</button>
    </form>
    
    <div id="responseMessage"></div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#contactForm').on('submit', function(event) {
            event.preventDefault();
    
            $.ajax({
                url: '/contacts',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: $('#name').val(),
                    phone: $('#phone').val(),
                    email: $('#email').val(),
                },
                success: function(response) {
                    $('#responseMessage').html('<p>' + response.message + '</p>');
                    $('#contactForm')[0].reset();
                },
                error: function(response) {
                    let errors = response.responseJSON.errors;
                    let errorMessage = '<ul>';
                    for (let key in errors) {
                        errorMessage += '<li>' + errors[key][0] + '</li>';
                    }
                    errorMessage += '</ul>';
                    $('#responseMessage').html(errorMessage);
                }
            });
        });
    </script>
</body>
</html>