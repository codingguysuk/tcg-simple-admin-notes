/**
 * Admin JS
 * Uses Fetch API instead of jQuery
 */

document.addEventListener('submit', async (e) => {
    if (!e.target.matches('#tcg-san-form')) return;

    e.preventDefault();

    const form = e.target;
    const data = {
        title: form.title.value,
        note:  form.note.value
    };

    await fetch(TCG_SAN.api + 'notes', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-WP-Nonce': TCG_SAN.nonce
        },
        body: JSON.stringify(data)
    });

    location.reload();
});

document.addEventListener('click', async (e) => {
    if (!e.target.matches('.tcg-delete')) return;

    e.preventDefault();

    if (!confirm('Delete this note?')) return;

    const id = e.target.dataset.id;

    await fetch(TCG_SAN.api + 'notes/' + id, {
        method: 'DELETE',
        headers: {
            'X-WP-Nonce': TCG_SAN.nonce
        }
    });

    location.reload();
});
