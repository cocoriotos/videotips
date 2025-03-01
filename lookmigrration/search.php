<!-- search.php -->
<script>
function searchCards() {
    const searchTerm = document.getElementById("searchInput").value.toLowerCase().trim(); // Obtener y normalizar el término de búsqueda
    const cards = document.querySelectorAll(".grid-item"); // Obtener todas las cards

    // Dividir el término de búsqueda en palabras individuales
    const searchWords = searchTerm.split(/\s+/).filter(word => word.length > 0);

    let visibleCards = 0; // Contador de cards visibles

    cards.forEach((card) => {
        const content = card.textContent.toLowerCase(); // Obtener el contenido de la card
        const videoLink = card.querySelector("a.btn-primary")?.getAttribute("href")?.toLowerCase() || ""; // Obtener el enlace de la card

        let match = true;

        // Verificar si todas las palabras de búsqueda están presentes en el contenido de la card o en el enlace
        if (searchWords.length > 0) {
            match = searchWords.every(word => content.includes(word) || videoLink.includes(word));
        }

        // Mostrar u ocultar la card según si coincide con la búsqueda
        if (match) {
            card.style.display = "block";
            visibleCards++; // Incrementar el contador de cards visibles
        } else {
            card.style.display = "none";
        }
    });

    // Actualizar el conteo de cards visibles
    updateCardCount(visibleCards);
}

function updateCardCount(visibleCards) {
    const totalCardsContainer = document.querySelector(".total-cards");
    totalCardsContainer.textContent = `Total de cards mostrados: ${visibleCards}`;
}

// Inicializar el conteo de cards al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    const totalCards = document.querySelectorAll(".grid-item").length; // Obtener el total de cards
    updateCardCount(totalCards); // Mostrar el conteo total de cards al cargar la página
});
</script>

<div class="search-container">
    <input type="text" id="searchInput" placeholder="Buscar..." oninput="searchCards()">
</div>

<div class="total-cards"></div> <!-- Contenedor para mostrar el total de cards -->