<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8 font-sans">

    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Hello {{ $user->name }}</h1>
            <p class="text-gray-600 mb-4">Your Cyfit email has been created successfully.</p>
            <p class="text-gray-600 mb-4">Your password is: <span class="font-bold text-gray-800">{{ $password }}</span></p>
            <p class="text-gray-600">Thank you. Regards, Cyfit.</p>
        </div>
    </div>

</body>
</html>
