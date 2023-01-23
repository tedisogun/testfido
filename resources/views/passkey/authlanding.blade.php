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

<label for="name">Username:</label>
<input type="text" name="name" autocomplete="username webauthn">
<label for="password">Password:</label>
<input type="password" name="password" autocomplete="current-password webauthn">

<script>
    if (!PublicKeyCredential.isConditionalMediationAvailable ||
        !PublicKeyCredential.isConditionalMediationAvailable()) {

    }else{
        var randomChallengeBuffer = new TextEncoder().encode('{{$random_challenge}}');
        navigator.credentials.get({
            mediation: 'conditional',
            publicKey: {
                challenge: randomChallengeBuffer,
                // `allowCredentials` can be used as a filter on top of discoverable credentials.
            }
    }


    });
</script>
<script src="/js/passkey.js"></script>
</body>
</html>
