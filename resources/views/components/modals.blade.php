<!-- Модальное окно заявки на аттестацию -->
<div id="applicationModal" class="modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content application-modal-content">
            <!-- Modal Header -->
            <div class="modal-header application-modal-header">
                <div class="modal-header-content">
                    <div class="modal-icon-wrapper">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="modal-title-wrapper">
                        <h2 class="modal-title mb-0">Заявка на аттестацию</h2>
                        <p class="modal-subtitle mb-0">Заполните данные сотрудников для подачи заявки</p>
                    </div>
                </div>
                <button type="button" class="btn-close-modern" onclick="closeApplicationModal()" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body application-modal-body">
                <div class="application-info-banner">
                    <i class="bi bi-info-circle"></i>
                    <span>Поля, отмеченные звездочкой (*), обязательны для заполнения</span>
                </div>

                <div class="modal-scrollable">
                    <table class="responsive-table application-table">
                        <thead>
                            <tr>
                                <th class="col-number">№</th>
                                <th class="col-required">* Фамилия</th>
                                <th class="col-required">* Имя</th>
                                <th>Отчество</th>
                                <th class="col-required">* ИИН</th>
                                <th class="col-required">* Вид деятельности</th>
                                <th class="col-required">* Специальность</th>
                                <th>Телефон</th>
                                <th>Место работы</th>
                                <th class="col-required">* Отправитель</th>
                                <th>Документ</th>
                                <th class="col-actions">Действия</th>
                            </tr>
                        </thead>
                        <tbody id="tableOrder">
                            <tr id="row1" class="table-row">
                                <td class="row-number">1</td>
                                <td><input type="text" class="form-control" name="last_name" placeholder="Иванов" required></td>
                                <td><input type="text" class="form-control" name="first_name" placeholder="Иван" required></td>
                                <td><input type="text" class="form-control" name="middle_name" placeholder="Иванович"></td>
                                <td><input type="text" class="form-control" name="iin" pattern="\d{12}" maxlength="12" placeholder="123456789012" oninput="this.value = this.value.replace(/\D/g, '').substring(0, 12)" required></td>
                                <td>
                                    <select class="form-select activity_type" name="activity_type" required>
                                        <option value="" disabled selected>Выберите</option>
                                        <option value="ПД">ПД</option>
                                        <option value="СМР">СМР</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select specialty" name="specialty" required>
                                        <option value="" disabled selected>Выберите</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="tel"
                                        class="form-control phone-mask"
                                        name="phone"
                                        placeholder="+7 (___) ___-__-__"
                                        maxlength="18"
                                        oninput="formatPhone(this)">
                                </td>
                                <td><input type="text" class="form-control" name="workplace" placeholder="Название компании"></td>
                                <td><input type="text" class="form-control" name="sender_name" placeholder="ФИО отправителя" required></td>
                                <td>
                                    <div class="documents-container">
                                        <div class="document-item">
                                            <input type="text"
                                                class="form-control doc-name"
                                                placeholder="Название документа"
                                                name="docName[]">
                                            <input type="file"
                                                class="form-control doc-file"
                                                name="docFile[]"
                                                accept="image/*,.pdf">
                                            <button type="button"
                                                class="btn-remove-doc"
                                                onclick="removeDocumentField(this)"
                                                title="Удалить документ">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button"
                                        class="btn-add-doc"
                                        onclick="addDocumentField(this)">
                                        <i class="bi bi-plus-circle"></i> Добавить документ
                                    </button>
                                </td>

                                <td class="actions-cell">
                                    <button type="button"
                                        class="btn-remove-row"
                                        onclick="removeRow(this)"
                                        title="Удалить строку">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer application-modal-footer">
                <div class="footer-actions-left">
                    <button type="button" class="btn btn-outline-secondary" onclick="addRow()">
                        <i class="bi bi-plus-circle"></i> Добавить строку
                    </button>
                    <button type="button" class="btn btn-outline-danger" onclick="resetForm()">
                        <i class="bi bi-eraser"></i> Очистить форму
                    </button>
                </div>
                <div class="footer-actions-right">
                    <button type="button" class="btn btn-primary btn-submit" onclick="addOrder()">
                        <i class="bi bi-send"></i> Отправить заявку
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно поиска аттестата -->
<!-- Модальное окно поиска аттестата -->
<div id="searchModal" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 24px; overflow: hidden;">
            <div class="modal-header border-0 p-4 bg-light">
                <h3 class="modal-title fs-4 fw-bold text-corporate-navy mb-0">
                    <i class="bi bi-search text-corporate-blue me-2"></i>
                    Поиск аттестата
                </h3>
                <button type="button" class="btn-close" onclick="closeSearchModal()" aria-label="Close"></button>
            </div>

            <div class="modal-body p-3 p-md-4">
                <form id="searchForm" onsubmit="handleSearch(event)">
                    <div class="text-center mb-2">
                        <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-2" style="width: 60px; height: 60px;">
                            <i class="bi bi-person-vcard text-corporate-blue" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="fw-bold text-corporate-navy mb-1">Проверить аттестат</h4>
                        <p class="text-muted small mb-0">Введите ИИН сотрудника</p>
                    </div>

                    <div class="mb-3">
                        <label for="iinInput" class="form-label text-muted fw-bold d-block text-center mb-1">ИИН сотрудника</label>
                        <input type="text"
                            class="form-control form-control-lg border-2"
                            id="iinInput"
                            name="iin"
                            pattern="\d{12}"
                            maxlength="12"
                            placeholder="Введите ИИН"
                            style="border-radius: 12px; font-size: 1.2rem; letter-spacing: 2px; text-align: center;"
                            oninput="this.value = this.value.replace(/\D/g, '').substring(0, 12)"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill fw-bold shadow-corporate-hover">
                        Проверить статус
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(isset($positions))
<script>
    const positions = @json($positions);
</script>
@endif

@push('scripts')
<script src="{{ asset('assets/js/modals.js') }}"></script>
<script>
    function formatPhone(input) {
        if (input.value === '-') {
            return;
        }

        let value = input.value.replace(/\D/g, ''); // Удаляем все нецифровые символы
        let formattedValue = '';

        // Если ничего не введено, очищаем
        if (!value) {
            input.value = '';
            return;
        }

        // Если первая цифра 7, 8 или другая - всегда начинаем с 7
        if (['7', '8'].includes(value[0])) {
            value = value.substring(1);
        }

        // Ограничиваем длину до 10 цифр (без кода страны)
        value = value.substring(0, 10);

        // Формируем маску
        formattedValue = '+7';

        if (value.length > 0) {
            formattedValue += ' (' + value.substring(0, 3);
        }
        if (value.length >= 4) {
            formattedValue += ') ' + value.substring(3, 6);
        }
        if (value.length >= 7) {
            formattedValue += '-' + value.substring(6, 8);
        }
        if (value.length >= 9) {
            formattedValue += '-' + value.substring(8, 10);
        }

        input.value = formattedValue;
    }
</script>
@endpush