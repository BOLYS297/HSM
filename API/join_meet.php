<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoindre la Réunion Jitsi Meet</title>
    <script src='https://meet.jit.si/external_api.js'></script>
</head>
<body>
    <!--
    https://download.jitsi.org/stable/ 
    https://jitsi.github.io/handbook/docs/dev-guide/dev-guide-iframe -->
    <h1>Rejoindre la Réunion</h1>
    <div id="jitsi-meet" style="height: 600px;"></div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const roomName = urlParams.get('room'); // Récupérer le nom de la salle depuis l'URL
        const domain = 'meet.jit.si';
        const options = {
            roomName: roomName,
            width: '100%',
            height: '100%',
            parentNode: document.querySelector('#jitsi-meet'),
            userInfo: {
                displayName: prompt('Entrez votre nom') // Demande le nom de l'utilisateur
            }
        };

        const api = new JitsiMeetExternalAPI(domain, options);

        // Rediriger automatiquement vers la réunion si aucun nom n'est donné
        api.addEventListener('videoConferenceJoined', () => {
            console.log('Participant a rejoint la réunion : ' + roomName);
        });
    </script>
</body>
</html>