/*const words = ["PERRO", "GATO", "CONEJO", "HAMSTER", "PEZ", "COTORRO"];
const gridSize = 12;
let grid = [];
let startCell = null;
let isMouseDown = false;
let currentSelection = [];
let foundWords = new Set();
let timer;
let timeLeft = 60;
let isPaused = false;

function generateGrid() {
    for (let i = 0; i < gridSize * gridSize; i++) grid[i] = '';
    words.forEach(word => placeWord(word.toUpperCase()));
    for (let i = 0; i < grid.length; i++) {
        if (grid[i] === '') {
            grid[i] = String.fromCharCode(65 + Math.floor(Math.random() * 26));
        }
    }
    drawGrid();
}

function placeWord(word) {
    let placed = false;
    while (!placed) {
        const deltas = [
            [0, 1], [1, 0], [0, -1], [-1, 0],
            [1, 1], [-1, -1], [-1, 1], [1, -1]
        ];
        const [dx, dy] = deltas[Math.floor(Math.random() * deltas.length)];
        const row = Math.floor(Math.random() * gridSize);
        const col = Math.floor(Math.random() * gridSize);
        const endRow = row + dx * (word.length - 1);
        const endCol = col + dy * (word.length - 1);
        if (endRow < 0 || endRow >= gridSize || endCol < 0 || endCol >= gridSize) continue;

        let fits = true;
        for (let i = 0; i < word.length; i++) {
            const r = row + dx * i;
            const c = col + dy * i;
            const index = r * gridSize + c;
            if (grid[index] !== '' && grid[index] !== word[i]) {
                fits = false;
                break;
            }
        }

        if (fits) {
            for (let i = 0; i < word.length; i++) {
                const r = row + dx * i;
                const c = col + dy * i;
                grid[r * gridSize + c] = word[i];
            }
            placed = true;
        }
    }
}

function drawGrid() {
    const gridDiv = document.getElementById("grid");
    gridDiv.innerHTML = "";
    for (let i = 0; i < grid.length; i++) {
        const cell = document.createElement("div");
        cell.className = "cell";
        cell.textContent = grid[i];
        cell.dataset.index = i;
        cell.addEventListener("mousedown", handleMouseDown);
        cell.addEventListener("mouseenter", handleMouseEnter);
        cell.addEventListener("mouseup", handleMouseUp);
        gridDiv.appendChild(cell);
        cell.addEventListener("touchstart", handleTouchStart, { passive: false });
        cell.addEventListener("touchmove", handleTouchMove, { passive: false });
        cell.addEventListener("touchend", handleTouchEnd);
    }
    document.body.addEventListener("mouseup", clearSelection);
    updateCellInteractivity();
}

function getCoords(index) {
    return [Math.floor(index / gridSize), index % gridSize];
}

function handleMouseDown(e) {
    if (isPaused) return;
    clearSelection();
    isMouseDown = true;
    const index = parseInt(e.target.dataset.index);
    startCell = index;
    currentSelection = [index];
    e.target.classList.add("selected");
}

function handleMouseEnter(e) {
    if (isPaused) return;
    if (!isMouseDown || startCell === null) return;
    const endIndex = parseInt(e.target.dataset.index);
    currentSelection = getLinePath(startCell, endIndex);
    document.querySelectorAll(".cell").forEach(c => {
        if (!c.classList.contains("found")) c.classList.remove("selected");
    });
    currentSelection.forEach(i => {
        const cell = document.querySelector(`.cell[data-index="${i}"]`);
        if (!cell.classList.contains("found")) cell.classList.add("selected");
    });
}

function handleMouseUp() {
    if (isPaused) return;
    if (!isMouseDown || currentSelection.length === 0) return;
    const selectedWord = currentSelection.map(i => grid[i]).join('');
    const reversed = selectedWord.split('').reverse().join('');
    const found = words.find(w => w === selectedWord || w === reversed);

    if (found && !foundWords.has(found)) {
        foundWords.add(found);
        currentSelection.forEach(i => {
            const cell = document.querySelector(`.cell[data-index="${i}"]`);
            cell.classList.remove("selected");
            cell.classList.add("found");
        });

        const listItem = document.querySelector(`#word-list li[data-word="${found}"]`);
        if (listItem) listItem.classList.add("found");

        if (foundWords.size === words.length) {
            clearInterval(timer);
            document.getElementById("buttons").classList.remove("hidden");
        }
    }

    startCell = null;
    isMouseDown = false;
    currentSelection = [];
}

function clearSelection() {
    if (!isMouseDown) return;
    isMouseDown = false;
    if (!startCell) return;
    document.querySelectorAll(".cell").forEach(c => {
        if (!c.classList.contains("found")) c.classList.remove("selected");
    });
    startCell = null;
    currentSelection = [];
}

function getLinePath(start, end) {
    const [r1, c1] = getCoords(start);
    const [r2, c2] = getCoords(end);
    const dr = r2 - r1;
    const dc = c2 - c1;

    const len = Math.max(Math.abs(dr), Math.abs(dc));
    const stepR = dr === 0 ? 0 : dr / Math.abs(dr);
    const stepC = dc === 0 ? 0 : dc / Math.abs(dc);

    if (Math.abs(dr) !== 0 && Math.abs(dc) !== 0 && Math.abs(dr) !== Math.abs(dc)) return [];

    const path = [];
    for (let i = 0; i <= len; i++) {
        const r = r1 + stepR * i;
        const c = c1 + stepC * i;
        if (r >= 0 && r < gridSize && c >= 0 && c < gridSize) {
            path.push(r * gridSize + c);
        }
    }
    return path;
}

function startTimer() {
    const timerElement = document.getElementById("timer");
    timerElement.textContent = `Tiempo: ${timeLeft}s`;
    timer = setInterval(() => {
        if (!isPaused) {
            timeLeft--;
            timerElement.textContent = `Tiempo: ${timeLeft}s`;
            if (timeLeft <= 0) {
                clearInterval(timer);
                document.getElementById("retry").classList.remove("hidden");
                disableGrid();
            }
        }
    }, 1000);
}

function updateCellInteractivity() {
    const cells = document.querySelectorAll(".cell");
    cells.forEach(cell => {
        cell.style.pointerEvents = (!isPaused && timeLeft > 0) ? "auto" : "none";
    });
}

function disableGrid() {
    const cells = document.querySelectorAll(".cell");
    cells.forEach(cell => {
        cell.style.pointerEvents = "none";
    });
}

function restartGame() {
    foundWords.clear();
    timeLeft = 60;
    isPaused = false;
    document.getElementById("retry").classList.add("hidden");
    document.getElementById("buttons").classList.add("hidden");
    document.querySelectorAll("#word-list li").forEach(li => li.classList.remove("found"));
    generateGrid();
    startTimer();
    updateCellInteractivity();
}

function goToNextPage() {
    window.location.href = "pagina-local.html";
}

const pauseBtn = document.getElementById("pause-play-btn");
const pauseIcon = document.getElementById("pause-play-icon");
const gridContainer = document.querySelector(".grid-container");

pauseBtn.addEventListener("click", () => {
    isPaused = !isPaused;
    if (isPaused) {
        pauseIcon.src = "/play.svg";
        pauseIcon.alt = "Reanudar";
        gridContainer.classList.add("paused");
    } else {
        pauseIcon.src = "/pause.svg";
        pauseIcon.alt = "Pausar";
        gridContainer.classList.remove("paused");
    }
    updateCellInteractivity();
});
function getCellFromTouchEvent(e) {
    const touch = e.touches[0] || e.changedTouches[0];
    const target = document.elementFromPoint(touch.clientX, touch.clientY);
    if (target && target.classList.contains("cell")) {
        return target;
    }
    return null;
}

function handleTouchStart(e) {
    if (isPaused) return;
    e.preventDefault();
    const cell = getCellFromTouchEvent(e);
    if (cell) {
        clearSelection();
        isMouseDown = true;
        const index = parseInt(cell.dataset.index);
        startCell = index;
        currentSelection = [index];
        cell.classList.add("selected");
    }
}

function handleTouchMove(e) {
    if (isPaused || !isMouseDown || startCell === null) return;
    e.preventDefault();
    const cell = getCellFromTouchEvent(e);
    if (cell) {
        const endIndex = parseInt(cell.dataset.index);
        currentSelection = getLinePath(startCell, endIndex);
        document.querySelectorAll(".cell").forEach(c => {
            if (!c.classList.contains("found")) c.classList.remove("selected");
        });
        currentSelection.forEach(i => {
            const cell = document.querySelector(`.cell[data-index="${i}"]`);
            if (!cell.classList.contains("found")) cell.classList.add("selected");
        });
    }
}

function handleTouchEnd(e) {
    if (isPaused) return;
    handleMouseUp();
}
generateGrid();
startTimer();
*/

