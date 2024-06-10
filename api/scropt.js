const dynamicSelect = (id1, id2) => {
  // Определение переменных, ссылающихся на списки
  const sel1 = document.getElementById(id1);
  const sel2 = document.getElementById(id2);
  // Клонирование динамического списка
  const clone = sel2.cloneNode(true);
  // Определение переменных для клонированных элементов списка
  const clonedOptions = clone.getElementsByTagName("option");
  // Вызов функции собирающей вызываемый список
  refreshDynamicSelectOptions(sel1, sel2, clonedOptions);
  // При изменении выбранного элемента в первом списке: // вызов функции пересобирающей вызываемый список
  sel1.addEventListener("change", () => {
    refreshDynamicSelectOptions(sel1, sel2, clonedOptions);
  });
};

// Функция для сборки динамического списка
const refreshDynamicSelectOptions = (sel1, sel2, clonedOptions) => {
  // Удаление всех элементов динамического списка
  while (sel2.options.length) {
    sel2.remove(0);
  }
  const selectedOption = sel1.options[sel1.selectedIndex].value;
  // Перебор клонированных элементов списка
  for (let i = 0; i < clonedOptions.length; i++) {
    const option = clonedOptions[i];
    // Если название класса клонированного option эквивалентно "select"
    // либо эквивалентно значению option первого списка
    if (
      option.classList.contains("select") ||
      option.classList.contains(selectedOption)
    ) {
      // его нужно клонировать в динамически создаваемый список
      sel2.appendChild(option.cloneNode(true));
    }
  }
  // Отправляем событие change выбранного select
  const event = new Event("change", { bubbles: true, cancelable: false });
  sel2.dispatchEvent(event);
};

// Вызов скрипта при загрузке страницы
document.addEventListener("DOMContentLoaded", () => {
  console.log("врач выбранннннннннннннннн");
  // Заполняем списки услуг и докторов
  dynamicSelect("services", "doc_select");

  // Проверяем, выбран ли доктор
  // Обращаемся к списку докторов
  const select = document.getElementById("doc_select");
  // Если название класса выбранного значения из списка врачей эквивалентно "select",
  // то значит врач не выбран
  const sV = select.value;
  if (sV != "select") {
    console.log(sV);
  }
  //
  //   if (!sV) {
  //     console.log("врач выбран");
  //   } else {
  //     console.log("врач не выбран");
  //   }
});

//https://xhtml.ru/2020/null/dynamic-select-example/
