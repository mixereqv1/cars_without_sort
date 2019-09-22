const edit_btns = document.querySelectorAll('.edit__title');
// const titles = document.querySelectorAll('.description__content');

edit_btns.forEach(element => {
    element.addEventListener('click', event => {
        let old = event.target.previousElementSibling.innerText;
        event.target.previousElementSibling.innerHTML = '<form action="update.php" method="POST"><input type="hidden" name="car_id_to_edit" value='+event.target.parentElement.parentElement.id+'><input name="new_description" class="new__description" placeholder="'+old+'" type="text"><input class="new__desc__button" type="submit" value="Update"></form>'    
    })
});