const words = ["PERRO", "GATO", "CONEJO", "HAMSTER", "PEZ", "COTORRO"];
const gridSize = 12;
let grid = [];
let startCell = null;
let isMouseDown = false;
let currentSelection = [];
let foundWords = new Set();
let timer;
let timeLeft = 60;
let isPaused = false;

function generateGrid() {
    for (let i = 0; i < gridSize * gridSize; i++) grid[i] = '';
    words.forEach(word => placeWord(word.toUpperCase()));
    for (let i = 0; i < grid.length; i++) {
        if (grid[i] === '') {
            grid[i] = String.fromCharCode(65 + Math.floor(Math.random() * 26));
        }
    }
    drawGrid();
}

function placeWord(word) {
    let placed = false;
    while (!placed) {
        const deltas = [
            [0, 1], [1, 0], [0, -1], [-1, 0],
            [1, 1], [-1, -1], [-1, 1], [1, -1]
        ];
        const [dx, dy] = deltas[Math.floor(Math.random() * deltas.length)];
        const row = Math.floor(Math.random() * gridSize);
        const col = Math.floor(Math.random() * gridSize);
        const endRow = row + dx * (word.length - 1);
        const endCol = col + dy * (word.length - 1);
        if (endRow < 0 || endRow >= gridSize || endCol < 0 || endCol >= gridSize) continue;

        let fits = true;
        for (let i = 0; i < word.length; i++) {
            const r = row + dx * i;
            const c = col + dy * i;
            const index = r * gridSize + c;
            if (grid[index] !== '' && grid[index] !== word[i]) {
                fits = false;
                break;
            }
        }

        if (fits) {
            for (let i = 0; i < word.length; i++) {
                const r = row + dx * i;
                const c = col + dy * i;
                grid[r * gridSize + c] = word[i];
            }
            placed = true;
        }
    }
}

