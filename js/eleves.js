function chargerListeEleves() {
    fetch('backend/liste_eleves.php')
        .then(r => r.text())
        .then(html => {
            document.getElementById('liste-eleves').innerHTML = html;
            const wrapper = document.getElementById('liste-eleves').firstElementChild;
            const count = wrapper?.getAttribute('data-count');
            if (count !== null && count !== undefined) {
                document.getElementById('compteur-eleves').textContent = count;
            }
            activerAffichageInfosEleve();
        });
}

function activerAffichageInfosEleve() {
    document.querySelectorAll('.eleve-item').forEach(item => {
        item.onclick = function() {
            document.getElementById('eleveModal').classList.remove('hidden');
            document.getElementById('eleveInfos').innerHTML = `
                <div><b>Nom :</b> ${this.getAttribute('data-nom')}</div>
                <div><b>Prénom :</b> ${this.getAttribute('data-prenom')}</div>
                <div><b>Email :</b> ${this.getAttribute('data-email')}</div>
                <div><b>ID :</b> ${this.getAttribute('data-id')}</div>
            `;
        };
    });
    document.getElementById('closeEleveModal').onclick = function() {
        document.getElementById('eleveModal').classList.add('hidden');
    };
}

window.addEventListener('DOMContentLoaded', chargerListeEleves);