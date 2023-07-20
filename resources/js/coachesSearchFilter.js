import axios, { Axios }  from "axios";
let baseUrl =`http://127.0.0.1:8000/`

let regionSelect = document.getElementById('region')
let citiesSelect = document.getElementById('cities')
regionSelect.addEventListener('change',(event)=>{
    let optionValue = event.target.value
    if(optionValue==0){
        alert('Debe elegir una region')
        return
    }

    axios.get(`${baseUrl}getcity/${optionValue}`)
    .then((response)=>{
        citiesSelect.innerHTML=""
        
        let cities= Object.values(response.data)
        const defaultOption = document.createElement('option')
        defaultOption.value= 0
        defaultOption.text = 'Seleccione una ciudad'
        defaultOption.setAttribute('selected','selected')
        citiesSelect.appendChild(defaultOption)
        citiesSelect.removeAttribute('disabled')
        cities.forEach(city => {
            const option = document.createElement('option')
            option.value= city.idcity
            option.text =  city.city
            citiesSelect.appendChild(option)
        });
        
    })
    .catch((error)=>{
        console.log(error)
    })
})
