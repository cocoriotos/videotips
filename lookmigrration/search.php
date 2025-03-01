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

    // Actualizar la paginación después de la búsqueda
    updatePagination();
}

function updatePagination() {
    const cards = document.querySelectorAll(".grid-item[style='display: block;']"); // Obtener solo las cards visibles
    const itemsPerPage = 8; // Mostrar 2 filas de 4 cards (2 × 4 = 8 cards por página)
    const totalPages = Math.ceil(cards.length / itemsPerPage); // Calcular el número total de páginas

    // Ocultar todas las cards
    cards.forEach((card) => {
        card.style.display = "none";
    });

    // Mostrar las cards de la página actual
    const currentPage = parseInt(document.querySelector(".pagination .active")?.textContent) || 1;
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    for (let i = startIndex; i < endIndex && i < cards.length; i++) {
        cards[i].style.display = "block";
    }

    // Actualizar los botones de paginación
    const paginationContainer = document.querySelector(".pagination");
    paginationContainer.innerHTML = "";

    for (let i = 1; i <= totalPages; i++) {
        const pageButton = document.createElement("button");
        pageButton.textContent = i;
        pageButton.classList.add("page-item");
        if (i === currentPage) {
            pageButton.classList.add("active");
        }
        pageButton.addEventListener("click", () => {
            document.querySelectorAll(".pagination .page-item").forEach(btn => btn.classList.remove("active"));
            pageButton.classList.add("active");
            updatePagination();
        });
        paginationContainer.appendChild(pageButton);
    }

    // Mostrar el número total de cards
    const totalCardsContainer = document.querySelector(".total-cards");
    totalCardsContainer.textContent = `Total de cards: ${cards.length}`;
}

// Inicializar la paginación al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    updatePagination();
});
</script>

<div class="search-container">
    <input type="text" id="searchInput" placeholder="Buscar..." oninput="searchCards()">
</div>

<div class="pagination"></div> <!-- Contenedor para los botones de paginación -->
<div class="total-cards"></div> <!-- Contenedor para mostrar el total de cards -->