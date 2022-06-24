// Searchbar function
$("input.search").keyup(function() {
    var table = $(this).parent().next().children().eq(0).children().eq(1);
    var searchedName = $(this).val().toUpperCase();
    var people = [];

    for (var row = 0; row < $(table).children().length - 1; row++) {
        people.push($(table).children().eq(row));
    }
    for (var person in people) {
        var name = $(people[person]).children().eq(0).text();
        if (name.toUpperCase().indexOf(searchedName) > -1) {
            $(people[person]).attr("hidden", false);
        } else {
            $(people[person]).attr("hidden", true);
        }
    }
});

// Update check status
function updateCheck(check, id, type, path) {
    if (check.checked) {
        if (type == "int") {
            var okToProceed = confirm("Are you sure you want to mark this person as interested?");
            if (okToProceed) {
                location.href = "../php/updateCheck.php?id=" + id + "&type=interested&value=1&path=" + path;
            } else {
                check.checked = false;
            }
        } else if (type == "ref") {
            var okToProceed = confirm("Are you sure you want to mark this person as referred?");
            if (okToProceed) {
                location.href = "../php/updateCheck.php?id=" + id + "&type=referred&value=1&path=" + path;
            } else {
                check.checked = false;
            }
        } else if (type == "dnc") {
            var okToProceed = confirm("Are you sure you want to mark this person as do not contact?");
            if (okToProceed) {
                location.href = "../php/updateCheck.php?id=" + id + "&type=dnc&value=1&path=" + path;
            } else {
                check.checked = false;
            }
        }
    } else {
        if (type == "int") {
            var okToProceed = confirm("Are you sure you want to mark this person as not interested?");
            if (okToProceed) {
                location.href = "../php/updateCheck.php?id=" + id + "&type=interested&value=0&path=" + path;
            } else {
                check.checked = true;
            }
        } else if (type == "ref") {
            var okToProceed = confirm("Are you sure you want to mark this person as not referred?");
            if (okToProceed) {
                location.href = "../php/updateCheck.php?id=" + id + "&type=referred&value=0&path=" + path;
            } else {
                check.checked = true;
            }
        } else if (type == "dnc") {
            var okToProceed = confirm("Are you sure you want to mark this person as allowed to contact?");
            if (okToProceed) {
                location.href = "../php/updateCheck.php?id=" + id + "&type=dnc&value=0&path=" + path;
            } else {
                check.checked = true;
            }
        }
    }
}

// Load person data into person modal function
function loadPersonData(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json = this.responseText;
            var person = JSON.parse(json);
            document.getElementById("name").innerHTML = person.name;
            document.getElementById("fb").href = "https://www.facebook.com/" + person.fb;
            document.getElementById("info").innerHTML = person.info;
        }
    };

    xhttp.open("GET", "../php/loadPersonData.php?id=" + id, true);
    xhttp.send();
}

// Load history table data into person modal function
function loadHistoryTable(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("historyTableBody").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "../php/loadHistoryTable.php?id=" + id, true);
    xhttp.send();
}

// Put person data into edit person modal
$("#editPersonButton").click(function() {
    $("#editName").val($("#name").html());
    $("#editFb").val($("#fb").attr("href").substr(25));
    $("#editInfo").val($("#info").html());
});

// Put contact data into edit contact modal
function fillEditContactModal(row) {
    var date = row.children().eq(0).html();
    var month = date.substr(0, 2);
    var day = date.substr(3, 2);
    var year = date.substr(6, 4);
    date = year + "-" + month + "-" + day;

    var method = row.children().eq(1).html();
    var companionship = row.children().eq(2).html();
    var cntDate = row.children().eq(3).html();

    $("#editDate").val(date);
    var methodSelections = $("#editMethod").children();
    for (var i = 0; i < methodSelections.length; i++) {
        if (methodSelections.eq(i).html() == method) {
            methodSelections.eq(i).prop("selected", true);
        }
    }
    $("#editCompanionship").val(companionship);
    $("#editcntNote").val(cntDate);
}



$(document).ready(function() {
    // Initialize all tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll("[data-bs-toggle='tooltip']"));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
