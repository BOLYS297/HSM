<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Réunion Jitsi Meet</title>
    <script src='https://meet.jit.si/external_api.js'></script>
</head>
<body>
    <h1>Vidéoconférence avec Jitsi Meet</h1>
    <div id="jitsi-meet" style="height: 600px;"></div>
    <div>
        <h2>Lien de la réunion :</h2>
        <input type="text" id="meeting-link" readonly style="width: 100%;">
        <button id="copy-button">Copier le lien</button>
    </div>

    <script>
        const domain = 'meet.jit.si';
        const roomName = 'NomDeVotreSalle'; // Remplacez par un nom de salle unique
        const options = {
            roomName: roomName,
            width: '100%',
            height: '100%',
            parentNode: document.querySelector('#jitsi-meet'),
            userInfo: {
                displayName: 'Votre nom' // Remplacez par votre nom
            }
        };

        const api = new JitsiMeetExternalAPI(domain, options);

        // Générer et afficher le lien de la réunion
        const meetingLink = `${window.location.origin}/apps/demo/join_meet.php?room=${roomName}`;
        document.getElementById('meeting-link').value = meetingLink;

        // Fonction pour copier le lien dans le presse-papiers
        document.getElementById('copy-button').onclick = function() {
            const input = document.getElementById('meeting-link');
            input.select();
            document.execCommand('copy');
            alert('Lien copié dans le presse-papiers : ' + meetingLink);
        };
    </script>
</body>
</html>