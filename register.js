
/*
function customSearch(term, text, option) {
    term = term.trim().toLowerCase();
    text = text.trim().toLowerCase();
    const index = option.index + 1; // obtener el índice de posición de la opción
    return text.includes(term) || index.toString().includes(term);
  }

  $(document).ready(function() {
    const select = $('#selectmes');
    select.select2({
      placeholder: 'Mes',
      allowClear: true,
      tags: true,
      tokenSeparators: [',', ' '],
      createTag: function(params) {
        const term = $.trim(params.term);
        if (term === '') {
          return null;
        }
        return {
          id: term.toLowerCase(),
          text: term,
          newTag: true
        };
      },
      templateResult: function(data) {
        if (data.newTag) {
          return $('<span>').text(`Crear nuevo mes: ${data.text}`);
        }
        return data.text;
      },
      matcher: function(term, text, option) {
        term = term.trim().toLowerCase();
        text = text.trim().toLowerCase();
        const index = option.index + 1;
        return text.includes(term) || index.toString().includes(term);
      }
    });
  
    select.on('change', function() {
      const value = select.val();
      if (value) {
        select.attr('data-placeholder', value);
      } else {
        select.attr('data-placeholder', 'Mes');
      }
    });
  }); 
*/


const terms = document.querySelector('#terms');

const button = document.querySelector('#register');

const mensaje = document.querySelector('#mensaje');

let terms_rec;

button.addEventListener('mouseenter', () =>{
  if(!terms.checked){
    mensaje.style.display = 'flex';
  }
});

button.addEventListener('mouseleave', () =>{
  mensaje.style.display = 'none';
});


function recuperarTerms(){
  terms_rec = localStorage.getItem('terms');
  if(terms_rec == "true"){
    terms.checked = true;
    button.setAttribute('type', 'submit');
    button.classList.add("pointer");
    button.classList.remove("hvr-no");
    button.classList.remove("not-allowed-button");
  }
  if(terms_rec == "false"){
    terms.checked = false;
    button.classList.add("not-allowed-button");
    button.classList.add("hvr-no");
    button.classList.remove("pointer");
    button.setAttribute('type', 'button');   
  }
}

terms.addEventListener("click",() =>{
  if (terms.checked) {
    button.classList.add("pointer");
    button.classList.remove("hvr-no");
    button.classList.remove("not-allowed-button");

    button.setAttribute('type', 'submit');
    terms_rec = true;
    localStorage.setItem('terms', terms_rec);
  } else {
    button.classList.add("not-allowed-button");
    button.classList.add("hvr-no");
    button.classList.remove("pointer");
    button.setAttribute('type', 'button');
    terms_rec = false;
    localStorage.setItem('terms', terms_rec);
  }
});

function setDaySelect(){
    for(let i = 0; i < 31; i++){
        document.getElementById("selectdia").innerHTML += "<option value='" +(i+1) + "'" + ">"+ (i+1) +  "</option>"
    }
}

function setYearSelect(){
    for(let i = 2023; i > 1950; i--){
        document.getElementById("selectyear").innerHTML += "<option value='" +(i) + "'" + ">"+ (i) +  "</option>"
    }
}
setDaySelect();
setYearSelect();
recuperarTerms();