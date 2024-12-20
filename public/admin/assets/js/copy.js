    document.addEventListener('contextmenu', function(e) {
    e.preventDefault(); // O'ng tugmani bosishni o'chirish
});

    document.addEventListener('keydown', function(e) {
    // Ctrl + C ni o'chirish
    if (e.ctrlKey && e.key === 'c') {
    e.preventDefault();
}
    // Ctrl + U ni o'chirish (manba ko'rish)
    if (e.ctrlKey && e.key === 'u') {
    e.preventDefault();
}
    // Ctrl + S ni o'chirish (sahifani saqlash)
    if (e.ctrlKey && e.key === 's') {
    e.preventDefault();
}
    // Ctrl + A ni o'chirish (hammasini tanlash)
    if (e.ctrlKey && e.key === 'a') {
    e.preventDefault();
}
});
