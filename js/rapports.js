// Ouvre le modal pour création ou édition
function ouvrirModalRapport() {
    document.getElementById('rapportModal').classList.remove('hidden');
}

// Ferme le modal et réinitialise le formulaire
function fermerModalRapport() {
    document.getElementById('rapportModal').classList.add('hidden');
    const form = document.getElementById('rapportForm');
    form.reset();
    form.removeAttribute('data-id');
}

// Active les menus 3 points pour chaque rapport
function activerMenusRapports() {
    document.querySelectorAll('.menu-rapport').forEach(btn => {
        btn.onclick = function(e) {
            e.stopPropagation();
            // Ferme tous les autres menus
            document.querySelectorAll('.menu-actions').forEach(m => m.classList.add('hidden'));
            // Ouvre celui-ci
            this.nextElementSibling.classList.toggle('hidden');
        };
    });
    // Ferme le menu si on clique ailleurs
    document.addEventListener('click', function() {
        document.querySelectorAll('.menu-actions').forEach(m => m.classList.add('hidden'));
    });
}

// Active la suppression d'un rapport
function activerSuppressionRapport() {
    document.querySelectorAll('.delete-rapport').forEach(btn => {
        btn.onclick = async function(e) {
            e.stopPropagation();
            if (confirm('Supprimer ce rapport ?')) {
                const id = this.getAttribute('data-id');
                const res = await fetch('backend/supprimer_rapport.php', {
                    method: 'POST',
                    body: new URLSearchParams({id})
                });
                if (res.ok) {
                    chargerListeRapports();
                } else {
                    alert('Erreur lors de la suppression');
                }
            }
        };
    });
}

// Active l'édition d'un rapport (préremplit le formulaire et ouvre le modal)
function activerEditionRapport() {
    document.querySelectorAll('.edit-rapport').forEach(btn => {
        btn.onclick = function(e) {
            e.stopPropagation();
            ouvrirModalRapport();
            const form = document.getElementById('rapportForm');
            form.setAttribute('data-id', this.getAttribute('data-id'));
            form.querySelector('[name="description"]').value = this.getAttribute('data-description');
            form.querySelector('[name="date_rapport"]').value = this.getAttribute('data-date');
            form.querySelector('[name="contenu"]').value = this.getAttribute('data-contenu');
        };
    });
}

// Charge la liste des rapports et le compteur
function chargerListeRapports() {
    fetch('backend/liste_rapport.php')
        .then(r => r.text())
        .then(html => {
            document.getElementById('liste-rapports').innerHTML = html;
            const wrapper = document.getElementById('liste-rapports').firstElementChild;
            const count = wrapper?.getAttribute('data-count');
            if (count !== null && count !== undefined) {
                document.getElementById('compteur-rapports').textContent = count;
            }
            activerMenusRapports();
            activerSuppressionRapport();
            activerEditionRapport();
        });
}

// Initialisation au chargement de la page
window.addEventListener('DOMContentLoaded', function() {
    // Ouvre le modal pour création
    document.getElementById('openRapportForm')?.addEventListener('click', function() {
        ouvrirModalRapport();
    });
    // Ferme le modal
    document.getElementById('closeRapportForm').onclick = fermerModalRapport;

    // Gestion de l'envoi du formulaire (création ou modification)
    document.getElementById('rapportForm').onsubmit = async function(e) {
        e.preventDefault();
        const form = e.target;
        const data = new FormData(form);
        const id = form.getAttribute('data-id');
        let url = 'backend/ajouter_rapport.php';
        if (id) {
            data.append('id', id);
            url = 'backend/modifier_rapport.php';
        }
        const res = await fetch(url, {
            method: 'POST',
            body: data
        });
        if (res.ok) {
            fermerModalRapport();
            chargerListeRapports();
        } else {
            alert('Erreur lors de l\'enregistrement du rapport');
        }
    };

    chargerListeRapports();
});