function drawGrid() {
    const gridDiv = document.getElementById("grid");
    gridDiv.innerHTML = "";
    for (let i = 0; i < grid.length; i++) {
        const cell = document.createElement("div");
        cell.className = "cell";
        cell.textContent = grid[i];
        cell.dataset.index = i;
        cell.addEventListener("mousedown", handleMouseDown);
        cell.addEventListener("mouseenter", handleMouseEnter);
        cell.addEventListener("mouseup", handleMouseUp);
        cell.addEventListener("touchstart", handleTouchStart, { passive: false });
        cell.addEventListener("touchmove", handleTouchMove, { passive: false });
        cell.addEventListener("touchend", handleTouchEnd);
        gridDiv.appendChild(cell);
    }
    document.body.addEventListener("mouseup", clearSelection);
    updateCellInteractivity();
}

function getCoords(index) {
    return [Math.floor(index / gridSize), index % gridSize];
}

function handleMouseDown(e) {
    if (isPaused) return;
    clearSelection();
    isMouseDown = true;
    const index = parseInt(e.target.dataset.index);
    startCell = index;
    currentSelection = [index];
    e.target.classList.add("selected");
}

function handleMouseEnter(e) {
    if (isPaused) return;
    if (!isMouseDown || startCell === null) return;
    const endIndex = parseInt(e.target.dataset.index);
    currentSelection = getLinePath(startCell, endIndex);
    document.querySelectorAll(".cell").forEach(c => {
        if (!c.classList.contains("found")) c.classList.remove("selected");
    });
    currentSelection.forEach(i => {
        const cell = document.querySelector(`.cell[data-index="${i}"]`);
        if (!cell.classList.contains("found")) cell.classList.add("selected");
    });
}

function handleMouseUp() {
    if (isPaused) return;
    if (!isMouseDown || currentSelection.length === 0) return;

    const selectedWord = currentSelection.map(i => grid[i]).join('');
    const reversed = selectedWord.split('').reverse().join('');
    const found = words.find(w => w === selectedWord || w === reversed);

    if (found && !foundWords.has(found)) {
        foundWords.add(found);
        currentSelection.forEach(i => {
            const cell = document.querySelector(`.cell[data-index="${i}"]`);
            cell.classList.remove("selected");
            cell.classList.add("found");
        });

        const listItem = document.querySelector(`#word-list li[data-word="${found}"]`);
        if (listItem) listItem.classList.add("found");

        // Actualizamos progreso y guardamos en localStorage
        const progreso = Math.round((foundWords.size / words.length) * 100);
        localStorage.setItem("progresoSopaAnimalesDomesticos", progreso);

        const barra = document.getElementById("barraProgresoSopaAnimalesDomesticos");
        if (barra) {
            barra.style.width = progreso + "%";
            barra.setAttribute("aria-valuenow", progreso);
            barra.innerText = progreso + "%";
        }

        if (foundWords.size === words.length) {
            clearInterval(timer);
            document.getElementById("buttons").classList.remove("hidden");
        }
    }

    startCell = null;
    isMouseDown = false;
    currentSelection = [];
}

function clearSelection() {
    if (!isMouseDown) return;
    isMouseDown = false;
    if (!startCell) return;
    document.querySelectorAll(".cell").forEach(c => {
        if (!c.classList.contains("found")) c.classList.remove("selected");
    });
    startCell = null;
    currentSelection = [];
}

