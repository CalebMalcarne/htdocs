<?php
session_start();
if ($_SESSION["auth"] != 1){
    header("Location:../index.php");
} else { include "../php/editData.php"; }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ASM Facebook Tools</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body class="bg-light">
        <!-- Navbar -->
        <div class="fixed-top shadow-lg">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-flex">
                        <img src="../images/christ.png" alt="Jesus Christ" class="my-1" style="height: 3rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                    
                    <div class="nav nav-pills">
                        <a class="nav-link active bg-dark"><span class="d-none d-md-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a href="insights.php" class="nav-link text-dark"><span class="d-none d-md-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a href="reporting.php" class="nav-link text-dark"><span class="d-none d-md-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                    </div>

                    <a href="../php/destroy.php" class="btn btn-danger"><span class="d-none d-md-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Hidden navbar for responsiveness -->
        <div class="mb-5">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-flex">
                        <img src="../images/christ.png" alt="Jesus Christ" class="my-1" style="height: 3rem;">&nbsp;&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                    
                    <div class="nav nav-pills">
                        <a class="nav-link active bg-dark"><span class="d-none d-md-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a class="nav-link text-dark"><span class="d-none d-md-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a class="nav-link text-dark"><span class="d-none d-md-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                    </div>

                    <a class="btn btn-danger"><span class="d-none d-md-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-10">
                    <div class="card text-center shadow">
                        <div class="card-header bg-dark text-white">
                            <h1 class="card-title"><?php echo $_SESSION["zone"]; ?></h1>
                        </div>

                        <div class="card-body mx-3 my-3">
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" placeholder="Search for a name" class="form-control search">
                            </div>

                            <div class="table-responsive border rounded-3">
                                <table class="table align-middle mb-0">
                                    <thead class="align-middle bg-dark text-white">
                                        <tr>
                                            <th>Name</th>
                                            <th>Date Last Contacted</th>
                                            <th data-bs-toggle="tooltip" title="Create a person in Areabook before checking this">Interested</th>
                                            <th data-bs-toggle="tooltip" title="Refer the person to the correct area before checking this">Referred</th>
                                            <th>Do Not Contact</th>
                                        </tr>
                                    </thead>

                                    <tbody id="peopleTableBody">
                                        <!-- Filled with function at bottom of page -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <!-- Person Modal -->
        <div data-bs-backdrop="static" id="personModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="name">John Doe</h1>
                        <div class="align-content-end">
                            <button type="button" data-bs-target="#editPersonModal" data-bs-toggle="modal" data-bs-dismiss="modal" id="editPersonButton" class="btn btn-primary"><span class="d-none d-md-inline">Edit&nbsp;&nbsp;</span><i class="bi bi-pencil-fill"></i></button>
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-md-inline">Close&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <a href="#" target="_blank" id="fb" class="btn btn-primary mb-3">Facebook Profile Link&nbsp;&nbsp;<i class="bi bi-facebook"></i></a>
                            <p class="mb-5"><i class="bi bi-info-circle"></i>&nbsp;&nbsp;<span id="info">Lorem ipsum</span></p>

                            <h2 class="text-center mb-3">History</h2>

                            <div class="table-responsive">
                                <table id="historyTable" class="table text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Contact Method</th>
                                            <th>Companionship</th>
                                            <th>Note</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody id="historyTableBody">
                                        <!-- Filled with loadHistoryTable() function -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Person Modal -->
        <div data-bs-backdrop="static" id="newPersonModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">New Person</h1>
                        <div class="align-content-end">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-md-inline">Cancel&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" class="mb-3" onsubmit="return confirm('Are you sure you want to create this person?');">
                                <div class="mb-3">
                                    <label for="newName" class="form-label text-danger">Name</label>
                                    <input type="text" name="newName" id="newName" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="newFb" class="form-label text-danger">Facebook Profile Link</label>
                                    <div class="input-group">
                                        <span class="input-group-text">https://facebook.com/</span>
                                        <input type="text" name="newFb" id="newFb" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <label for="newInfo" class="form-label">Info/Comments</label>
                                    <textarea name="newInfo" id="newInfo" class="form-control"></textarea>
                                    <span class="form-text">Please do not include any personal information such as phone numbers or addresses</span>
                                </div>

                                <h2 class="text-center mb-3">First Contact</h2>

                                <div class="mb-3">
                                    <label for="date" class="form-label text-danger">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="method" class="form-label text-danger">Contact Method</label>
                                    <select name="method" id="method" class="form-select" required>
                                        <option selected>Facebook Messenger Message</option>
                                        <option>Text Message</option>
                                        <option>Phone Call</option>
                                        <option>Video Call</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="contactNote" class="form-label text-danger">Contact Note</label>
                                    <input type="text" name="cntNote" id="cntNote" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="companionship" class="form-label text-danger">Companionship</label>
                                    <input type="text" name="companionship" id="companionship" class="form-control" required>
                                    <span class="form-text">Please use the name of your area, not your individual names</span>
                                </div>



                                <div class="row justify-content-center">
                                    <button type="submit" name="saveNewPerson" class="btn btn-success btn-lg col-md-auto"><span class="d-none d-md-inline">Save&nbsp;&nbsp;</span><i class="bi bi-check2"></i></button>
                                </div>
                            </form>
    
                            <p class="text-danger mb-0">Red text indicates a required field</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Person Modal -->
        <div data-bs-backdrop="static" id="editPersonModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Edit Person</h1>
                        <div class="align-content-end">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-md-inline">Cancel&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" class="mb-3" onsubmit="return confirm('Are you sure you want to save these edits?');">
                                <input type="text" name="editPersonId" id="editPersonId" value="0" hidden>

                                <div class="mb-3">
                                    <label for="editName" class="form-label text-danger">Name</label>
                                    <input value="" type="text" name="editName" id="editName" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="editFb" class="form-label text-danger">Facebook Profile Link</label>
                                    <div class="input-group">
                                        <span class="input-group-text">https://facebook.com/</span>
                                        <input value="" type="text" name="editFb" id="editFb" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="editInfo" class="form-label">Info/Comments</label>
                                    <textarea value="" name="editInfo" id="editInfo" class="form-control"></textarea>
                                    <span class="form-text">Please do not include any personal information such as phone numbers or addresses</span>
                                </div>

                                <div class="row justify-content-center g-1">
                                    <button type="submit" id="savePersonButton" class="btn btn-success btn-lg col-md-auto mx-1"><span class="d-none d-md-inline">Save&nbsp;&nbsp;</span><i class="bi bi-check2"></i></button>
                                    <a id="deletePersonButton" class="btn btn-danger btn-lg col-md-auto mx-1" onclick="return confirm('Are you sure you want to delete this person?');"><span class="d-none d-md-inline">Delete&nbsp;&nbsp;</span><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </form>

                            <p class="text-danger mb-0">Red text indicates a required field</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Contact Modal -->
        <div data-bs-backdrop="static" id="newContactModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">New Contact</h1>
                        <div class="align-content-end">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-md-inline">Cancel&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" onsubmit="return confirm('Are you sure you want to add this contact?');" >
                                <input type="text" name="id" id="newContactId" value="0" hidden>

                                <div class="mb-3">
                                    <label for="newDate" class="form-label">Date</label>
                                    <input type="date" name="newDate" id="newDate" class="form-control" required>
                                </div>
    
                                <div class="mb-3">
                                    <label for="newMethod" class="form-label">Contact Method</label>
                                    <select name="newMethod" id="newMethod" class="form-select" required>
                                        <option selected>Facebook Messenger Message</option>
                                        <option>Text Message</option>
                                        <option>Phone Call</option>
                                        <option>Video Call</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="contactNote" class="form-label">Contact Note</label>
                                    <input type="text" name="newcntNote" id="newcntNote" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="newCompanionship" class="form-label">Companionship</label>
                                    <input type="text" name="newCompanionship" id="newCompanionship" class="form-control" required>
                                    <span class="form-text">Please use the name of the your area, not your individual names</span>
                                </div>

                                <div class="row justify-content-center">
                                    <button type="submit" name="newContactButton" id="newContactButton" class="btn btn-success btn-lg col-md-auto"><span class="d-none d-md-inline">Save&nbsp;&nbsp;</span><i class="bi bi-check2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Contact Modal -->
        <div data-bs-backdrop="static" id="editContactModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title">Edit Contact</h1>
                        <div class="align-content-end">
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-md-inline">Cancel&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" onsubmit="return confirm('Are you sure you want to save edits?');">
                                <input type="text" name="editContactId" id="editContactId" value="0" hidden>

                                <div class="mb-3">
                                    <label for="editDate" class="form-label">Date</label>
                                    <input value="" type="date" name="editDate" id="editDate" class="form-control" required>
                                </div>
    
                                <div class="mb-3">
                                    <label for="editMethod" class="form-label">Contact Method</label>
                                    <select name="editMethod" id="editMethod" class="form-select" required>
                                        <option>Facebook Messenger Message</option>
                                        <option>Text Message</option>
                                        <option>Phone Call</option>
                                        <option>Video Call</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="contactNote" class="form-label">Contact Note</label>
                                    <input type="text" name="editcntNote" id="editcntNote" class="form-control" required>
                                </div>

                                <div class="mb-4">
                                    <label for="editCompanionship" class="form-label">Companionship</label>
                                    <input value="" type="text" name="editCompanionship" id="editCompanionship" class="form-control" required>
                                    <span class="form-text">Please use the name of the your area, not your individual names</span>
                                </div>

                                <div class="row justify-content-center g-1">
                                    <button type="submit" id="saveContactButton" class="btn btn-success btn-lg col-md-auto mx-1"><span class="d-none d-md-inline">Save&nbsp;&nbsp;</span><i class="bi bi-check2"></i></button>
                                    <a id="deleteContactButton" class="btn btn-danger btn-lg col-md-auto mx-1" onclick="return confirm('Are you sure you want to delete this contact?');"><span class="d-none d-md-inline">Delete&nbsp;&nbsp;</span><i class="bi bi-trash-fill"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Fill people table
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("peopleTableBody").innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "../php/loadPeopleTable.php", true);
            xhttp.send();

            function sessionDestroy(){
                xhttp.open("GET", "../php/destroy.php?", true);
                xhttp.send();   
            }

        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>