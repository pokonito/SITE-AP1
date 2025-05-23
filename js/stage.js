function afficherStage(num) {
    fetch('backend/get_stage.php?num=' + encodeURIComponent(num))
        .then(response => response.json())
        .then(stage => {
            if (stage && stage.nom) {
                document.getElementById('modalStageContent').innerHTML = `
                    <h4 class="font-semibold mb-2">Entreprise</h4>
                    <div><b>Nom :</b> ${stage.nom}</div>
                    <div><b>Adresse :</b> ${stage.adresse}</div>
                    <div><b>Code postal :</b> ${stage.cp}</div>
                    <div><b>Ville :</b> ${stage.ville}</div>
                    <div><b>Libellé du stage :</b> ${stage.libellestage}</div>
                    <div><b>Email entreprise :</b> ${stage.email}</div>
                    <h4 class="font-semibold mt-4 mb-2">Tuteur</h4>
                    <div><b>Nom :</b> ${stage.tuteur_nom}</div>
                    <div><b>Prénom :</b> ${stage.tuteur_prenom}</div>
                    <div><b>Téléphone :</b> ${stage.tuteur_tel}</div>
                    <div><b>Email :</b> ${stage.tuteur_email}</div>
                `;
                document.getElementById('modalStage').classList.remove('hidden');
            } else {
                document.getElementById('modalStageContent').innerHTML = '<div class="text-gray-500">Aucune information trouvée.</div>';
                document.getElementById('modalStage').classList.remove('hidden');
            }
        });
}
function fermerModal() {
    document.getElementById('modalStage').classList.add('hidden');
    document.getElementById('modalStageContent').innerHTML = '';
}