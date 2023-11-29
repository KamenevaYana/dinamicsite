ClassicEditor
    .create(document.querySelector('#editor'), {
        toolbar: ['undo', 'redo', 'bold', 'italic', 'numberedList', 'bulletedList'],
    })
    .catch(error => {
        console.log(error);
    });