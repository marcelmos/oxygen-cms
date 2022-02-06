const editor = document.querySelector('#editor');

function transform(option, arg) {
    document.execCommand(option, false, arg);
}

function saveFile(){
    const fileTitle = document.querySelector('.file-title').value;
    const file = new Blob([editor.innerHTML], {type: "application/json;charset=utf-8"});

    saveAs(file, fileTitle);
}

function displayModal(){
    const modal = document.querySelector('.modal');

    if(modal.getAttribute('aria-hidden') === 'true'){
        modal.style.display = 'block';
        modal.setAttribute('aria-hidden', 'false');
    }else{
        modal.style.display = 'none';
        modal.setAttribute('aria-hidden', 'true');
    }
}

function openFile(){
    const fileInput = document.querySelector('#open-file').files[0];
    const render = new FileReader();

    render.addEventListener('load', (event) =>{
        const text = event.target.result;

        editor.innerHTML = '';      // Clear editor
        editor.innerHTML += text;   // Render file content
    });
    render.readAsText(fileInput);
}

function sendArticle($publish = false){
    let form = document.createElement('form');
    form.setAttribute('action', '');
    form.setAttribute('method', 'POST');
    form.setAttribute('target', '_self');
    form.setAttribute('enctype', 'application/x-www-form-urlencoded');

    if($publish){
        console.log("Publishing article!");
        form.innerHTML = `<input type="hidden" name="editor" value="${document.querySelector('#editor').innerHTML}" >
                        <input type="hidden" name="article-title" value="${document.querySelector('.article-title').value}" >
                        <input type="hidden" name="submit-type" value="publish" >`;
    }else{
        console.log("Article saved as scratch.");
        form.innerHTML = `<input type="hidden" name="editor" value="${document.querySelector('#editor').innerHTML}" >
                        <input type="hidden" name="article-title" value="${document.querySelector('.article-title').value}" >
                        <input type="hidden" name="submit-type" value="scratch" >`;
    }

    document.body.appendChild(form);
    form.submit();
}