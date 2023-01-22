
async function register(randomChallenge, userID){
    const publicKeyCredentialCreationOptions = {
        challenge: randomChallenge,
        rp: {
            name: "Test Fido Passkey",
            id: "testfido.com",
        },
        user: {
            id: userID,
            name: "John",
            displayName: "John",
        },
        pubKeyCredParams: [{alg: -7, type: "public-key"},{alg: -257, type: "public-key"}],
        // excludeCredentials: [{
        //     id: *****,
        //     type: 'public-key',
        //     transports: ['internal'],
        // }],
        authenticatorSelection: {
            authenticatorAttachment: "platform",
            requireResidentKey: true,
        }
    };

    const credential = await navigator.credentials.create({
        publicKey: publicKeyCredentialCreationOptions
    });

// Encode and send the credential to the server for verification.
}
