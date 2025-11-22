// Form handling JavaScript for certification request form

let formData = [];

// Update specialty options based on activity type
function updateSpecialtyOptions(selectActivity, selectSpecialty) {
    const activityType = selectActivity.value;
    selectSpecialty.innerHTML = '<option value="" disabled selected>Выберите</option>';

    positions.forEach(position => {
        if (activityType && position["type"] === activityType) {
            const opt = document.createElement("option");
            opt.value = position["id"];
            opt.textContent = position["name_ru"];
            selectSpecialty.appendChild(opt);
        }
    });
}

// Event listener for activity type changes
document.addEventListener('DOMContentLoaded', function () {
    const tableOrder = document.getElementById('tableOrder');
    if (tableOrder) {
        tableOrder.addEventListener('change', function (event) {
            if (event.target.classList.contains('activity_type')) {
                const row = event.target.closest('tr');
                const selectSpecialty = row.querySelector('.specialty');
                updateSpecialtyOptions(event.target, selectSpecialty);
            }
        });
    }
});

// Add new row to the table
function addRow() {
    const table = document.getElementById('tableOrder');
    const rows = table.getElementsByTagName('tr');
    const newRow = rows[rows.length - 1].cloneNode(true);

    const newIndex = rows.length;
    newRow.id = `row${newIndex + 1}`;
    newRow.querySelector('td:first-child').textContent = newIndex + 1;

    // Clear values
    newRow.querySelectorAll('input').forEach(input => {
        if (input.type !== 'button') input.value = '';
    });

    newRow.querySelectorAll('select').forEach(select => {
        select.selectedIndex = 0;
        if (select.classList.contains('specialty')) {
            select.innerHTML = '<option value="" disabled selected>Выберите</option>';
        }
    });

    table.appendChild(newRow);
}

// Remove row from table
function removeRow(button) {
    const row = button.closest('tr');
    const rows = document.querySelectorAll('#tableOrder tr');

    if (rows.length === 1) {
        alert('Нельзя удалить последнюю строку!');
        return;
    }

    if (confirm('Вы уверены, что хотите удалить эту строку?')) {
        row.remove();
        updateRowNumbers();
    }
}

// Update row numbers
function updateRowNumbers() {
    const rows = document.querySelectorAll('#tableOrder tr');
    rows.forEach((row, index) => {
        row.querySelector('td:first-child').textContent = index + 1;
        row.id = `row${index + 1}`;
    });
}

// Reset form
function resetForm(isModal = false) {
    if (!isModal && !confirm('Вы уверены, что хотите очистить всю форму?')) return;

    const table = document.getElementById('tableOrder');
    while (table.rows.length > 1) {
        table.deleteRow(1);
    }

    const firstRow = document.getElementById('row1');
    firstRow.querySelectorAll('input').forEach(input => {
        if (input.type !== 'button') input.value = '';
    });
    firstRow.querySelectorAll('select').forEach(select => {
        select.selectedIndex = 0;
        if (select.classList.contains('specialty')) {
            select.innerHTML = '<option value="" disabled selected>Выберите</option>';
        }
    });

    const docContainers = document.querySelectorAll('.documents-container');
    docContainers.forEach(container => {
        while (container.children.length > 1) {
            container.lastChild.remove();
        }
        const firstDoc = container.firstElementChild;
        firstDoc.querySelector('.doc-name').value = '';
        firstDoc.querySelector('.doc-file').value = '';
        firstDoc.querySelector('.btn-remove-doc').style.display = 'none';
    });

    localStorage.removeItem('savedForm');
    formData = [];

    if (!isModal) alert('Форма успешно очищена!');
}

// Save form data to localStorage
function saveFormData() {
    formData = [];
    document.querySelectorAll('#tableOrder tr').forEach((row, index) => {
        const docs = [];
        row.querySelectorAll('.document-item').forEach(doc => {
            docs.push({
                name: doc.querySelector('.doc-name').value,
                file: doc.querySelector('.doc-file').value
            });
        });

        const data = {
            last_name: row.querySelector('[name="last_name"]')?.value || '',
            first_name: row.querySelector('[name="first_name"]')?.value || '',
            middle_name: row.querySelector('[name="middle_name"]')?.value || '',
            iin: row.querySelector('[name="iin"]')?.value || '',
            activity_type: row.querySelector('[name="activity_type"]')?.value || '',
            specialty: row.querySelector('[name="specialty"]')?.value || '',
            phone: row.querySelector('[name="phone"]')?.value || '',
            workplace: row.querySelector('[name="workplace"]')?.value || '',
            sender_name: row.querySelector('[name="sender_name"]')?.value || '',
            documents: docs
        };
        formData.push(data);
    });
    localStorage.setItem('savedForm', JSON.stringify(formData));
}

