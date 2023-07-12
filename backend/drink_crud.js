$(document).ready(function() {
    // Load drinks data
    $.ajax({
        url: '../backend/drink_crud/get_drink.php',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            let row = '';
            let i = 1;
            $.each(data, function(key, value) {
                row += '<tr>';
                row += '<td><div class="cell">' + i + '</div></td>';
                row += '<td><div class="cell">' + value.name + '</div></td>';
                row += '<td><div class="cell scrollable-text">' + value.description + '</div></td>';
                row += '<td><div class="cell"><img src="' + value.image + '" alt="Drink Image" class="drink-image" style="width: 100px; height: 100px;"></div></td>';
                row += '<td><div class="cell scrollable-text">' + value.ingredients + '</div></td>';
                row += '<td><div class="cell scrollable-text">' + value.directions + '</div></td>';
                row += '<td><div class="cell">' + value.video_embed + '</div></td>';
                row += '<td><div class="cell">';
                row += '<button class="btnEdit btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDrinkModal" data-id="' + value.id + '"><i class="bi bi-pencil"></i> Edit</button> ';
                row += '&nbsp;';
                row += '<button class="btnDelete btn btn-danger" data-id="' + value.id + '"><i class="bi bi-trash"></i> Delete</button>';
                row += '</div></td>';
                row += '</tr>';
                i++;
            });            

            $('#content').html(row);
        }
    });

    // Reset the image form when the modal is opened
    $('#editDrinkModal').on('show.bs.modal', function() {
        $('#editImage').val('');
        $('#fileContainer').html('<input type="file" name="image" id="editImage" class="form-control form-control" accept="image/*" />'); // Replace the file input element
    });

    // Add new drink
    $('#newDrink').click(function() {
        $('#addDrinkForm')[0].reset();
        $('#addDrinkModal').modal('show');
    });

    // Save new drink
    $('#btnAdd').click(function() {
        let formData = new FormData($('#addDrinkForm')[0]);

        $.ajax({
            url: '../backend/drink_crud/add_drink.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: response.title,
                        text: response.message,
                    }).then(() => {
                        $('#addDrinkModal').modal('hide');
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: response.title,
                        text: response.message,
                    });
                }
            }
        });
    });

    // Edit Drink Modal
    $(document).on('click', '.btnEdit', function() {
        let drinkId = $(this).data('id');
        let formData = new FormData();
        formData.append('id', drinkId);

        // Send AJAX request to fetch drink details
        $.ajax({
            url: '../backend/drink_crud/get_drink_id.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    let drink = response.data;
                    $('#editDrinkName').val(drink.name);
                    $('#editDescription').val(drink.description);
                    $('#editIngredients').val(drink.ingredients);
                    $('#editDirections').val(drink.directions);
                    $('#editVideoEmbed').val(drink.video_embed);

                    // Clear the image field
                    $('#editImage').val('');

                    $('#editMessage').hide();
                    $('#btnEdit').data('id', drinkId);
                    $('#editDrinkModal').modal('show');
                } else {
                    // Show an error message if the drink details couldn't be fetched
                    $('#editMessage').text('Failed to fetch drink details.').removeClass('alert-primary').addClass('alert-danger').show();
                }
            },
            error: function() {
                // Show an error message if there was an error with the AJAX request
                $('#editMessage').text('Failed to fetch drink details.').removeClass('alert-primary').addClass('alert-danger').show();
            }
        });
    });

    // Submit the edited drink form
    $('#btnEdit').on('click', function() {
        var form = $('#editDrinkForm')[0];
        var formData = new FormData(form);
        var drinkId = $(this).data('id');
        formData.append('id', drinkId);

        // Send the edited drink data using AJAX
        $.ajax({
            url: '../backend/drink_crud/edit_drink.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    // Show a success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: response.title,
                        text: response.message
                    });

                    // Close the modal after a short delay
                    setTimeout(function() {
                        $('#editDrinkModal').modal('hide');
                    }, 1500);
                } else {
                    // Show an error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: response.title,
                        text: response.message
                    });
                }
            },
            error: function() {
                // Show an error message using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to edit the drink.'
                });
            }
        });
    });


    // Delete drink
    $(document).on('click', '.btnDelete', function() {
        let drinkId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../backend/drink_crud/delete_drink.php',
                    method: 'POST',
                    data: {
                        id: drinkId
                    },
                    success: function(response) {
                        console.log(response);
                        let data = JSON.parse(response);
                        if (data.status === 'success') {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'Failed to delete the file.',
                                'error'
                            );
                        }
                    }
                });
            }
        });
    });
});
