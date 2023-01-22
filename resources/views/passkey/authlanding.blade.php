<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Auth Landing</title>
    <meta name="description" content="Passkey Auth Landing">
    <meta name="author" content="SitePoint">


</head>

<body>

<button onclick="register('{{$random_challenge}}', '{{$random_userid}}')">
    Registering
</button>

<button onclick="login('{{$random_challenge}}', '{{$random_userid}}')">
    Login
</button>

<script src="/js/passkey.js"></script>
</body>
</html>
