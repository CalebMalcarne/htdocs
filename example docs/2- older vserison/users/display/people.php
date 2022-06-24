<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ASM Facebook Tools</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

        <?php
        session_start();
        if ($_SESSION["auth"] != 1){
            header("Location:../index.php");
        } else { include "../php/editData.php"; }
        ?>
    </head>

    <body class="bg-light">
        <!-- Navbar -->
        <div class="fixed-top shadow">
            <div class="navbar navbar-light bg-white">
                <div class="container">
                    <div class="d-inline-flex">
                        <img src="../../images/logo.png" alt="ASM Logo" height="50px">&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                    
                    <div class="nav nav-pills">
                        <a class="nav-link active bg-dark"><span class="d-none d-sm-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a href="insights.php" class="nav-link text-dark"><span class="d-none d-sm-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a href="../../php/reporting.php" class="nav-link text-dark"><span class="d-none d-sm-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                    </div>

                    <a href="/" class="btn btn-danger btn-lg" onclick="sessionDestroy()"><span class="d-none d-sm-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Hidden Navbar for responsiveness -->
        <div class="mb-5">
            <div class="navbar">
                <div class="container">
                    <div class="d-inline-flex">
                        <img src="../../images/logo.png" alt="ASM Logo" height="50px">&nbsp;&nbsp;<h1 class="navbar-brand align-self-center display-1 mb-0">ASM Facebook Tools</h1>
                    </div>
                    
                    <div class="nav nav-pills">
                        <a class="nav-link"><span class="d-none d-sm-inline">People&nbsp;&nbsp;</span><i class="bi bi-people-fill"></i></a>
                        <a class="nav-link"><span class="d-none d-sm-inline">Insights&nbsp;&nbsp;</span><i class="bi bi-graph-up"></i></a>
                        <a class="nav-link"><span class="d-none d-sm-inline">Report&nbsp;&nbsp;</span><i class="bi bi-bug"></i></a>
                    </div>

                    <a class="btn btn-lg"><span class="d-none d-sm-inline">Sign Out&nbsp;&nbsp;</span><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div id = "site_content" class="container">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title mb-4"><?php echo $_SESSION["zone"]; ?></h1>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" placeholder="Search for a name" class="form-control search">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
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

        <!-- Modals -->
        <!-- Person Modal -->
        <div data-bs-backdrop="static" id="personModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="name">John Doe</h1>
                        <div class="align-content-end">
                            <button type="button" data-bs-target="#editPersonModal" data-bs-toggle="modal" data-bs-dismiss="modal" id="editPersonButton" class="btn btn-primary"><span class="d-none d-sm-inline">Edit&nbsp;&nbsp;</span><i class="bi bi-pencil"></i></button>
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-sm-inline">Close&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
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
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-sm-inline">Cancel&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" id="newPersonForm" class="mb-3" onsubmit="return confirm('Are you sure you want to create this person?');">
                                <div class="mb-4">
                                    <label for="newName" class="form-label text-danger">Name</label>
                                    <input type="text" name="newName" id="newName" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label for="newFb" class="form-label text-danger">Facebook Profile Link</label>
                                    <div class="input-group">
                                        <span class="input-group-text">https://facebook.com/</span>
                                        <input type="text" name="newFb" id="newFb" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="newInfo" class="form-label">Info/Comments</label>
                                    <input type="text" name="newInfo" id="newInfo" class="form-control">
                                    <span class="form-text">Please do not include any personal information such as phone numbers or addresses</span>
                                </div>

                                <h2 class="mb-3">First Contact</h2>
                                <div class="mb-4">
                                    <label for="date" class="form-label text-danger">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label for="method" class="form-label text-danger">Contact Method</label>
                                    <select name="method" id="method" class="form-select" required>
                                        <option selected>Facebook Messenger Message</option>
                                        <option>Text Message</option>
                                        <option>Phone Call</option>
                                        <option>Video Call</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="companionship" class="form-label text-danger">Companionship</label>
                                    <input type="text" name="companionship" id="companionship" class="form-control" required>
                                    <span class="form-text">Please use the name of your area, not your individual names</span>
                                </div>

                                <div class="row justify-content-center">
                                    <button type="submit" name="saveNewPerson" class="btn btn-success btn-lg col-sm-auto"><span class="d-none d-sm-inline">Save&nbsp;&nbsp;</span><i class="bi bi-check2"></i></button>
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
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-sm-inline">Cancel&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" id="editPersonForm" class="mb-3" onsubmit="return confirm('Are you sure you want to save these edits?');">
                                <input type="text" name="editPersonId" id="editPersonId" value="0" hidden>

                                <div class="mb-4">
                                    <label for="editName" class="form-label text-danger">Name</label>
                                    <input value="" type="text" name="editName" id="editName" class="form-control" required>
                                </div>
                                <div class="mb-4">
                                    <label for="editFb" class="form-label text-danger">Facebook Profile Link</label>
                                    <div class="input-group">
                                        <span class="input-group-text">https://facebook.com/</span>
                                        <input value="" type="text" name="editFb" id="editFb" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="editInfo" class="form-label">Info/Comments</label>
                                    <input value="" type="text" name="editInfo" id="editInfo" class="form-control">
                                </div>

                                <div class="row justify-content-center g-1">
                                    <button type="submit" id="savePersonButton" class="btn btn-success btn-lg col-sm-auto mx-1"><span class="d-none d-sm-inline">Save&nbsp;&nbsp;</span><i class="bi bi-check2"></i></button>
                                    <a id="deletePersonButton" class="btn btn-danger btn-lg col-sm-auto mx-1" onclick="return confirm('Are you sure you want to delete this person?');"><span class="d-none d-sm-inline">Delete&nbsp;&nbsp;</span><i class="bi bi-trash-fill"></i></a>
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
                            <button type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-sm-inline">Cancel&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" id="newContactForm" onsubmit="return confirm('Are you sure you want to add this contact?');">
                                <input type="text" name="id" id="newContactId" value="0" hidden>

                                <div class="mb-4">
                                    <label for="newDate" class="form-label">Date</label>
                                    <input type="date" name="newDate" id="newDate" class="form-control" required>
                                </div>
    
                                <div class="mb-4">
                                    <label for="newMethod" class="form-label">Contact Method</label>
                                    <select name="newMethod" id="newMethod" class="form-select" required>
                                        <option selected>Facebook Messenger Message</option>
                                        <option>Text Message</option>
                                        <option>Phone Call</option>
                                        <option>Video Call</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="newCompanionship" class="form-label">Companionship</label>
                                    <input type="text" name="newCompanionship" id="newCompanionship" class="form-control" required>
                                    <span class="form-text">Please use the name of the your area, not your individual names</span>
                                </div>

                                <div class="row justify-content-center">
                                    <button type="submit" name="newContactButton" id="newContactButton" class="btn btn-success btn-lg col-sm-auto"><span class="d-none d-sm-inline">Save&nbsp;&nbsp;</span><i class="bi bi-check2"></i></button>
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
                            <button onclick = "showPerson();" type="button" data-bs-dismiss="modal" class="btn btn-dark"><span class="d-none d-sm-inline">Cancel&nbsp;&nbsp;</span><i class="bi bi-x"></i></button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" id="editContactForm" onclick = "showPerson();" onsubmit="return confirm('Are you sure you want to save edits?');">
                                <input type="text" name="editContactId" id="editContactId" value="0" hidden>

                                <div class="mb-4">
                                    <label for="editDate" class="form-label">Date</label>
                                    <input type="date" name="editDate" id="editDate" class="form-control" required>
                                </div>
    
                                <div class="mb-4">
                                    <label for="editMethod" class="form-label">Contact Method</label>
                                    <select name="editMethod" id="editMethod" class="form-select" required>
                                        <option>Facebook Messenger Message</option>
                                        <option>Text Message</option>
                                        <option>Phone Call</option>
                                        <option>Video Call</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="editCompanionship" class="form-label">Companionship</label>
                                    <input type="text" name="editCompanionship" id="editCompanionship" class="form-control" required>
                                    <span class="form-text">Please use the name of the your area, not your individual names</span>
                                </div>

                                <div class="row justify-content-center g-1">
                                    <button type="submit" id="saveContactButton" class="btn btn-success btn-lg col-sm-auto mx-1"><span class="d-none d-sm-inline">Save&nbsp;&nbsp;</span><i class="bi bi-check2"></i></button>
                                    <a id="deleteContactButton" class="btn btn-danger btn-lg col-sm-auto mx-1" onclick = "showPerson();"  onclick="return confirm('Are you sure you want to delete this contact?');"><span class="d-none d-sm-inline">Delete&nbsp;&nbsp;</span><i class="bi bi-trash-fill"></i></a>
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

            xhttp.open("GET", "../php/loadPeopleTable.php?database=<?php echo $_SESSION["database"]; ?>&path=<?php echo $_SESSION["path"]; ?>", true);
            xhttp.send();

            function sessionDestroy(){
                xhttp.open("GET", "../php/destroy.php?", true);
                xhttp.send();   
            }

        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
