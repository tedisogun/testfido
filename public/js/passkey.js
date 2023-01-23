
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



async function register(randomChallenge, userID, excludeCredential){
    // challenge is string convert to UINT8ARRAY
    var randomChallengeBuffer = new TextEncoder().encode(randomChallenge);

    // userID also like challenge string convert to UINT8ARRAY
    var userIDBuffer = new TextEncoder().encode(userID);
    const publicKeyCredentialCreationOptions = {
        challenge: randomChallengeBuffer,
        rp: {
            name: "Test Fido Passkey",
            id: "testfido.com",
        },
        user: {
            id: userIDBuffer,
            name: "tedi",
            displayName: "sogun",
        },
        //{alg: -7, type: "public-key"} only accept RSA algorithm
        pubKeyCredParams: [{alg: -257, type: "public-key"}, {alg: -7, type: "public-key"}],
        excludeCredentials: [{
            // Credential ID is Base64url convert to UINT8ARRAY
            id: base64url_decode("Zd7Cy9YKJ6u4kNmgTCign08Nn3MLwiNtfC_JlbSHL-4"),
            type: 'public-key',
            transports: ['internal'],
        }],
        authenticatorSelection: {
            authenticatorAttachment: "platform",
            requireResidentKey: true,
        }
    };

    const credential = await navigator.credentials.create({
        publicKey: publicKeyCredentialCreationOptions
    });

    console.log(credential);

// Encode and send the credential to the server for verification.
}



async function login(randomChallenge, userID){
    var randomChallengeBuffer = new TextEncoder().encode(randomChallenge);
    const publicKeyCredentialRequestOptions = {
        challenge: randomChallengeBuffer,
        rpId : 'testfido.com',

    };

    const credential = await navigator.credentials.get({
        publicKey: publicKeyCredentialRequestOptions
    });

    console.log(credential);

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
