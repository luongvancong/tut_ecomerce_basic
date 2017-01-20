"use strict";


window.onload = function() {
    var form = document.getElementById('form-todo');

    form.onsubmit = function(e) {
        e.preventDefault();

        var tagInput = document.getElementById('input');
        var todo = tagInput.value;

        if(todo == '') {
            alert('Please input something');
            tagInput.focus();
            return;
        }

        var placement = document.getElementById('result');

        var todoItem = document.createElement('div');
        todoItem.className = 'item';
        todoItem.innerHTML = todo;

        var todoClose = document.createElement('i');
        todoClose.className = 'icon fa fa-close';

        todoClose.addEventListener('click', removeTodo);

        todoItem.append(todoClose);

        placement.append(todoItem);
    }
}

function removeTodo(obj) {
    this.parentElement.remove();
}