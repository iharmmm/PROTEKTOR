function openModal(id) {
    let xhr = new XMLHttpRequest();

    xhr.open('GET', 'get_feedback.php?id=' + id, true);

    // Устанавливаем обработчик события при изменении состояния запроса
    xhr.onreadystatechange = function() {
        if (xhr.status === 200) {
            let response = xhr.responseText;
            
            openModalWindow(response);
        }
    };

    // Отправляем запрос
    xhr.send();
}
  
function openModalWindow(response) {
    let feedback = JSON.parse(response);
    
    let modalContentPlaceholder = document.getElementById('modal-content-placeholder');
    modalContentPlaceholder.innerHTML = `
      <h2>Номер обращения: ${feedback.id}</h2>
      <p>Имя: ${feedback.name}</p>
      <p>Номер телефона: ${feedback.phone_number}</p>
      <p>Почта: ${feedback.email}</p>
      <p>Сообщение: ${feedback.message}</p>
      <!-- Здесь можно добавить другие поля из базы данных -->
    `;
    
    let modal = document.getElementById('modal');
    modal.style.display = 'block';
}

function closeModal() {
    let modal = document.getElementById('modal');
    modal.style.display = 'none';
}