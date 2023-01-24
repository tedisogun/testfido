
/// Return true if Platform Authentication Support & false if it is not
async function checkPlatformAuthAvailable()
{
    if (window.PublicKeyCredential) {
        let result = await PublicKeyCredential.isUserVerifyingPlatformAuthenticatorAvailable();

        if(result) return true;
        else return false;
    }else{
        return false;
    }

}





async function registerPasskey(randomChallenge, user, credentials){
    // challenge is string convert to UINT8ARRAY
    var randomChallengeBuffer = new TextEncoder().encode(randomChallenge);

    // userID also like challenge string convert to UINT8ARRAY
    // Use email as userId in authenticator
    var userIDBuffer = new TextEncoder().encode(user.email);

    var userExcludeCredentials = [];

    credentials.forEach(function (item, index) {
        userExcludeCredentials.push({
            id: base64url_decode(item.credential),
            type: 'public-key',
            transports: ['internal'],
        });
    });


    const publicKeyCredentialCreationOptions = {
        challenge: randomChallengeBuffer,
        rp: {
            name: "Undiksha Test Passkey",
            id: "testfido.com",
        },
        user: {
            id: userIDBuffer,
            name: user.name,
            displayName: user.name,
        },
        //{alg: -7, type: "public-key"} only accept RSA algorithm
        pubKeyCredParams: [{alg: -257, type: "public-key"}, {alg: -7, type: "public-key"}],
        excludeCredentials: userExcludeCredentials,
        authenticatorSelection: {
            authenticatorAttachment: "platform",
            requireResidentKey: true,
        }
    };

    const credential = await navigator.credentials.create({
        publicKey: publicKeyCredentialCreationOptions
    });

    return credential;

// Encode and send the credential to the server for verification.
}



async function loginPasskey(randomChallenge){
    var randomChallengeBuffer = new TextEncoder().encode(randomChallenge);
    const publicKeyCredentialRequestOptions = {
        challenge: randomChallengeBuffer,
        rpId : 'testfido.com',


    };

    const credential = await navigator.credentials.get({
        publicKey: publicKeyCredentialRequestOptions
    });

    return credential;

// Encode and send the credential to the server for verification.
}





function base64url_encode(buffer) {
    return btoa(Array.from(new Uint8Array(buffer), b => String.fromCharCode(b)).join(''))
        .replace(/\+/g, '-')
        .replace(/\//g, '_')
        .replace(/=+$/, '');
}

function base64url_decode(value) {
    const m = value.length % 4;
    return Uint8Array.from(atob(
        value.replace(/-/g, '+')
            .replace(/_/g, '/')
            .padEnd(value.length + (m === 0 ? 0 : 4 - m), '=')
    ), c => c.charCodeAt(0)).buffer
}
