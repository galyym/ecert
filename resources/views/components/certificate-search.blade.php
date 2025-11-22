<!-- Certificate Search Modal -->
<div id="searchModal" class="modal">
    <div class="modal-content" style="max-width: 500px;">
        <span class="close" onclick="closeSearchModal()">&times;</span>
        <h3 class="modal-title">Поиск аттестата</h3>
        
        <form id="searchForm" onsubmit="handleSearch(event)">
            <div class="form-group">
                <label>Введите ИИН:</label>
                <input type="text" class="form-control" name="iin" pattern="\d{12}" maxlength="12" placeholder="000000000000" required>
            </div>
            
            <div class="modal-actions">
                <button type="submit" class="btn btn-primary">Поиск</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openSearchModal() {
        document.getElementById('searchModal').style.display = 'block';
    }
    
    function closeSearchModal() {
        document.getElementById('searchModal').style.display = 'none';
    }
    
    async function handleSearch(e) {
        e.preventDefault();
        const form = e.target;
        const iinInput = form.querySelector('[name="iin"]');
        const iin = iinInput.value.trim();
        
        // Validation
        if (!/^\d{12}$/.test(iin)) {
            showSearchError(iinInput, 'ИИН должен состоять из 12 цифр');
            return;
        }
        
        try {
            const searchBtn = form.querySelector('button[type="submit"]');
            searchBtn.disabled = true;
            searchBtn.innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div> Поиск...';
            
            const response = await axios.get('/check-cert', { params: { iin } });
            
            const results = document.createElement('div');
            results.className = 'search-results mt-3';
            
            if (response.data.status && response.data.data && response.data.data.length > 0) {
                results.innerHTML = `
                    <div class="certificate-list">
                        ${response.data.data.map(cert => `
                            <div class="certificate-item mb-3">
                                <div class="certificate-info">
                                    ${cert.certificate_date ? `
                                        <div class="cert-date">
                                            <i class="bi bi-calendar"></i>
                                            ${new Date(cert.certificate_date).toLocaleDateString()}
                                        </div>
                                    ` : ''}
                                    <div class="cert-specialty">
                                        <strong>Специальность:</strong> ${cert.specialty || 'Не указано'}
                                    </div>
                                    <a href="${cert.certificate_file}" class="certificate-link" download="Сертификат_${cert.certificate_number}.pdf">
                                        <i class="bi bi-file-pdf"></i> Скачать сертификат (${cert.certificate_number})
                                    </a>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                `;
            } else {
                results.innerHTML = '<div class="alert alert-info mb-0">Сертификаты не найдены</div>';
            }
            
            // Remove old results
            const oldResults = form.querySelector('.search-results');
            if (oldResults) oldResults.remove();
            
            form.appendChild(results);
            
        } catch (error) {
            const errorMessage = error.response?.data?.message || 'Ошибка при выполнении поиска';
            const alert = document.createElement('div');
            alert.className = 'alert alert-danger mt-3';
            alert.textContent = errorMessage;
            form.appendChild(alert);
        } finally {
            const searchBtn = form.querySelector('button[type="submit"]');
            searchBtn.disabled = false;
            searchBtn.innerHTML = 'Поиск';
        }
    }
    
    function showSearchError(input, message) {
        const error = document.createElement('div');
        error.className = 'invalid-feedback d-block';
        error.textContent = message;
        input.parentNode.appendChild(error);
        input.addEventListener('input', () => error.remove(), { once: true });
    }
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('searchModal');
        if (event.target == modal) {
            closeSearchModal();
        }
    });
</script>
