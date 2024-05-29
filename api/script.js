// Получаем ссылку на выпадающий список услуг
const servicesSelect = document.getElementById("services");

// Добавляем обработчик события на изменение выбора услуги
servicesSelect.addEventListener("change", function () {
  // Получаем выбранное значение услуги
  const selectedService = this.value;

  // Отправляем AJAX-запрос на сервер для получения списка врачей
  fetch(`get\_doctors.php?service=${selectedService}`)
    .then((response) => response.json())
    .then((data) => {
      // Обновляем список врачей в выпадающем списке
      const doctorsSelect = document.getElementById("doctors");
      doctorsSelect.innerHTML =
        '<option value="">-- Выберите врача --</option>';
      data.forEach((doctor) => {
        const option = document.createElement("option");
        option.value = doctor.id;
        option.textContent = doctor.name;
        doctorsSelect.appendChild(option);
      });
    })
    .catch((error) => {
      console.error("Ошибка при загрузке списка врачей:", error);
    });
});
