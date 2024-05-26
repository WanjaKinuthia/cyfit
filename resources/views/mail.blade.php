<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
</head>
<body style="background-color: #f7fafc; padding: 2rem; font-family: Arial, sans-serif;">

    <div style="max-width: 28rem; margin: auto; background-color: #ffffff; border-radius: 0.5rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <div style="padding: 1.5rem;">
            <h1 style="font-size: 1.5rem; font-weight: bold; color: #2d3748; margin-bottom: 1rem;">Hello {{ $user->name }}</h1>
            <p style="color: #4a5568; margin-bottom: 1rem;">Your Cyfit email has been created successfully.</p>
            <p style="color: #4a5568; margin-bottom: 1rem;">Your password is: <span style="font-weight: bold; color: #2d3748;">{{ $password }}</span></p>
            <p style="color: #4a5568;">Thank you. Regards, Cyfit.</p>
        </div>
    </div>

</body>
</html>
