    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel 8 Livewire CRUD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        @livewireStyles
        <style>
            .error {
                color: red;
            }
            body {
                background-color: grey;
            }
        </style>
    </head>
    <body>
        <h4 class="bg-dark p-2 text-white">Livewire CRUD App</h4>
        @livewire('category')
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
