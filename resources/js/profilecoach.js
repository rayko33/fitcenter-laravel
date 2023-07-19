import axios, { Axios }  from "axios";
let baseUrl =`http://127.0.0.1:8000/`

//Eliminar asociacion categoria - entrenador
var closeButtonList = document.querySelectorAll('.btn-close');
closeButtonList.forEach(function(button) {
    button.addEventListener('click', function() {
        if (this.classList.contains('modal-close-btn')) {
            // Si el botón tiene la clase 'modal-close-btn', no hacemos nada
            return;
        }
        const categoryElement = this.closest('.badge');
        const categoryId = categoryElement.getAttribute('value');
        
        // Realizar la solicitud para eliminar el elemento del servidor
       axios.post(`${baseUrl}categoryCoach/delete/${categoryId}`)
            .then(function(response) {
                // La solicitud se completó con éxito, eliminamos el elemento del DOM
                const categoryContainer = document.getElementById('categoriesContainer');
                if (categoryContainer.contains(categoryElement)) {
                    categoryContainer.removeChild(categoryElement);
                }

                // También eliminar el elemento correspondiente en la lista de categorías asociadas (#categoricontainer)
                const categoriesList = document.getElementById('pills');
                const categoryListElements = categoriesList.querySelectorAll('.badge');
                categoryListElements.forEach(function(listElement) {
                    if (listElement.getAttribute('value') === categoryId) {
                        categoriesList.removeChild(listElement);
                    }
                });
            })
            .catch(function(error) {
                // Manejar errores si es necesario
                console.error(error);
            });
    });
});


document.getElementById('categories').addEventListener('change', function (event) {
    // Obtén el valor seleccionado
    const selectedValue = event.target.value
    const selectedText = event.target.options[event.target.selectedIndex].textContent
    alert(selectedText)
    // Verifica que no sea el valor 0
    if (selectedValue !== '0') {
        // Realiza una solicitud POST al servidor para agregar la categoría seleccionada
        axios.post(`${baseUrl}categoryCoach/add`, { category_id: selectedValue })
            .then(function (response) {
                // La solicitud fue exitosa, puedes mostrar una notificación o realizar alguna acción adicional si lo deseas
                
                let idAssoc = response.data.info.idtrainer_category_assoc
                
                const select = document.getElementById('categories');
                select.remove(select.selectedIndex);
                
                /*const spanElementEdit = document.createElement('span');
                spanElementEdit.classList.add('badge', 'rounded-pill', 'text-white', 'text-bg-primary', 'mt-2');
                spanElementEdit.setAttribute('value', idAssoc);
                spanElementEdit.textContent = selectedText;
                const categoriesContainer = document.getElementById('categoriesContainer');
                categoriesContainer.appendChild(spanElementEdit);*/
                // Crea el primer elemento <span> con las clases y atributos especificados
                const outerSpanElement = document.createElement('span');
                outerSpanElement.classList.add('badge', 'rounded-pill', 'text-bg-primary', 'mt-2');
                outerSpanElement.setAttribute('value', idAssoc);

                // Crea el segundo elemento <span> que contiene el botón cerrar
                const innerSpanElement = document.createElement('span');
                const closeButton = document.createElement('button');
                closeButton.setAttribute('type', 'button');
                closeButton.classList.add('btn-close');
                closeButton.setAttribute('aria-label', 'Close');
                innerSpanElement.appendChild(closeButton);
                // Agrega el texto de la categoría al primer elemento <span>
                outerSpanElement.appendChild(document.createTextNode(selectedText));
                // Agrega el segundo elemento <span> al primer elemento <span>
                outerSpanElement.appendChild(innerSpanElement);

                
                

                // Agrega el primer elemento <span> al contenedor con el id "categoriesContainer"
                const categoriesContainer = document.getElementById('categoriesContainer');
                categoriesContainer.appendChild(outerSpanElement);

                const spanElement = document.createElement('span');
                spanElement.classList.add('badge', 'rounded-pill', 'text-white', 'text-bg-info', 'mt-2');
                spanElement.setAttribute('value', idAssoc);
                spanElement.textContent = selectedText;
                const pillsContainer = document.getElementById('pills');
                pillsContainer.appendChild(spanElement);
                closeButtonList = document.querySelectorAll('.btn-close')
            })
            .catch(function (error) {
                // Manejo de errores si la solicitud falla
                console.error(error);
            });
            
    }else{
        alert('debes seleccionar una categoria')
    }
    
});

let btnCat = document.getElementById('btn-get-categories')

btnCat.addEventListener('click',()=>{
    getCategories()
})