// Load form data from localStorage
function loadFormData() {
    const savedData = localStorage.getItem('savedForm');
    if (savedData) {
        formData = JSON.parse(savedData);
        // Implementation for loading data into form
    }
}

// Validate form
function validateForm() {
    const errors = [];
    const rows = document.querySelectorAll('#tableOrder tr');

    rows.forEach((row, rowIndex) => {
        const requiredFields = {
            last_name: 'Фамилия обязательна для заполнения',
            first_name: 'Имя обязательно для заполнения',
            iin: 'ИИН должен состоять из 12 цифр',
            activity_type: 'Выберите вид деятельности',
            specialty: 'Выберите специальность',
            phone: 'Телефон обязателен для заполнения',
            sender_name: 'Поле "Отправитель" обязательно для заполнения',
            workplace: 'Поле "Место работы" обязательно для заполнения',
        };

        Object.entries(requiredFields).forEach(([field, message]) => {
            const element = row.querySelector(`[name="${field}"]`);
            const value = element?.value.trim();

            if (!value) {
                errors.push(`Строка ${rowIndex + 1}: ${message}`);
            }

            if (field === 'iin' && value && !/^\d{12}$/.test(value)) {
                errors.push(`Строка ${rowIndex + 1}: ИИН должен содержать ровно 12 цифр`);
            }
        });
    });

    return errors;
}

// Submit form
async function addOrder() {
    const submitBtn = document.querySelector('.btn-primary');
    try {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div> Отправка...';

        const errors = validateForm();
        if (errors.length > 0) {
            const errorMessage = errors.join('\n');
            alert(`Исправьте ошибки:\n\n${errorMessage}`);
            throw new Error('Validation failed');
        }

        const formData = new FormData();
        const rows = document.querySelectorAll('#tableOrder tr');

        // Get CSRF token
        const refreshToken = await fetch('/refresh-csrf-token');
        const { token } = await refreshToken.json();
        formData.append('_token', token);

        // Collect data
        rows.forEach((row, index) => {
            const fields = [
                'last_name', 'first_name', 'middle_name', 'iin',
                'activity_type', 'specialty', 'phone', 'workplace', 'sender_name'
            ];

            fields.forEach(field => {
                const input = row.querySelector(`[name="${field}"]`);
                if (input) {
                    formData.append(`requests[${index}][${field}]`, input.value.trim());
                }
            });

            // Documents
            row.querySelectorAll('.document-item').forEach((doc, docIndex) => {
                const nameInput = doc.querySelector('.doc-name');
                const fileInput = doc.querySelector('.doc-file');

                if (nameInput.value && fileInput.files[0]) {
                    formData.append(`requests[${index}][documents][${docIndex}][name]`, nameInput.value.trim());
                    formData.append(`requests[${index}][documents][${docIndex}][file]`, fileInput.files[0]);
                }
            });
        });

        // Send data
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        const response = await axios.post('/cert-request', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });

        if (response.data.status) {
            alert('Заявки успешно отправлены!');
            closeCertificationModal();
            resetForm(true);
        }
    } catch (error) {
        if (error.message !== 'Validation failed') {
            console.error('Ошибка:', error);
            alert(error.response?.data?.message || error.message || 'Ошибка при отправке');
        }
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Отправить заявку';
    }
}

// Add document field
function addDocumentField(button) {
    const container = button.previousElementSibling;
    const newItem = container.firstElementChild.cloneNode(true);
    newItem.querySelectorAll('input').forEach(input => input.value = '');
    newItem.querySelector('.btn-remove-doc').style.display = 'block';
    container.appendChild(newItem);
}

// Remove document field
function removeDocumentField(button) {
    const container = button.closest('.documents-container');
    const items = container.querySelectorAll('.document-item');

    if (items.length > 1) {
        if (confirm('Удалить этот документ?')) {
            button.closest('.document-item').remove();
        }
    }
}