function getLinePath(start, end) {
    const [r1, c1] = getCoords(start);
    const [r2, c2] = getCoords(end);
    const dr = r2 - r1;
    const dc = c2 - c1;

    const len = Math.max(Math.abs(dr), Math.abs(dc));
    const stepR = dr === 0 ? 0 : dr / Math.abs(dr);
    const stepC = dc === 0 ? 0 : dc / Math.abs(dc);

    if (Math.abs(dr) !== 0 && Math.abs(dc) !== 0 && Math.abs(dr) !== Math.abs(dc)) return [];

    const path = [];
    for (let i = 0; i <= len; i++) {
        const r = r1 + stepR * i;
        const c = c1 + stepC * i;
        if (r >= 0 && r < gridSize && c >= 0 && c < gridSize) {
            path.push(r * gridSize + c);
        }
    }
    return path;
}

function startTimer() {
    const timerElement = document.getElementById("timer");
    timerElement.textContent = `Tiempo: ${timeLeft}s`;
    timer = setInterval(() => {
        if (!isPaused) {
            timeLeft--;
            timerElement.textContent = `Tiempo: ${timeLeft}s`;
            if (timeLeft <= 0) {
                clearInterval(timer);
                document.getElementById("retry").classList.remove("hidden");
                disableGrid();
            }
        }
    }, 1000);
}

function updateCellInteractivity() {
    const cells = document.querySelectorAll(".cell");
    cells.forEach(cell => {
        cell.style.pointerEvents = (!isPaused && timeLeft > 0) ? "auto" : "none";
    });
}

function disableGrid() {
    const cells = document.querySelectorAll(".cell");
    cells.forEach(cell => {
        cell.style.pointerEvents = "none";
    });
}

function restartGame() {
    foundWords.clear();
    timeLeft = 60;
    isPaused = false;
    document.getElementById("retry").classList.add("hidden");
    document.getElementById("buttons").classList.add("hidden");
    document.querySelectorAll("#word-list li").forEach(li => li.classList.remove("found"));
    generateGrid();
    startTimer();
    updateCellInteractivity();

    // Reiniciar progreso en localStorage y barra
    localStorage.setItem("progresoSopaAnimalesDomesticos", 0);
    const barra = document.getElementById("barraProgresoSopaAnimalesDomesticos");
    if (barra) {
        barra.style.width = "0%";
        barra.setAttribute("aria-valuenow", 0);
        barra.innerText = "0%";
    }
}

function goToNextPage() {
    window.location.href = "pagina-local.html";
}

const pauseBtn = document.getElementById("pause-play-btn");
const pauseIcon = document.getElementById("pause-play-icon");
const gridContainer = document.querySelector(".grid-container");

pauseBtn.addEventListener("click", () => {
    isPaused = !isPaused;
    if (isPaused) {
        pauseIcon.src = "/play.svg";
        pauseIcon.alt = "Reanudar";
        gridContainer.classList.add("paused");
    } else {
        pauseIcon.src = "/pause.svg";
        pauseIcon.alt = "Pausar";
        gridContainer.classList.remove("paused");
    }
    updateCellInteractivity();
});

function getCellFromTouchEvent(e) {
    const touch = e.touches[0] || e.changedTouches[0];
    const target = document.elementFromPoint(touch.clientX, touch.clientY);
    if (target && target.classList.contains("cell")) {
        return target;
    }
    return null;
}

function handleTouchStart(e) {
    if (isPaused) return;
    e.preventDefault();
    const cell = getCellFromTouchEvent(e);
    if (cell) {
        clearSelection();
        isMouseDown = true;
        const index = parseInt(cell.dataset.index);
        startCell = index;
        currentSelection = [index];
        cell.classList.add("selected");
    }
}

function handleTouchMove(e) {
    if (isPaused || !isMouseDown || startCell === null) return;
    e.preventDefault();
    const cell = getCellFromTouchEvent(e);
    if (cell) {
        const endIndex = parseInt(cell.dataset.index);
        currentSelection = getLinePath(startCell, endIndex);
        document.querySelectorAll(".cell").forEach(c => {
            if (!c.classList.contains("found")) c.classList.remove("selected");
        });
        currentSelection.forEach(i => {
            const cell = document.querySelector(`.cell[data-index="${i}"]`);
            if (!cell.classList.contains("found")) cell.classList.add("selected");
        });
    }
}

function handleTouchEnd(e) {
    if (isPaused) return;
    e.preventDefault();
    handleMouseUp();
}

// Carga inicial de progreso



// Inicia el juego y el temporizador al cargar la página
window.onload = () => {
    generateGrid();
    startTimer();
};
