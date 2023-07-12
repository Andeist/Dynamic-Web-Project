$(document).ready(function() {
    // Load desserts data
    $.ajax({
        url: '../backend/dessert_crud/get_dessert.php',
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
                row += '<td><div class="cell"><img src="' + value.image + '" alt="Dessert Image" class="dessert-image" style="width: 100px; height: 100px;"></div></td>';
                row += '<td><div class="cell scrollable-text">' + value.ingredients + '</div></td>';
                row += '<td><div class="cell scrollable-text">' + value.directions + '</div></td>';
                row += '<td><div class="cell">' + value.video_embed + '</div></td>';
                row += '<td><div class="cell">';
                row += '<button class="btnEdit btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDessertModal" data-id="' + value.id + '"><i class="bi bi-pencil"></i> Edit</button> ';
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
    $('#editDessertModal').on('show.bs.modal', function() {
        $('#editImage').val(''); 
        $('#fileContainer').html('<input type="file" name="image" id="editImage" class="form-control form-control" accept="image/*" />'); // Replace the file input element
    });

    // Add new dessert
    $('#newDessert').click(function() {
        $('#addDessertForm')[0].reset();
        $('#addDessertModal').modal('show');
    });

    // Save new dessert
    $('#btnAdd').click(function() {
        let formData = new FormData($('#addDessertForm')[0]);

        $.ajax({
            url: '../backend/dessert_crud/add_dessert.php',
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
                        $('#addDessertModal').modal('hide');
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

    // Edit Dessert Modal
    $(document).on('click', '.btnEdit', function() {
        let dessertId = $(this).data('id');
        let formData = new FormData();
        formData.append('id', dessertId);

        // Send AJAX request to fetch dessert details
        $.ajax({
            url: '../backend/dessert_crud/get_dessert_id.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    let dessert = response.data;
                    $('#editDessertName').val(dessert.name);
                    $('#editDescription').val(dessert.description);
                    $('#editIngredients').val(dessert.ingredients);
                    $('#editDirections').val(dessert.directions);
                    $('#editVideoEmbed').val(dessert.video_embed);

                    // Clear the image field
                    $('#editImage').val('');

                    $('#editMessage').hide();
                    $('#btnEdit').data('id', dessertId);
                    $('#editDessertModal').modal('show');
                } else {
                    // Show an error message if the dessert details couldn't be fetched
                    $('#editMessage').text('Failed to fetch dessert details.').removeClass('alert-primary').addClass('alert-danger').show();
                }
            },
            error: function() {
                // Show an error message if there was an error with the AJAX request
                $('#editMessage').text('Failed to fetch dessert details.').removeClass('alert-primary').addClass('alert-danger').show();
            }
        });
    });

    // Submit the edited dessert form
    $('#btnEdit').on('click', function() {
        var form = $('#editDessertForm')[0];
        var formData = new FormData(form);
        var dessertId = $(this).data('id'); 
        formData.append('id', dessertId);

        // Send the edited dessert data using AJAX
        $.ajax({
            url: '../backend/dessert_crud/edit_dessert.php',
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
                        $('#editDessertModal').modal('hide');
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
                    text: 'Failed to edit the dessert.'
                });
            }
        });
    });

    // Delete dessert
    $(document).on('click', '.btnDelete', function() {
        let dessertId = $(this).data('id');

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
                    url: '../backend/dessert_crud/delete_dessert.php',
                    method: 'POST',
                    data: {
                        id: dessertId
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
