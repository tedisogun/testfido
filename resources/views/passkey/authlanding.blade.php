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
<pre id="log"></pre>

<script>
    (function () {
        var old = console.log;
        var logger = document.getElementById('log');
        console.log = function () {
            for (var i = 0; i < arguments.length; i++) {
                if (typeof arguments[i] == 'object') {
                    logger.innerHTML += (JSON && JSON.stringify ? JSON.stringify(arguments[i], undefined, 2) : arguments[i]) + '<br />';
                } else {
                    logger.innerHTML += arguments[i] + '<br />';
                }
            }
        }
    })();
</script>
<script src="/js/passkey.js"></script>
</body>
</html>
