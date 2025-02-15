function setMinDate(inputId, setDefault = false) {
    const today = new Date().toISOString().split('T')[0];
    const input = document.getElementById(inputId);
    input.setAttribute('min', today);
    if (setDefault) {
        input.value = today;
    }
}

function initializeEditButtons() {
    const editButtons = document.querySelectorAll('.edit');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const expiration = this.getAttribute('data-expiration');
            const quantity = this.getAttribute('data-quantity');
            const unit = this.getAttribute('data-unit');

            document.getElementById('editId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editExpiration').value = expiration;
            document.getElementById('editQuantity').value = quantity;
            document.getElementById('editUnit').value = unit;

            setMinDate('editExpiration');
        });
    });
}

function initializeClearSearchButton() {
    document.getElementById('clearSearch').addEventListener('click', function (event) {
        event.preventDefault();
        const searchInput = document.getElementById('searchInput');
        searchInput.value = '';
        triggerSearchUpdate('');
    });
}

function initializeSearchInput() {
    const searchInput = document.getElementById('searchInput');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const searchValue = searchInput.value;
            triggerSearchUpdate(searchValue);
        });
    }
}

function initializeSortButtons() {
    const sortButtons = document.querySelectorAll('a.sort-link');

    sortButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default link behavior
            const sortValue = this.getAttribute('data-sort');
            const searchValue = document.getElementById('searchInput').value;
            triggerSearchUpdate(searchValue, sortValue);
        });
    });
}

function triggerSearchUpdate(searchValue, sortValue = '') {
    const params = new URLSearchParams();
    if (searchValue) params.append('search', searchValue);
    if (sortValue) params.append('sort', sortValue);

    const xhr = new XMLHttpRequest();
    xhr.open('GET', `/fridge?${params.toString()}`, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(xhr.responseText, 'text/html');
            const newTable = doc.querySelector('.fridge__table table');
            const currentTable = document.querySelector('.fridge__table table');

            if (currentTable) {
                if (newTable && newTable.innerHTML.trim() !== '') {
                    currentTable.innerHTML = newTable.innerHTML;
                } else {
                    const headerRow = currentTable.querySelector('thead').innerHTML;
                    currentTable.innerHTML = `<thead>${headerRow}</thead><tbody><tr><td colspan="5">No products found.</td></tr></tbody>`;
                }
            }

            const newMessage = doc.querySelector('p');
            const currentMessage = document.querySelector('p');
            if (currentMessage) {
                currentMessage.innerHTML = newMessage ? newMessage.innerHTML : '';
            }

            window.scrollTo({ top: window.pageYOffset, behavior: 'smooth' });
        }
    };
    xhr.send();
}

document.addEventListener('DOMContentLoaded', function () {
    const alertElement = document.querySelector('.alert');
    if (alertElement) {
        setTimeout(() => {
            alertElement.style.opacity = '0';
            setTimeout(() => alertElement.remove(), 500);
        }, 4000);
    }

    setMinDate('expiration_date', true);
    initializeEditButtons();
    initializeClearSearchButton();
    initializeSearchInput();
    initializeSortButtons();
});
