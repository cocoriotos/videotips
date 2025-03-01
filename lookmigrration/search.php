<!-- search.php -->
<script>
function searchCards() {
    const searchTerm = document.getElementById("searchInput").value.toLowerCase().trim(); // Obtener y normalizar el término de búsqueda
    const cards = document.querySelectorAll(".grid-item"); // Obtener todas las cards

    // Dividir el término de búsqueda en palabras individuales
    const searchWords = searchTerm.split(/\s+/).filter(word => word.length > 0);

    cards.forEach((card) => {
        const content = card.textContent.toLowerCase(); // Obtener el contenido de la card
        let match = true;

        // Verificar si todas las palabras de búsqueda están presentes en el contenido de la card
        if (searchWords.length > 0) {
            match = searchWords.every(word => content.includes(word));
        }

        // Mostrar u ocultar la card según si coincide con la búsqueda
        if (match) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
</script>

<div class="search-container">
    <input type="text" id="searchInput" placeholder="Buscar..." oninput="searchCards()">
</div>