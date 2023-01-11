//from chatGPT

function showPopUp() {
    // Création de la fenêtre de la pop-up
    var popupWindow = window.open('', 'popup', 'width=400,height=200');

    // Écriture du HTML de la pop-up
    popupWindow.document.write('<html lang="fr"><head><title>Suggestions</title></head><body><h1>Suggestion envoyé</h1><button onclick="closePopUp()">OK</button><script>function closePopUp() {\n' +
        '    // Fermeture de la fenêtre de la pop-up\n' +
        '    window.close();\n' +
        '}</script></body></html>');
}