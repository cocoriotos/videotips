<!-- search.php -->
<script>
function searchCards() {
    const searchTerm = document.getElementById("searchInput").value.toLowerCase(); // Obtener el término de búsqueda
    const cards = document.querySelectorAll(".grid-item"); // Obtener todas las cards

    cards.forEach((card) => {
        const content = card.textContent.toLowerCase(); // Obtener el contenido de la card
        if (content.includes(searchTerm)) {
            card.style.display = "block"; // Mostrar la card si coincide con la búsqueda
        } else {
            card.style.display = "none"; // Ocultar la card si no coincide
        }
    });
}
</script>

<div class="search-container">
    <input type="text" id="searchInput" placeholder="Buscar..." oninput="searchCards()">
</div>