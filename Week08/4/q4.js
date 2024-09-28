const first_name_input = document.getElementById('first-name');
const last_name_input = document.getElementById('last-name');
const phone_input = document.getElementById('phone');
const add = document.getElementById('add');
const table = document.querySelector('#table-form tbody');

add.addEventListener('click', function () {
    const first_name = first_name_input.value;
    const last_name = last_name_input.value;
    const phone = phone_input.value;

    let errors = [];

    if (!first_name || !last_name || !phone) {
        errors.push("please complete all fields.");
    }

    if (first_name.length > 255 || last_name > 255) {
        errors.push("First name and last name must have a maximum of 255 characters.");
    }

    const script_regex = /^[a-zA-Z\s]+$/;
    if (!script_regex.test(first_name) || !script_regex.test(last_name)) {
        errors.push("First name or last name is invalid.");
    }

    const phone_regex = /^09\d{9}$/;
    if (!phone_regex.test(phone)) {
        errors.push("Phone number is wrong.");
    }

    if (errors.length > 0) {
        alert(errors.join('\n'));
        return;
    }

    const row = document.createElement('tr');

    const first_name_row = document.createElement('td');
    first_name_row.textContent = first_name;

    const last_name_row = document.createElement('td');
    last_name_row.textContent = last_name;

    const phone_row = document.createElement('td');
    phone_row.textContent = phone;

    const delete_row = document.createElement('td');
    const delete_button = document.createElement('button');
    delete_button.textContent = 'Delete';
    delete_button.addEventListener('click', function () {
        table.removeChild(row);
    })
    delete_row.appendChild(delete_button);

    const edit_row = document.createElement('td');
    const edit_button = document.createElement('button');
    edit_button.textContent = 'Edit';
    let editing = false;
    edit_button.addEventListener('click', function () {
        if (!editing) {
            const first_name_edit = document.createElement('input');
            first_name_edit.value = first_name_row.textContent;

            const last_name_edit = document.createElement('input');
            last_name_edit.value = last_name_row.textContent;

            const phone_edit = document.createElement('input');
            phone_edit.value = phone_row.textContent;

            first_name_row.textContent = '';
            last_name_row.textContent = '';
            phone_row.textContent = '';

            first_name_row.appendChild(first_name_edit);
            last_name_row.appendChild(last_name_edit);
            phone_row.appendChild(phone_edit);

            edit_button.textContent = 'Save';
            editing = true;

        } else {
            first_name_row.textContent = first_name_row.querySelector('input').value;
            last_name_row.textContent = last_name_row.querySelector('input').value;
            phone_row.textContent = phone_row.querySelector('input').value;

            edit_button.textContent = 'Edit';
            editing = false;
        }
    })
    edit_row.appendChild(edit_button);

    row.appendChild(first_name_row);
    row.appendChild(last_name_row);
    row.appendChild(phone_row);
    row.appendChild(delete_row);
    row.appendChild(edit_row);

    table.appendChild(row);

    first_name_input.value = '';
    last_name_input.value = '';
    phone_input.value = '';
})

