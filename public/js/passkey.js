
async function register(randomChallenge, userID){
    var randomChallengeBuffer = new TextEncoder().encode(randomChallenge);
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
        pubKeyCredParams: [{alg: -7, type: "public-key"},{alg: -257, type: "public-key"}],
        // excludeCredentials: [{
        //     id: *****,
        //     type: 'public-key',
        //     transports: ['internal'],
        // }],
        authenticatorSelection: {
         //   authenticatorAttachment: "platform",
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
        publicKey: publicKeyCredentialRequestOptions,
        mediation: 'conditional'
    });

    console.log(credential);

// Encode and send the credential to the server for verification.
}

