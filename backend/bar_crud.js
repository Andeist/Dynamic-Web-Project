$(document).ready(function() {
    // Load bars data
    $.ajax({
        url: '../backend/bar_crud/get_bars.php',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            let row = '';
            let i = 1;
            $.each(data, function(key, value) {
                row += '<tr>';
                row += '<td><div class="cell">' + i + '</div></td>';
                row += '<td><div class="cell">' + value.name + '</div></td>';
                row += '<td><div class="cell"><img src="' + value.image + '" alt="Bar Image" class="bar-image" style="width: 100px; height: 100px;"></div></td>';
                row += '<td><div class="cell scrollable-text">' + value.gmaps_location + '</div></td>';
                row += '<td><div class="cell scrollable-text">' + value.web_link + '</div></td>';
                row += '<td><div class="cell">';
                row += '<button class="btnEdit btn btn-warning" data-bs-toggle="modal" data-bs-target="#editBarModal" data-id="' + value.id + '"><i class="bi bi-pencil"></i> Edit</button> ';
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
    $('#editBarModal').on('show.bs.modal', function() {
        $('#editBarImage').val(''); // Clear the input value
        $('#fileContainer').html('<input type="file" name="image" id="editBarImage" class="form-control" accept="image/*" />'); // Replace the file input element
    });

    // Add new bar
    $('#newBar').click(function() {
        $('#addBarForm')[0].reset();
        $('#addBarModal').modal('show');
    });

    // Save new bar
    $('#btnAdd').click(function() {
        let formData = new FormData($('#addBarForm')[0]);

        $.ajax({
            url: '../backend/bar_crud/add_bar.php',
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
                        $('#addBarModal').modal('hide');
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

    // Edit Bar Modal
    $(document).on('click', '.btnEdit', function() {
        let barId = $(this).data('id');
        let formData = new FormData();
        formData.append('id', barId);

        // Send AJAX request to fetch bar details
        $.ajax({
            url: '../backend/bar_crud/get_bar_id.php',
            method: 'POST',
            data: formData, 
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    let bar = response.data;

                    // Set the values in the modal form fields
                    $('#editBarName').val(bar.name);
                    $('#editBarLocation').val(bar.gmaps_location);
                    $('#editBarWebLink').val(bar.web_link);

                    // Clear the image field
                    $('#editBarImage').val('');

                    $('#editMessage').hide();
                    $('#btnEdit').data('id', barId);
                    $('#editBarModal').modal('show');
                } else {
                    // Show an error message if the bar details couldn't be fetched
                    $('#editMessage').text('Failed to fetch bar details.').removeClass('alert-primary').addClass('alert-danger').show();
                }
            },
            error: function() {
                // Show an error message if there was an error with the AJAX request
                $('#editMessage').text('Failed to fetch bar details.').removeClass('alert-primary').addClass('alert-danger').show();
            }
        });
    });

    // Submit the edited bar form
    $('#btnEdit').on('click', function() {
        var form = $('#editBarForm')[0];
        var formData = new FormData(form);
        var barId = $(this).data('id'); 
        formData.append('id', barId);

        // Send the edited bar data using AJAX
        $.ajax({
            url: '../backend/bar_crud/edit_bar.php',
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
                        $('#editBarModal').modal('hide');
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
                    text: 'Failed to edit the bar.'
                });
            }
        });
    });

    // Delete bar
    $(document).on('click', '.btnDelete', function() {
        let barId = $(this).data('id');

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
                    url: '../backend/bar_crud/delete_bar.php',
                    method: 'POST',
                    data: {
                        id: barId
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
