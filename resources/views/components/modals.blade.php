<!-- Модальное окно заявки на аттестацию -->
<div id="applicationModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeApplicationModal()">&times;</span>

        <h2 class="modal-title">Заявка на аттестацию</h2>

        <div class="modal-scrollable">
            <table class="responsive-table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>* Фамилия</th>
                    <th>* Имя</th>
                    <th>Отчество</th>
                    <th>* ИИН</th>
                    <th>* Вид деятельности</th>
                    <th>* Специальность</th>
                    <th>* Телефон</th>
                    <th>Место работы</th>
                    <th>* Отправитель</th>
                    <th>Документ</th>
                </tr>
                </thead>
                <tbody id="tableOrder">
                <tr id="row1">
                    <td>1</td>
                    <td><input type="text" class="form-control" name="last_name" required></td>
                    <td><input type="text" class="form-control" name="first_name" required></td>
                    <td><input type="text" class="form-control" name="middle_name"></td>
                    <td><input type="text" class="form-control" name="iin" pattern="\\d{12}" required></td>
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
                    <td><input type="tel" class="form-control" name="phone" required></td>
                    <td><input type="text" class="form-control" name="workplace"></td>
                    <td><input type="text" class="form-control" name="sender_name" required></td>
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
                                    ×
                                </button>
                            </div>
                        </div>
                        <button type="button"
                                class="btn-add-doc"
                                onclick="addDocumentField(this)">
                            + Добавить документ
                        </button>
                    </td>

                    <td>
                        <button type="button"
                                class="btn btn-danger btn-sm"
                                onclick="removeRow(this)"
                                title="Удалить строку">×</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="modal-actions">
            <button type="button" class="btn btn-info" onclick="addRow()">
                <i class="bi bi-plus-circle"></i> Добавить строку
            </button>
            <button type="button" class="btn btn-danger" onclick="resetForm()">
                <i class="bi bi-eraser"></i> Очистить форму
            </button>
            <button type="button" class="btn btn-primary" onclick="addOrder()">
                Отправить заявку
            </button>
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

            <div class="modal-body p-4 p-md-5">
                <form id="searchForm" onsubmit="handleSearch(event)">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-person-vcard text-corporate-blue" style="font-size: 2.5rem;"></i>
                        </div>
                        <h4 class="fw-bold text-corporate-navy">Проверка аттестата</h4>
                        <p class="text-muted small">Введите ИИН сотрудника для получения информации</p>
                    </div>

                    <div class="mb-4">
                        <label for="iinInput" class="form-label text-muted fw-bold d-block text-center mb-2">ИИН сотрудника (12 цифр)</label>
                        <input type="text"
                               class="form-control form-control-lg border-2"
                               id="iinInput"
                               name="iin"
                               pattern="\d{12}"
                               maxlength="12"
                               placeholder="Введите ИИН"
                               style="border-radius: 12px; font-size: 1.2rem; letter-spacing: 2px; text-align: center;"
                               required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-corporate-hover">
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
@endpush
